<?php


class CartController extends Controller
{

    public function __construct()
    {
        $data = [];
        parent::__construct();
    }

    public function index()
    {
        $this->checkOut();
    }

    public function checkOut()
    {
        Session::init();
        $roomModel = $this->load->model('RoomModel');
        if (isset($_POST['bookNow'])) {
            $ngay_dat_phong = $_POST['ngay_dat_phong'];
            $id_loaiphong = $_POST['id_loaiphong'];
            $so_luong_order = $_POST['so_luong_order'];
            $ngay_tra_phong = $_POST['ngay_tra_phong'];
            $ngay_dat_timestamp = strtotime($ngay_dat_phong);
            $ngay_tra_timestamp = strtotime($ngay_tra_phong);
            $so_ngay_chenh_lech = ($ngay_tra_timestamp - $ngay_dat_timestamp) / (60 * 60 * 24);
            $resutl = $roomModel->getRoomAll($id_loaiphong);
            $data = [
                'ngay_dat_phong' => $ngay_dat_phong,
                'ngay_tra_phong' => $ngay_tra_phong,
            ];
            $resutl1 = $roomModel->searchRoom1($data, $id_loaiphong, $so_luong_order);
            if (empty($resutl1)) {
                header('Location: ' . BASE_URL . '/HomeController');
            }
            foreach ($resutl1 as $value) {
                $id_phong[] = $value['id_phong'];
            }
            $id_phong = implode(',', $id_phong);
            if (!isset($_SESSION['dataUser'])) {
                header('Location: ' . BASE_URL . '/AccountController');
            } else {
                $data['user'] = $_SESSION['dataUser'];
            }

            $gia = $resutl[0]['gia'] * $so_ngay_chenh_lech;
            $tong_tien = $gia * $so_luong_order;
            $data['data_checkout'] = [
                'ngay_dat_phong' => $ngay_dat_phong,
                'ngay_tra_phong' => $ngay_tra_phong,
                'so_luong_order' => $so_luong_order,
                'so_ngay_chenh_lech' => $so_ngay_chenh_lech,
                'ten' => $resutl[0]['ten'],
                'gia' => $gia,
                'tong_tien' => $tong_tien,
                'id_loaiphong' => $id_loaiphong,
                'noithat' => $resutl[0]['noithat'],
                'images' => $resutl[0]['images'],
                'id_phong' => $id_phong,
            ];
        } else {
            header("Location: " . BASE_URL . 'HomeController');
        }
        $this->load->view('', 'client/inc/header');
        $this->load->view($data, 'client/cart/checkout');
        $this->load->view('', 'client/inc/footer');
    }

    public function thank()
    {
        Session::init();
        $cartModel = $this->load->model('CartModel');

        if (isset($_GET['vnp_Amount'])) {
            if (!isset($_GET['vnp_BankTranNo'])) {
                echo "Thank toán không thành công";
                die();
            }
            $data_vnpay = [
                'vnp_Amount' => $_GET['vnp_Amount'],
                'vnp_BankCode' => $_GET['vnp_BankCode'],
                'vnp_BankTranNo' => $_GET['vnp_BankTranNo'],
                'vnp_CardType' => $_GET['vnp_CardType'],
                'vnp_OrderInfo' => $_GET['vnp_OrderInfo'],
                'vnp_PayDate' => $_GET['vnp_PayDate'],
                'vnp_ResponseCode' => $_GET['vnp_ResponseCode'],
                'vnp_TmnCode' => $_GET['vnp_TmnCode'],
                'vnp_TransactionNo' => $_GET['vnp_TransactionNo'],
                'vnp_TransactionStatus' => $_GET['vnp_TransactionStatus'],
                'vnp_TxnRef' => $_GET['vnp_TxnRef'],
                'vnp_SecureHash' => $_GET['vnp_SecureHash']
            ];
            $result = $cartModel->insertVnpay($data_vnpay);
            if ($result) {
                echo "<script>alert('Cảm ơn bạn đã thanh toán thành công. Chờ xác nhận từ chúng tôi !');";
                echo "window.location.href='" . BASE_URL . "cartController/historyBook';";
                echo "</script>";
            } else {
                echo 'Error1';
            }
        } else {
            header("Location: " . BASE_URL . 'CartController/historyBook');
        }

        if (isset($_GET['partnerCode'])) {
            echo "<script>alert('Cảm ơn bạn đã thanh toán thành công. Chờ xác nhận từ chúng tôi !');";
            echo "window.location.href='" . BASE_URL . "cartController/historyBook';";
            echo "</script>";
        }
    }


