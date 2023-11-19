<?php


class RoomController extends Controller
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


    public function homePage($data = "")
    {

        $modelRoom = $this->load->model("roomModel");
        $imagesRoom = $this->load->model("imagesModel");
        $data = [
            "room" => $modelRoom->getAllRoom(),
            "images" => $imagesRoom->getAllImages()
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
            "mo_ta" => $_POST["desc"]
        ];

        $roomModel = $this->load->model("roomModel");
        $roomModel->insert($dataRoom);

        $roomLatest = $roomModel->selectLatest();

        $imagesModel = $this->load->model("imagesModel");

        foreach ($_FILES["images"]["tmp_name"] as $key => $tmp_name) {
            $file_name = $_FILES["images"]["name"][$key];
            $file_tmp = $_FILES["images"]["tmp_name"][$key];
            $target_file = 'assets/upload/' . time() . $file_name;
            move_uploaded_file($file_tmp, $target_file);

            $dataImage = [
                "path" => $target_file,
                "id_phong" => $roomLatest['id_phong']
            ];

            $imagesModel->insertImage($dataImage);
        }

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


        $this->load->view($data, 'admin/inc/header');
        $this->load->view($data, 'admin/inc/sidebar');
        $this->load->view($data, 'admin/room/roomUpdate');
        $this->load->view($data, 'admin/inc/footer');
    }

    public function updateRoom($id)
    {
        $data = [
            "ten_phong" => $_POST['nameRoom'],
            'mo_ta' => $_POST['desc'],
            'loai_phong_id' => $_POST['roomType']
        ];

        $roomModel = $this->load->model("roomModel");
        $imagesModel = $this->load->model("imagesModel");

        $roomModel->update( $data,$id);

        if ($_FILES["images"]["size"]["0"] > 0) {

            foreach ($_FILES["images"]["tmp_name"] as $key => $tmp_name) {
                $file_name = $_FILES["images"]["name"][$key];
                $file_tmp = $_FILES["images"]["tmp_name"][$key];
                $target_file = 'assets/upload/' . time() . $file_name;
                move_uploaded_file($file_tmp, $target_file);

                $dataImage = [
                    "path" => $target_file,
                    "id_phong" => $id
                ];

                $imagesModel->insertImage($dataImage);
            }
        }



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