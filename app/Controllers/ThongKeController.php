<?php


class ThongKeController extends Controller
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
        $thongKeModel = $this->load->model('thongKeModel');

        $data = $thongKeModel->thongKeThang();
        echo "<pre>";
        print_r($data);
        die();
        $this->load->view('', 'admin/inc/header');
        $this->load->view('', 'admin/inc/sidebar');
        $this->load->view($data, 'admin/thongKe/quan-ly-bao-cao');
        $this->load->view('', 'admin/inc/footer');
    }


}

?>