    public function historyBook()
    {
        Session::init();
        $cartModel = $this->load->model('CartModel');
        if (isset($_SESSION['dataInsertBook'])) {
            $cartModel->insertBook($_SESSION['dataInsertBook']);
            unset($_SESSION['dataInsertBook']);
        }
        if (isset($_SESSION['dataUser'])) {
            $dataBook = $cartModel->getLoaiphongBook($_SESSION['dataUser']['id_khachhang']);
            $this->load->view('', 'client/inc/header');
            $this->load->view($dataBook, 'client/cart/lichsu');
            $this->load->view('', 'client/inc/footer');
        } else {
            header("Location: " . BASE_URL . 'HomeController');
        }
    }


    public function detailBook($id_datphong)
    {
        $cartModel = $this->load->model('CartModel');
        $data = $cartModel->getAllBookById($id_datphong);
        $this->load->view('', 'client/inc/header');
        $this->load->view($data, 'client/cart/detail_book');
        $this->load->view('', 'client/inc/footer');
    }

    public function thanhToan()
    {
        Session::init();
        $cartModel = $this->load->model('CartModel');
        if (isset($_SESSION['dataSearch'])) {
            extract($_SESSION['dataSearch']);
        } else {
            extract($_SESSION['dateDefault']);
        }
        extract($_POST);
        extract($_SESSION['dataUser']);
        if (isset($_POST['thanhtoan']) && $_POST['thanhtoan'] == 'vnpay') {
            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";

            $vnp_Returnurl = BASE_URL . "CartController/thank";

            $vnp_TmnCode = "74YGUA4Z"; //Mã website tại VNPAY
            $vnp_HashSecret = "OUXZGKLBCBEYBWAOAPSISCJZSGUBJOLC"; //Chuỗi bí mật

            $vnp_TxnRef = 'MRD' . rand(00, 9999); //Mã đơn hàng
            $vnp_OrderInfo = empty($_POST['ghi_chu']) ? '' : $_POST['ghi_chu'];
            $vnp_OrderType = "vnpay";
            $vnp_Amount = $_POST['tong_tien'] * 100;
            $vnp_Locale = 'vn';
            $vnp_BankCode = 'NCB';
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
            //Add Params of 2.0.1 Version
            //    $vnp_ExpireDate = $_POST['txtexpire'];
            //Billing
            //    $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
            //    $vnp_Bill_Email = $_POST['txt_billing_email'];
            //    $fullName = trim($_POST['txt_billing_fullname']);
            //    if (isset($fullName) && trim($fullName) != '') {
            //        $name = explode(' ', $fullName);
            //        $vnp_Bill_FirstName = array_shift($name);
            //        $vnp_Bill_LastName = array_pop($name);
            //    }
            //    $vnp_Bill_Address=$_POST['txt_inv_addr1'];
            //    $vnp_Bill_City=$_POST['txt_bill_city'];
            //    $vnp_Bill_Country=$_POST['txt_bill_country'];
            //    $vnp_Bill_State=$_POST['txt_bill_state'];
            //    // Invoice
            //    $vnp_Inv_Phone=$_POST['txt_inv_mobile'];
            //    $vnp_Inv_Email=$_POST['txt_inv_email'];
            //    $vnp_Inv_Customer=$_POST['txt_inv_customer'];
            //    $vnp_Inv_Address=$_POST['txt_inv_addr1'];
            //    $vnp_Inv_Company=$_POST['txt_inv_company'];
            //    $vnp_Inv_Taxcode=$_POST['txt_inv_taxcode'];
            //    $vnp_Inv_Type=$_POST['cbo_inv_type'];
            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef,
                //        "vnp_ExpireDate"=>$vnp_ExpireDate,
                //        "vnp_Bill_Mobile"=>$vnp_Bill_Mobile,
                //        "vnp_Bill_Email"=>$vnp_Bill_Email,
                //        "vnp_Bill_FirstName"=>$vnp_Bill_FirstName,
                //        "vnp_Bill_LastName"=>$vnp_Bill_LastName,
                //        "vnp_Bill_Address"=>$vnp_Bill_Address,
                //        "vnp_Bill_City"=>$vnp_Bill_City,
                //        "vnp_Bill_Country"=>$vnp_Bill_Country,
                //        "vnp_Inv_Phone"=>$vnp_Inv_Phone,
                //        "vnp_Inv_Email"=>$vnp_Inv_Email,
                //        "vnp_Inv_Customer"=>$vnp_Inv_Customer,
                //        "vnp_Inv_Address"=>$vnp_Inv_Address,
                //        "vnp_Inv_Company"=>$vnp_Inv_Company,
                //        "vnp_Inv_Taxcode"=>$vnp_Inv_Taxcode,
                //        "vnp_Inv_Type"=>$vnp_Inv_Type
            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            //    if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            //        $inputData['vnp_Bill_State'] = $vnp_Bill_State;
            //    }

            //var_dump($inputData);
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret); //
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            $returnData = array(
                'code' => '00', 'message' => 'success', 'data' => $vnp_Url
            );
            if (isset($_POST['thanhtoan']) && $_POST['thanhtoan'] == 'vnpay') {
                $dataInsertBook = [
                    'id_khachhang' => $id_khachhang,
                    'ngay_dat_phong' => $ngay_dat_phong,
                    'ngay_tra_phong' => $ngay_tra_phong,
                    'tong_tien' => $tong_tien,
                    'trang_thai' => 'Đã thanh toán',
                    'id_phong' => $id_phong,
                    'id_loaiphong' => $id_loaiphong,
                    'hinhthucthanhtoan' => 'VN PAY'
                ];
                $_SESSION['dataInsertBook'] = $dataInsertBook;
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
        } else if (isset($_POST['thanhtoan']) && $_POST['thanhtoan'] == 'tructiep') {
//            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
//            $vnp_Returnurl = BASE_URL . "CartController/thank";
//            $vnp_TmnCode = "74YGUA4Z"; //Mã website tại VNPAY
//            $vnp_HashSecret = "OUXZGKLBCBEYBWAOAPSISCJZSGUBJOLC"; //Chuỗi bí mật
//            $vnp_TxnRef = 'KHR' . rand(00, 9999); //Mã đơn hàng
//            $vnp_OrderInfo = empty($_POST['ghi_chu']) ? '' : $_POST['ghi_chu'];
//            $vnp_OrderType = "vnpay";
//            $tien_coc = $_POST['tong_tien'] * 100 * 0.1;
//            $tien_coc1 = $_POST['tong_tien'] * 0.1;
//            $thuc_tra = $_POST['tong_tien'] - $tien_coc1;
//            $vnp_Amount = $tien_coc;
//            $vnp_Locale = 'vn';
//            $vnp_BankCode = 'NCB';
//            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
//            $inputData = array(
//                "vnp_Version" => "2.1.0",
//                "vnp_TmnCode" => $vnp_TmnCode,
//                "vnp_Amount" => $vnp_Amount,
//                "vnp_Command" => "pay",
//                "vnp_CreateDate" => date('YmdHis'),
//                "vnp_CurrCode" => "VND",
//                "vnp_IpAddr" => $vnp_IpAddr,
//                "vnp_Locale" => $vnp_Locale,
//                "vnp_OrderInfo" => $vnp_OrderInfo,
//                "vnp_OrderType" => $vnp_OrderType,
//                "vnp_ReturnUrl" => $vnp_Returnurl,
//                "vnp_TxnRef" => $vnp_TxnRef,
//            );
//
//            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
//                $inputData['vnp_BankCode'] = $vnp_BankCode;
//            }
//            ksort($inputData);
//            $query = "";
//            $i = 0;
//            $hashdata = "";
//            foreach ($inputData as $key => $value) {
//                if ($i == 1) {
//                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
//                } else {
//                    $hashdata .= urlencode($key) . "=" . urlencode($value);
//                    $i = 1;
//                }
//                $query .= urlencode($key) . "=" . urlencode($value) . '&';
//            }
//
//            $vnp_Url = $vnp_Url . "?" . $query;
//            if (isset($vnp_HashSecret)) {
//                $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret); //
//                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
//            }
//            $returnData = array(
//                'code' => '00', 'message' => 'success', 'data' => $vnp_Url
//            );
//            if (isset($_POST['thanhtoan']) && $_POST['thanhtoan'] == 'tructiep') {
//                $dataInsertBook = [
//                    'id_khachhang' => $id_khachhang,
//                    'ngay_dat_phong' => $ngay_dat_phong,
//                    'ngay_tra_phong' => $ngay_tra_phong,
//                    'tong_tien' => $tong_tien,
//                    'trang_thai' => 'Chưa thanh toán',
//                    'id_phong' => $id_phong,
//                    'so_tien_coc' => $tien_coc1,
//                    'thuc_tra' => $thuc_tra,
//                    'id_loaiphong' => $id_loaiphong,
//                    'hinhthucthanhtoan' => 'Thanh toán khi check in'
//                ];
//                $_SESSION['dataInsertBook'] = $dataInsertBook;
//                header('Location: ' . $vnp_Url);
//                die();
//            } else {
//                echo json_encode($returnData);
//            }


            $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
            $partnerCode = 'MOMOBKUN20180529';
            $accessKey = 'klm05TvNBzhg7h7j';
            $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';

            $tien_coc = $_POST['tong_tien'] * 0.1;
            $thuc_tra = $_POST['tong_tien'] - $tien_coc;
            $orderInfo = "Thanh toán qua MoMo";
            $amount = $tien_coc;
            $orderId = "MM" . rand(0000, 9999);
            $redirectUrl = BASE_URL . "CartController/thank";
            $ipnUrl = BASE_URL . "CartController/thank";
            $extraData = "";
            $serectkey = $secretKey;

            $requestId = time() . "";
            $requestType = "payWithATM";
//            $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
            //before sign HMAC SHA256 signature
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $serectkey);
            $data = array('partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature);
            $result = $this->execPostRequest($endpoint, json_encode($data));

            $jsonResult = json_decode($result, true);  // decode json
            if (isset($_POST['thanhtoan']) && $_POST['thanhtoan'] == 'tructiep') {
                $dataInsertBook = [
                    'id_khachhang' => $id_khachhang,
                    'ngay_dat_phong' => $ngay_dat_phong,
                    'ngay_tra_phong' => $ngay_tra_phong,
                    'tong_tien' => $tong_tien,
                    'trang_thai' => 'Chưa thanh toán',
                    'id_phong' => $id_phong,
                    'so_tien_coc' => $tien_coc,
                    'thuc_tra' => $thuc_tra,
                    'id_loaiphong' => $id_loaiphong,
                    'hinhthucthanhtoan' => 'Thanh toán khi checkin'
                ];
                $_SESSION['dataInsertBook'] = $dataInsertBook;
                header('Location: ' . $jsonResult['payUrl']);
                die();
            }
        } else if (isset($_POST['thanhtoan']) && $_POST['thanhtoan'] == 'momo') {

            $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
            $partnerCode = 'MOMOBKUN20180529';
            $accessKey = 'klm05TvNBzhg7h7j';
            $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';

            $orderInfo = "Thanh toán qua MoMo";
            $amount = $_POST['tong_tien'];
            $orderId = "MM" . rand(0000, 9999);
            $redirectUrl = BASE_URL . "CartController/thank";
            $ipnUrl = BASE_URL . "CartController/thank";
            $extraData = "";
            $serectkey = $secretKey;

            $requestId = time() . "";
            $requestType = "payWithATM";
//            $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
            //before sign HMAC SHA256 signature
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $serectkey);
            $data = array('partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature);
            $result = $this->execPostRequest($endpoint, json_encode($data));

            $jsonResult = json_decode($result, true);  // decode json
            if (isset($_POST['thanhtoan']) && $_POST['thanhtoan'] == 'momo') {
                $dataInsertBook = [
                    'id_khachhang' => $id_khachhang,
                    'ngay_dat_phong' => $ngay_dat_phong,
                    'ngay_tra_phong' => $ngay_tra_phong,
                    'tong_tien' => $tong_tien,
                    'trang_thai' => 'Đã thanh toán',
                    'id_phong' => $id_phong,
                    'id_loaiphong' => $id_loaiphong,
                    'hinhthucthanhtoan' => 'Thanh toán MOMO'
                ];
                $_SESSION['dataInsertBook'] = $dataInsertBook;
                header('Location: ' . $jsonResult['payUrl']);
                die();
            }

//            Test momo
//            NGUYEN VAN A
//            9704000000000018
//            0307
//            OTP
        }
    }

    function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }
}

?>