<?php


class AccountController extends Controller
{

    public function __construct()
    {
        $data = [];
        parent::__construct();
    }

    public function index()
    {
        $this->loginPage();
    }


    public function loginPage($data = "")
    {
        $this->load->view($data, 'client/inc/header');
        $this->load->view($data, 'auth/login');
        $this->load->view($data, 'client/inc/footer');
    }

    public function registerPage($data = "")
    {
        $this->load->view($data, 'client/inc/header');
        $this->load->view($data, '/auth/register');
        $this->load->view($data, 'client/inc/footer');
    }

    public function handleRegister()
    {
        $accountModel = $this->load->model('AccountModel');

        $name = $_POST['name'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phoneNumber'];
        $address = $_POST['address'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];

        $data = [];
        if (!$this->isValidUsername($name)) {
            $data['nameErr'] = 'The name contains no special characters and no accents';
        }

        if ($this->isValidFieldRequired($name)) {
            $data['nameErr'] = 'Field required!';

        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $data['emailErr'] = 'Please enter email';
        }
        if ($this->isValidFieldRequired($email)) {
            $data['emailErr'] = 'Field required!';

        }
//
        if (!$this->isValidPhoneNumber($phoneNumber)) {
            $data ['phoneNumberErr'] = 'Phone number consists of 10 character';
        }

        if ($this->isValidFieldRequired($phoneNumber)) {
            $data['phoneNumberErr'] = 'Field required!';
        }
//
        if (!$this->isValidPassword($password)) {
            $data['passwordErr'] = 'Password must be at least 8 characters';
        }

        if (!$this->isValidConfirmPassword($password, $confirmPassword)) {
            $data['confirmPassErr'] = 'Password Confirmation Failed';
        }

        if ($accountModel->getAccountByEmail($email)) {
            $data['message'] = "Email value already exists, create account failed";
        }

        if (empty($data)) {
            $dataUser = [
                "user" => $name,
                "email" => $email,
                "pass" => md5($password),
                "sdt" => $phoneNumber,
                "dia_chi" => $address
            ];
            $accountModel->insertAccount($dataUser);

            $data['message'] = "Created account successfully";
        }

        $this->registerPage($data);
    }

    public function handleLogin()
    {
        Session::init();
        $accountModel = $this->load->model('accountModel');
        $data = [
            "user" => $_POST['name'],
            "pass" => md5($_POST['password'])
        ];

        $result = $accountModel->handleRequestLogin($data);
        if ($result) {
            if ($result[0]['ban'] == 0) {
                header("Location: " . BASE_URL . "HomeController/homePage");
                Session::set('login', true);
                Session::set('dataUser', $result[0]);

            } else {
                $data['message'] = "<strong style='color: black'>" . $result[0]['user'] . "</strong> account has been banned !";
                $this->loginPage($data);
            }
        } else {
            $data['message'] = "Information username or password incorrect!!";
            $this->loginPage($data);
        }


    }

    public function logout()
    {
        Session::init();
        Session::destroy();
        header('Location: ' . BASE_URL . 'HomeController/homePage');
    }

    public function changeInfo($data1 = [])
    {
        Session::init();
        $accountModel = $this->load->model('AccountModel');
        $data['current'] = $accountModel->getById($_SESSION['dataUser']['id_khachhang']);
        $data['messageErr'] = $data1;
        $this->load->view('', 'client/inc/header');
        $this->load->view($data, 'auth/update_info');
        $this->load->view('', 'client/inc/footer');
    }

    public function updateInfo()
    {
        $accountModel = $this->load->model('AccountModel');
        $id_khachhang = $_POST['id_khachhang'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phoneNumber'];
        $address = $_POST['address'];

        $errors = [];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['emailErr'] = 'Please enter a valid email';
        } elseif ($this->isValidFieldRequired($email)) {
            $errors['emailErr'] = 'Email is required!';
        }

        if (!$this->isValidPhoneNumber($phoneNumber)) {
            $errors['phoneNumberErr'] = 'Phone number must consist of 10 characters';
        } elseif ($this->isValidFieldRequired($phoneNumber)) {
            $errors['phoneNumberErr'] = 'Phone number is required!';
        }

        if ($accountModel->getAllEmailsExceptId($id_khachhang, $email)) {
            $errors['message1'] = "Email already exists. Update account failed";
        }

        if (empty($errors)) {
            $dataUser = [
                "id_khachhang" => $id_khachhang,
                "email" => $email,
                "sdt" => $phoneNumber,
                "dia_chi" => $address
            ];

            $accountModel->updateAccount($id_khachhang, $dataUser);
            $errors['message'] = "Update account successfully";
        } else {
            $errors['message'] = "Update error";
        }
        $this->changeInfo($errors);
    }


    public function forgotPassword()
    {
        $this->load->view('', 'client/inc/header');
        $this->load->view('', 'auth/forgot_pass');
        $this->load->view('', 'client/inc/footer');
    }

    public function viewSendMail($data)
    {
        $this->load->view('', 'client/inc/header');
        $this->load->view($data, 'auth/forgot_pass');
        $this->load->view('', 'client/inc/footer');
    }


    function sendMail()
    {
        $accountModel = $this->load->model('AccountModel');
        $email = $_POST['email'];
        $emailData = $accountModel->check_Mail($email);

        if (!empty($emailData)) {
            $data['title'] = "Quên mật khẩu";
            $this->sendMailPass($email, $emailData[0]['user'], $emailData[0]['id_khachhang'], $data['title']);
            $data['msg'] = "Send mail successfully!";
        } else {
            $data['msg'] = "The email you entered is not in the system !";
        }
        $this->viewSendMail($data);
    }

    function viewResetPassword($id_reset, $data)
    {
        $data1['id_reset'] = $id_reset;
        $data1['msg'] = $data;
        $this->load->view('', 'client/inc/header');
        $this->load->view($data1, 'auth/reset_pass');
        $this->load->view('', 'client/inc/footer');
    }

    function resetPassword()
    {
        $password = $_POST['password'];
        $id_reset = $_POST['id_reset'];
        $confirmPassword = $_POST['confirmPassword'];
        $accountModel = $this->load->model('AccountModel');
        if (!$this->isValidPassword($password)) {
            $data['passwordErr'] = 'Password must be at least 8 characters';
        }
        if (!$this->isValidConfirmPassword($password, $confirmPassword)) {
            $data['confirmPassErr'] = 'Password Confirmation Failed';
        }
        if ($password == $confirmPassword && empty($data['passwordErr'])) {
            $dataUpdate = [
                'pass' => md5($password)
            ];
            $accountModel->updatePass($id_reset, $dataUpdate);
            $data['message'] = "Password reset successfully";
        } else {
            $data['message'] = "Password reset failed";
        }
        $this->viewResetPassword($id_reset, $data);
    }


    function sendMailPass($email, $username, $id, $title, $data = '')
    {
        if (!empty($data)) extract($data);
        require 'public/PHPMailer/src/Exception.php';
        require 'public/PHPMailer/src/PHPMailer.php';
        require 'public/PHPMailer/src/SMTP.php';
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);

        try {
            $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_OFF;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                 //Enable SMTP authentication
            $mail->Username = 'hoangnam30102004hy@gmail.com';                     //SMTP username
            $mail->Password = 'niqnxtevsczbyhef';                               //SMTP password
            $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('hoangnam30102004hy@gmail.com', 'Duan1');
            $mail->addAddress($email, $username);     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = mb_encode_mimeheader($title, 'UTF-8');
            $mail->Body = '';
            if ($title == 'Quên mật khẩu') {
                $mail->Body .= '<html>
                <head>
                    <style>
                /* Định dạng CSS cho giao diện email */
                body {
                    font-family: Arial, sans-serif;
                        }
                        .container {
                    max-width: 600px;
                            margin: 0 auto;
                            padding: 20px;
                            background-color: #f4f4f4;
                        }
                        .header {
                    background-color: #3498db;
                            color: #fff;
                            text-align: center;
                            padding: 10px;
                        }
                        .content {
                    padding: 20px;
                        }
                        .reset-password-link {
                    text-decoration: none;
                            background-color: #000;
                            color: #fff;
                            padding: 10px 20px;
                            border-radius: 5px;
                        }
                    </style>
                </head>
                <body>
                    <div class="container">
                        <div class="header">
                            <h1>Quên mật khẩu</h1>
                        </div>
                        <div class="content">
              
                            <p>Hãy nhấp vào liên kết sau để đặt lại mật khẩu:</p>
                            <a style="color: #FFFFFF" class="reset-password-link" href="' . BASE_URL . 'AccountController/viewResetPassword/' . $id . '">Đặt lại mật khẩu</a>
                        </div>
                    </div>
                </body>
              </html>';
            } else if ($title == 'Xác nhận thông tin book phòng' && !empty($data)) {
                $mail->Body .= '
              <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác Nhận Thông Tin Đặt Phòng</title>
    <!-- Liên kết Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        .content {
            padding: 20px;
            text-align: left;
        }

        .booking-details {
            margin-bottom: 20px;
            color: #555;
        }

        .booking-details p {
            margin: 0;
            padding: 8px 0;
            border-bottom: 1px solid #eee;
        }

        .room-details {
            margin-bottom: 20px;
        }

        .room-details p {
            margin: 0;
            padding: 8px 0;
            border-bottom: 1px solid #eee;
        }

        .payment-details {
            margin-bottom: 20px;
        }

        .payment-details p {
            margin: 0;
            padding: 8px 0;
            border-bottom: 1px solid #eee;
        }

        .status {
            margin-top: 20px;
            text-align: center;
            color: #28a745;
            font-weight: bold;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            color: #777;
            font-size: 14px;
            background-color: #f8f9fa;
            padding: 15px;
            border-top: 1px solid #eee;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Xác Nhận Thông Tin Đặt Phòng</h1>
        </div>
        <div class="content">
            <div class="booking-details">
                <p><strong>Người Dùng:</strong> '.$user.'</p>
                <p><strong>Tên loại phòng:</strong> '.$ten.'</p>
                <p><strong>Nội thất:</strong> '.$noithat.'</p>
                <p><strong>Ngày Đặt Phòng:</strong> '.$ngay_dat_phong.'</p>
                <p><strong>Ngày Trả Phòng:</strong> '.$ngay_tra_phong.'</p>
                <p><strong>Đã cọc:</strong> '.$so_tien_coc.'</p>
                <p><strong>Tổng Tiền:</strong> '.$tong_tien.'</p>

                <p><strong>Trạng Thái:</strong> '.$trang_thai.'</p>
            </div>
            <div class="payment-details">
                <p><strong>Hình Thức Thanh Toán:</strong> '.$hinhthucthanhtoan.'</p>
            </div>

            <div class="status">
                <p>Đã xác nhận</p>
            </div>
        </div>
        <div class="footer">
            <p>Cảm ơn bạn đã chọn dịch vụ của chúng tôi.</p>
        </div>
    </div>

    <!-- Liên kết Bootstrap JS và Popper.js (nếu cần) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>';
            }


            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }


    }


    public function isValidUsername($username)
    {
        $pattern = '/^[a-zA-Z0-9_]+$/';
        return preg_match($pattern, $username);

    }

    public function isValidPhoneNumber($phoneNumber)
    {

        return strlen($phoneNumber) === 10;

    }


    public function isValidPassword($password)
    {
        return strlen($password) >= 8;
    }

    public function isValidConfirmPassword($password, $confirmPassword)
    {
        return $password === $confirmPassword;
    }

    public function isValidFieldRequired($value)
    {
        return empty(trim($value));
    }

    public function accountManager()
    {
        $accountModel = $this->load->model('AccountModel');
        $data = $accountModel->getAllAccounts();

        $this->load->view($data, 'admin/inc/header');
        $this->load->view($data, 'admin/inc/sidebar');
        $this->load->view($data, 'admin/account/list');
        $this->load->view($data, 'admin/inc/footer');
    }

    public function deleteAccount($id)
    {
        $accountModel = $this->load->model('AccountModel');
        $accountModel->deleteAccount($id);
        header('Location: ' . BASE_URL . 'AccountController/accountManager');
    }

    public function banAccount($id)
    {
        $accountModel = $this->load->model('AccountModel');

        $accountModel->banAccount($id);
        header('Location: ' . BASE_URL . 'AccountController/accountManager');
    }

    public function viewUpdateAccount($id, $message = "")
    {
        $accountModel = $this->load->model('AccountModel');

        $data = [
            "accountData" => $accountModel->getById($id),
            "message" => $message
        ];


        $this->load->view($data, 'admin/inc/header');
        $this->load->view($data, 'admin/inc/sidebar');
        $this->load->view($data, 'admin/account/accountUpdate');
        $this->load->view($data, 'admin/inc/footer');

    }

    public function updateAccount($id)
    {
        $accountModel = $this->load->model('AccountModel');


        $data = [
            "user" => $_POST['username'],
            'email' => $_POST['email'],
            'sdt' => $_POST['phone'],
            'dia_chi' => $_POST['address'],
            'role' => $_POST['vaiTro'],
        ];

        $message = [];

        if (!$this->isValidUsername($data['user'])) {
            $message['nameErr'] = 'The name contains no special characters and no accents';
        }

        if ($this->isValidFieldRequired($data['user'])) {
            $message['nameErr'] = 'Field required!';

        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $message['emailErr'] = 'Please enter email';
        }
        if ($this->isValidFieldRequired($data['email'])) {
            $message['emailErr'] = 'Field required!';

        }
//
        if (!$this->isValidPhoneNumber($data['sdt'])) {
            $message ['phoneNumberErr'] = 'Phone number consists of 10 character';
        }

        if ($this->isValidFieldRequired($data['sdt'])) {
            $message['phoneNumberErr'] = 'Field required!';
        }

        $getAccountByEmail = $accountModel->getAccountByEmailAndNotId($id, $data['email']);


        if ($getAccountByEmail != null) {
            $message['email'] = "Đổi thông tin không thành công, email đã tồn tại";
        }

        if (empty($message)) {
            $accountModel->updateAccount($id, $data);
        }

        $this->viewUpdateAccount($id, $message);

    }


    public function notFound()
    {
        $data = '';
        $this->load->view($data, 'header');
        $this->load->view($data, '404');
        $this->load->view($data, 'footer');
    }
}

?>