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


    public function room()
    {
        $imageModel = $this->load->model("imagesModel");
        $data['images'] = $imageModel->getAllImages();

        $roomModel = $this->load->model("RoomModel");
        $data['room'] = $roomModel->getAllRoom();
        $this->load->view('', 'client/inc/header');
        $this->load->view($data, 'client/room/room');
        $this->load->view('', 'client/inc/footer');
    }

    public function roomDetail($id)
    {
        $roomModel = $this->load->model("roomModel");
        $imageModel = $this->load->model("imagesModel");
        $userModel = $this->load->model("UserModel");
        $data['data_room'] = $roomModel->getAllRoomById($id);
        $data['data_user'] = $userModel->getUserById(1);
        $data['data_img'] = $roomModel->getAllRoomImgById($id);
        $data['list_roomother'] = $roomModel->roomOther($id);
        $data['images'] = $imageModel->getAllImages();

        $this->load->view('', 'client/inc/header');
        $this->load->view($data, 'client/room/roomdetail');
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