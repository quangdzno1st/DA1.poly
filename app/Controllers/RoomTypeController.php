<?php


class       RoomTypeController extends Controller
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

        $roomTypeModel = $this->load->model("roomTypeModel");
        $data = $roomTypeModel->getAllLoai();

        $this->load->view($data, 'admin/inc/header');
        $this->load->view($data, 'admin/inc/sidebar');
        $this->load->view($data, 'admin/roomType/list');
        $this->load->view($data, 'admin/inc/footer');
    }

    public function deleteRoomType($id)
    {

        $roomTypeModel = $this->load->model("roomTypeModel");
        $roomTypeModel->delete($id);
        $data = $roomTypeModel->getAllLoai();
        $this->homePage($data);
    }

    public function addRoomType()
    {
        $noiThatModel = $this->load->model("NoiThatModel");

        $data = $noiThatModel->getAllNoiThat();
        $this->load->view($data, 'admin/inc/header');
        $this->load->view($data, 'admin/inc/sidebar');
        $this->load->view($data, 'admin/roomType/roomType');
        $this->load->view($data, 'admin/inc/footer');
    }

    public function insertRoomType()
    {
        $imagesModel = $this->load->model("imagesModel");
        $noithatModel = $this->load->model('NoiThatModel');
        $roomTypeModel = $this->load->model("roomTypeModel");


        $data = [
            "ten" => $_POST["roomType"],
            "gia" => $_POST["price"],
            "suc_chua" => $_POST["capacity"]
        ];

        $roomTypeModel->insert($data);
        $roomTypeLatest = $roomTypeModel->selectLatest();

        foreach ($_POST['noithat'] as $value) {
            $dataNoiThat = [
                "id_noithat" => $value,
                "id_loaiphong" => $roomTypeLatest['id_loaiphong']
            ];

            $noithatModel->insert($dataNoiThat);
        }


        if ($_FILES["images"]["size"]["0"] > 0) {

            foreach ($_FILES["images"]["tmp_name"] as $key => $tmp_name) {
                $file_name = $_FILES["images"]["name"][$key];
                $file_tmp = $_FILES["images"]["tmp_name"][$key];
                $target_file = 'assets/upload/' . time() . $file_name;
                move_uploaded_file($file_tmp, $target_file);

                $dataImage = [
                    "path" => $target_file,
                    "id_loaiphong" => $roomTypeLatest['id_loaiphong']
                ];

                $imagesModel->insertImage($dataImage);
            }
        }

        $this->homePage();
    }

    public function viewUpdateRoomType($id)
    {

        $roomTypeModel = $this->load->model("roomTypeModel");
        $noiThatModel = $this->load->model("NoiThatModel");
        $imagesModel = $this->load->model("imagesModel");
        $data = [
            'roomTypeData' => $roomTypeModel->getById($id),
            'imagesData' => $imagesModel->getImageByRoomId($id),
            'noiThatData' => $noiThatModel->getAllNoiThat()
        ];


        $this->load->view($data, 'admin/inc/header');
        $this->load->view($data, 'admin/inc/sidebar');
        $this->load->view($data, 'admin/roomType/roomTypeUpdate');
        $this->load->view($data, 'admin/inc/footer');
    }

    public function updateRoomType($id)
    {
        $data = [
            "ten" => $_POST["roomType"],
            "gia" => $_POST["price"],
            "suc_chua" => $_POST["capacity"],
        ];

        $model = $this->load->model("roomTypeModel");
        $noithatModel = $this->load->model('NoiThatModel');
        $imagesModel = $this->load->model('imagesModel');

        $noithatModel->deleteByIdRoomType($id);

        foreach ($_POST['noithat'] as $value) {
            $dataNoiThat = [
                "id_noithat" => $value,
                "id_loaiphong" => $id
            ];
            $noithatModel->insert($dataNoiThat);
        }


        if ($_FILES["images"]["size"]["0"] > 0) {

            foreach ($_FILES["images"]["tmp_name"] as $key => $tmp_name) {
                $file_name = $_FILES["images"]["name"][$key];
                $file_tmp = $_FILES["images"]["tmp_name"][$key];
                $target_file = 'assets/upload/' . time() . $file_name;
                move_uploaded_file($file_tmp, $target_file);

                $dataImage = [
                    "path" => $target_file,
                    "id_loaiphong" => $id
                ];

                $imagesModel->insertImage($dataImage);
            }
        }
        $model->update($data, $id);
        $data = $model->getAllLoai();
        $this->homePage($data);
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