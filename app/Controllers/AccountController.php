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


    public function loginPage($data="")
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

    public function handleLogin() {

        $accountModel = $this->load->model('accountModel');
        $data = [
            "user" =>$_POST['name'],
            "pass" => md5($_POST['password'])
        ];

        $result = $accountModel->handleRequestLogin($data);

        if ($result) {
            header("Location: " . BASE_URL."HomeController/homePage");
            Session::init();
            Session::set('login', true);
            Session::set('dataUser', $result[0]);
        }
        $data['message'] = "Information username or password incorrect!!";
        $this->loginPage($data);

    }

    public function logout()
    {
        Session::init();
        Session::destroy();
        header('Location: ' . BASE_URL . 'HomeController/homePage');
    }

    public function changeInfo(){
//        bổ sung tiếp
         $this->loginPage($_SESSION['dataUser']);
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

    public function notFound()
    {
        $data = '';
        $this->load->view($data, 'header');
        $this->load->view($data, '404');
        $this->load->view($data, 'footer');
    }
}

?>