<?php


class RoomTypeController extends Controller
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

        $roomTypeModel = $this->load->model("roomTypeModel");
        $data = $roomTypeModel->getAllLoai();

        $this->load->view($data, 'admin/inc/header');
        $this->load->view($data, 'admin/inc/sidebar');
        $this->load->view($data, 'admin/roomType/list');
        $this->load->view($data, 'admin/inc/footer');
    }

    public function deleteRoomType($id)
    {
        $modelCategory = $this->load->model("roomTypeModel");
        $modelCategory->delete($id);
        $data = $modelCategory->getAllLoai();
        $this->homePage($data);
    }

    public function addRoomType()
    {
        $data = '';
        $this->load->view($data, 'admin/inc/header');
        $this->load->view($data, 'admin/inc/sidebar');
        $this->load->view($data, 'admin/roomType/roomType');
        $this->load->view($data, 'admin/inc/footer');
    }

    public function insertRoomType()
    {
        $data = [
            "ten" => $_POST["roomType"],
            "gia" => $_POST["price"],
            "suc_chua" => $_POST["capacity"]
        ];

        $model = $this->load->model("roomTypeModel");
        $model->insert($data);
        $data = $model->getAllLoai();
        $this->homePage($data);
    }

    public function viewUpdateRoomType($id)
    {

        $roomTypeModel = $this->load->model("roomTypeModel");
        $noiThatModel = $this->load->model("NoiThatModel");
        $imagesModel = $this->load->model("imagesModel");
        $data = [
            'roomTypeData' =>  $roomTypeModel->getById($id),
            'imagesData' =>  $imagesModel->getImageByRoomId($id),
            'noiThatData' => $noiThatModel->getAllNoiThatById($id)
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
            "suc_chua" => $_POST["capacity"]
        ];
        $model = $this->load->model("roomTypeModel");
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