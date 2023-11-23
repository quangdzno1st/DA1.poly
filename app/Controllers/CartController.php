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
        $this->homeCart();
    }


    public function homeCart()
    {
        Session::init();
        $cartModel = $this->load->model('CartModel');
        $data['cart'] = $cartModel->getAllCart();
        if (!empty($data['cart'])) {
            $qty = 0;
            $sub_total = 0;
            foreach ($data['cart'] as $item) {
                $qty += $item['so_luong'];
                $sub_total += $item['gia'];
            }
            $_SESSION['cart'] = [
                'qty_total' => $qty,
                'sub_total' => $sub_total
            ];
        }
        $data['total'] = $_SESSION;
        $this->load->view($data, 'client/cart/cart');
    }

    public function addCart()
    {
        $cartModel = $this->load->model('CartModel');
        $id_khachhang = $_POST['id_khachhang'];
        $id_phong = $_POST['id_phong'];
        $qty = $_POST['qty'];
        $data = [
            'id_khachhang' => $id_khachhang,
            'id_phong' => $id_phong,
            'so_luong' => $qty
        ];
        $result = $cartModel->insertCart($data);
        if ($result) {
            header("Location: " . BASE_URL . 'CartController');
        } else {
            echo "Error";
        }

    }


    public function deleteCart($idcart)
    {
        $cartModel = $this->load->model('CartModel');
        $result = $cartModel->delete($idcart);
        if ($result) {
            header("Location: " . BASE_URL . 'CartController');
        } else {
            echo "Error";
        }
    }

//    public function updateMoney()
//    {
//        Session::init();
//        $cartModel = $this->load->model('CartModel');
//
//        if (isset($_POST['id_cart'])) {
//            $id_cart_array = $_POST['id_cart'];
//            $gia = $_POST['gia'];
//            $checked = isset($_POST['checked']) ? $_POST['checked'] : false;
//            $tong_gia = 0;
//            $data['cart'] = $cartModel->getCartById(9);
//            echo "<pre>";
//            print_r($data['cart']);
//            die();
//            echo "</pre>";
//            foreach ($id_cart_array as $id_cart) {
//                $data['cart'] = $cartModel->getCartById($id_cart);
//                foreach ($data['cart'] as $item) {
//                    $tong_gia += ($checked) ? $gia : -$gia;
//                }
//            }
//
//            $_SESSION['cart_res'] = [
//                'tong_gia' => $tong_gia
//            ];
//        }
//        echo json_encode($_SESSION);
//    }


    public function checkOut()
    {
        Session::init();
        if (isset($_SESSION['dataUser'])) {
            $data['user'] = $_SESSION['dataUser'];
        } else {
            $data['user'] = [];
        }
        $this->load->view('', 'client/inc/header');
        $this->load->view($data, 'client/cart/checkout');
        $this->load->view('', 'client/inc/footer');
    }

    public function thank()
    {
        echo "Cảm ơn";
    }

    public function paymentVnPay()
    {
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        if (isset($_POST['payment'])) {

            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = "http://localhost/duan1/CartController/thank";
            $vnp_TmnCode = "74YGUA4Z"; //Mã website tại VNPAY
            $vnp_HashSecret = "OUXZGKLBCBEYBWAOAPSISCJZSGUBJOLC"; //Chuỗi bí mật

            $vnp_TxnRef = 'MRD' . rand(00, 9999); //Mã đơn hàng
            $vnp_OrderInfo = $_POST['ghi_chu'];
            $vnp_OrderType = "vnpay";
            $vnp_Amount = $_POST['tong_tien'] * 100000;
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
            if (isset($_POST['payment'])) {
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
        }

    }


    public function notFound()
    {
        $data = '';
        $this->load->view($data, 'inc/header');
        $this->load->view($data, 'inc/sidebar');
        $this->load->view($data, '404');
        $this->load->view($data, 'inc/footer');
    }
}

?>