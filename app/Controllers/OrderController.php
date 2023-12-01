<?php


class OrderController extends Controller
{
    public function __construct()
    {
        $data = [];
        parent::__construct();
        $middleware = $this->load->model('middleware');
        $middleware->checkRole();
    }

    public function index()
    {
        $this->homePage();
    }


    public function homePage($data = '')
    {
        $orderModel = $this->load->model('orderModel');
        $data = $orderModel->getAllOrder();
        $this->load->view('', 'admin/inc/header');
        $this->load->view('', 'admin/inc/sidebar');
        $this->load->view($data, 'admin/order/list');
        $this->load->view('', 'admin/inc/footer');
    }


    public function approve($id)
    {
        $orderModel = $this->load->model('orderModel');
        $accountModel = $this->load->model('AccountModel');
        $cartModel = $this->load->model('CartModel');
        $AccountController = $this->load->controller('AccountController');
        $orderModel->approveOrder($id);
        $data1 = $cartModel->getAllBookById($id);
        $emailData = $accountModel->check_Mail($_SESSION['dataUser']['email']);
        if (!empty($emailData)) {
            $data['title'] = "Xác nhận thông tin book phòng";
            $AccountController->sendMailPass($emailData[0]['email'], $emailData[0]['user'], $emailData[0]['id_khachhang'], $data['title'], $data1[0]);
        }
        header("Location: " . BASE_URL . 'OrderController');
    }

    public function checkin($id)
    {
        $orderModel = $this->load->model('orderModel');
        $orderModel->checkinOrder($id);
        header("Location: " . BASE_URL . 'OrderController');
    }

    public function checkout($id)
    {
        $orderModel = $this->load->model('orderModel');
        $orderModel->checkoutOrder($id);
        header("Location: " . BASE_URL . 'OrderController');
    }

    public function huy($id)
    {
        $orderModel = $this->load->model('orderModel');
        $orderModel->huyOder($id);
        header("Location: " . BASE_URL . 'OrderController');
    }

    public function viewUpdateOrder($id)
    {
        $orderModel = $this->load->model('orderModel');
        $accountModel = $this->load->model('accountModel');
        $data = [
            'orderData' => $orderModel->getOrderById($id),
            'accountData' => $accountModel->getAllAccounts()
        ];

//        echo "<pre>"; print_r($data);
//        die();

        $this->load->view('', 'admin/inc/header');
        $this->load->view('', 'admin/inc/sidebar');
        $this->load->view($data, 'admin/order/orderUpdate');
        $this->load->view('', 'admin/inc/footer');
    }

    public function updateOrder($id)
    {
        $orderModel = $this->load->model('orderModel');
        $data = [
            'id_khachhang' => $_POST['khachhang'],
            'trang_thai' => $_POST['status'],
            'so_tien_coc' => $_POST['price'] != null ? $_POST['price'] : 0
        ];

        $orderModel->updateOrder($id, $data);
        header('Location: ' . BASE_URL . 'OrderController');
    }
}

?>