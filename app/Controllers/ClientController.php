<?php


class ClientController extends Controller
{

    public function __construct()
    {
        $data = [];
        parent::__construct();
    }

    public function index()
    {
        $this->homePage();
    }


    public function homePage()
    {
        $this->load->view('', 'client/inc/header');
//        $this->load->view('', 'client/inc/sidebar');
        $this->load->view('', 'client/room/roomdetail');
//        $this->load->view('', 'client/room/room');
//        $this->load->view('', 'client/room/reservation');
        $this->load->view('', 'client/inc/footer');
    }


    public function room($data = null)
    {
        $imageModel = $this->load->model("imagesModel");
        $roomModel = $this->load->model("roomModel");

        $data['room'] = $roomModel->searchRoom($data);
        $data['images'] = $imageModel->getAllImages();


        $this->load->view('', 'client/inc/header');
        $this->load->view($data, 'client/room/room');
        $this->load->view('', 'client/inc/footer');
    }

    public function roomTypeDetail($id)
    {
        Session::init();

        $roomModel = $this->load->model("roomModel");

        $nowDate = date('Y-m-d');
        $date = new DateTime();
        $date->modify("+1 day");

        $data = [
            'ngay_dat_phong' => $nowDate,
            'ngay_tra_phong' => $date->format('Y-m-d'),
            'suc_chua' => null,
            'id_loaiphong' => $id,
        ];

        $result = $roomModel->searchRoom($data);


        $this->load->view('', 'client/inc/header');
        $this->load->view($result, 'client/room/roomdetail');
        $this->load->view('', 'client/inc/footer');

    }

    public function reservation()
    {
        $this->load->view('', 'client/inc/header');
        $this->load->view('', 'client/room/reservation');
        $this->load->view('', 'client/inc/footer');
    }


    public function categoryProduct()
    {
        $data = '';
        $this->load->view($data, 'header');
//        $this->load->view($data,'slider');
        $this->load->view($data, 'categoryproduct');
        $this->load->view($data, 'footer');
    }

    public function detailProduct()
    {
        $data = '';
        $this->load->view($data, 'header');
//        $this->load->view($data,'slider');
        $this->load->view($data, 'detailproduct');
        $this->load->view($data, 'footer');
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