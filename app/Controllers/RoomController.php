<?php


class RoomController extends Controller
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


    public function homePage($data = "")
    {

        $modelRoom = $this->load->model("roomModel");
        $data = [
            "room" => $modelRoom->getAllRoom()
        ];

        $this->load->view($data, 'admin/inc/header');
        $this->load->view($data, 'admin/inc/sidebar');
        $this->load->view($data, 'admin/room/list');
        $this->load->view($data, 'admin/inc/footer');
    }


    public function createRoom()
    {
        $modelLoai = $this->load->model("roomTypeModel");
        $data = $modelLoai->getAllLoai();
        $this->load->view($data, 'admin/inc/header');
        $this->load->view($data, 'admin/inc/sidebar');
        $this->load->view($data, 'admin/room/room');
        $this->load->view($data, 'admin/inc/footer');
    }

    public function insertRoom()
    {

        $dataRoom = [
            "ten_phong" => $_POST["nameRoom"],
            "loai_phong_id" => $_POST["roomType"],
        ];

        $roomModel = $this->load->model("roomModel");
        $roomModel->insert($dataRoom);

        $this->homePage();
    }

    public function deleteRoom($id)
    {
        $roomModel = $this->load->model("roomModel");

        $imageController = $this->load->controller("imageController");
        $imageController->delete($id);
        $roomModel->delete($id);

        $this->homePage();
    }

    public function viewRoomUpdate($id)
    {

        $roomModel = $this->load->model("roomModel");

        $imageModel = $this->load->model("imagesModel");

        $roomTypeModel = $this->load->model("roomTypeModel");

        $data = [
            "roomType" => $roomTypeModel->getAllLoai(),
            "room" => $roomModel->getById($id),
            "images" => $imageModel->getImageByRoomId($id),
        ];


//        echo "<pre>";
//        print_r($data['room']);
//        die();

        $this->load->view($data, 'admin/inc/header');
        $this->load->view($data, 'admin/inc/sidebar');
        $this->load->view($data, 'admin/room/roomUpdate');
        $this->load->view($data, 'admin/inc/footer');
    }

    public function updateRoom($id)
    {
        $data = [
            "ten_phong" => $_POST['nameRoom'],
            'loai_phong_id' => $_POST['roomType']
        ];

        $roomModel = $this->load->model("roomModel");

        $roomModel->update($data, $id);

        $this->homePage();
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