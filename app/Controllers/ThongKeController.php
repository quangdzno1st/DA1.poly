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


    public function homePage($date = '')
    {
        $thongKeModel = $this->load->model('thongKeModel');
        $roomModel = $this->load->model('roomModel');
        $accountModel = $this->load->model('accountModel');

        $dateSearch = [
            "ngay_bat_dau" => date('Y-m-01'),
            "ngay_ket_thuc" => date('Y-m-t')
        ];


        if ($date != ""){
            $dateSearch = [
                "ngay_bat_dau" => date('Y-m-d',strtotime($date['ngay_bat_dau'])),
                "ngay_ket_thuc" => date('Y-m-d',strtotime($date['ngay_ket_thuc']))
            ];

        }



        $data = [
            'thongKeData' => $thongKeModel->thongKeThang($dateSearch),
            'totalPrice' => $thongKeModel->getTotalPrice($dateSearch),
            'countRoom' => $roomModel->countRoom($dateSearch),
            'countAccount' => $accountModel->countAccount($dateSearch),
            'countAccountBan' => $accountModel->countAccountBan($dateSearch),
            'dateSearch' => $dateSearch
        ];


        $this->load->view('', 'admin/inc/header');
        $this->load->view('', 'admin/inc/sidebar');
        $this->load->view($data, 'admin/thongKe/quan-ly-bao-cao');
        $this->load->view('', 'admin/inc/footer');
    }

    public function search (){
        $data = [
          'ngay_bat_dau' => $_POST['ngay_bat_dau'],
          'ngay_ket_thuc' => $_POST['ngay_ket_thuc']
        ];
        $this->homePage($data);
    }

}

?>