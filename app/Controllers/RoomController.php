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


    public function createRoom($message = "")
    {
        $modelLoai = $this->load->model("roomTypeModel");
        $data = [
            "roomType" => $modelLoai->getAllLoai(),
            "message" => $message
        ];
        $this->load->view($data, 'admin/inc/header');
        $this->load->view($data, 'admin/inc/sidebar');
        $this->load->view($data, 'admin/room/room');
        $this->load->view($data, 'admin/inc/footer');
    }

    public function insertRoom()
    {
        $roomModel = $this->load->model("roomModel");

        $dataRoom = [
            "ten_phong" => $_POST["nameRoom"],
            "loai_phong_id" => $_POST["roomType"],
        ];

        $message = $this->validateInputRoom($dataRoom);

        if (empty($message['message'])) {
            $roomModel->insert($dataRoom);
            $message['status'] = "Room created successfully";
        }

        $this->createRoom($message);

    }

    public function validateInputRoom($dataRoom, $id = "")
    {
        $roomModel = $this->load->model("roomModel");
        $message = [
            'status' => '',
            'message' => ""
        ];
        if (empty(trim($dataRoom["ten_phong"]))) {
            $message['message'] = "Field required";
        }
        if (!empty(trim($dataRoom['ten_phong'])) && $roomModel->getRoomByName($dataRoom["ten_phong"], $id) != null) {
            $message['message'] = "Room name already exists";
        }

        return $message;

    }

    public function deleteRoom($id)
    {
        $roomModel = $this->load->model("roomModel");

        $imageController = $this->load->controller("imageController");
        $imageController->delete($id);
        $roomModel->delete($id);

        $this->homePage();
    }

    public function viewRoomUpdate($id, $message = "")
    {

        $roomModel = $this->load->model("roomModel");

        $imageModel = $this->load->model("imagesModel");

        $roomTypeModel = $this->load->model("roomTypeModel");

        $data = [
            "roomType" => $roomTypeModel->getAllLoai(),
            "room" => $roomModel->getById($id),
            "images" => $imageModel->getImageByRoomId($id),
            "message" => $message
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
        $roomModel = $this->load->model("roomModel");
        $dataRoom = [
            "ten_phong" => $_POST['nameRoom'],
            'loai_phong_id' => $_POST['roomType']
        ];

        $message = $this->validateInputRoom($dataRoom, $id);

        if (empty($message['message'])) {
            $roomModel->update($dataRoom, $id);
            $message['status'] = "Room update successfully";
        }

        $this->viewRoomUpdate($id, $message);
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