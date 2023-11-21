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
        if(!empty($data['cart'])){
            $qty = 0;
            $sub_total = 0;
            foreach($data['cart'] as $item){
                $qty +=  $item['so_luong'];
                $sub_total +=  $item['gia'];
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


    public function checkOut($data = "")
    {
        $this->load->view($data, 'client/inc/header');
        $this->load->view($data, 'client/cart/checkout');
        $this->load->view($data, 'client/inc/footer');
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