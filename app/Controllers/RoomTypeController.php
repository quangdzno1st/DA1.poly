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

    public function addRoomType($messageResponse = "")
    {
        $noiThatModel = $this->load->model("NoiThatModel");

        $data = [
            'noiThat' => $noiThatModel->getAllNoiThat(),
            'messageResponse' => $messageResponse
        ];
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

        $dataValidate = [
            'roomType' => $data,
            'noiThat' => $_POST["noithat"][0] ?? "",
            'image' => $_FILES["images"]["size"]["0"] ,
            "status" => 0
        ];

        $messageResponse = $this->validateRoomType($dataValidate);

        if (empty($messageResponse['message'])) {
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
            header("Location: " . BASE_URL . '/RoomTypeController');
        }


        $this->addRoomType($messageResponse);
    }


    public function validateRoomType($data, $id = "")

    {
        $roomTypeModel = $this->load->model("roomTypeModel");

        $messages = [];

        if (empty($data['roomType']['ten'])) {
            $messages['tenErr'] = "Field required";
        }


        if (!empty(trim($data['roomType']['ten'])) && $roomTypeModel->getRoomTypeByName(trim($data['roomType']['ten']), $id) != null) {
            $messages['tenErr'] = "RoomType name already exists";
        }

        if (empty($data['roomType']['gia'])) {
            $messages['giaErr'] = "Field required";
        }

        if ($data['roomType']['gia'] <= 0) {
            $messages['giaErr'] = "price must be greater than 0";
        }

        if (empty($data['roomType']['suc_chua'])) {
            $messages['suc_chua_err'] = "Field required";
        }

        if ($data['roomType']['suc_chua'] <= 0) {
            $messages['suc_chua_err'] = "capacity must be greater than 0";
        }

        if (empty($data['noiThat'])) {
            $messages['noithat_err'] = "Field required";
        }

        if ($data['status'] == 0 && $data['image'] <= 0) {
            $messages['image_err'] = "Field required";
        }


        return [
            'status' => '',
            'message' => $messages
        ];
    }

    public function viewUpdateRoomType($id, $messageResponse = "")
    {

        $roomTypeModel = $this->load->model("roomTypeModel");
        $noiThatModel = $this->load->model("NoiThatModel");
        $imagesModel = $this->load->model("imagesModel");
        $data = [
            'roomTypeData' => $roomTypeModel->getById($id),
            'imagesData' => $imagesModel->getImageByRoomId($id),
            'noiThatData' => $noiThatModel->getAllNoiThat(),
            'message' => $messageResponse
        ];


        $this->load->view($data, 'admin/inc/header');
        $this->load->view($data, 'admin/inc/sidebar');
        $this->load->view($data, 'admin/roomType/roomTypeUpdate');
        $this->load->view($data, 'admin/inc/footer');
    }

    public function updateRoomType($id)
    {
        $model = $this->load->model("roomTypeModel");
        $noithatModel = $this->load->model('NoiThatModel');
        $imagesModel = $this->load->model('imagesModel');


        $data = [
            "ten" => $_POST["roomType"],
            "gia" => $_POST["price"],
            "suc_chua" => $_POST["capacity"],
        ];

        $dataValidate = [
            'roomType' => $data,
            'noiThat' => $_POST["noithat"] ?? "",
            'image' => $_FILES["images"]["size"]["0"] ,
            'status' => 1
        ];
        $messageResponse = $this->validateRoomType($dataValidate, $id);
        if (empty($messageResponse['message'])) {

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
            $this->viewUpdateRoomType($id);
        }
        $this->viewUpdateRoomType($id, $messageResponse);


    }


    public
    function notFound()
    {
        $data = '';
        $this->load->view($data, 'inc/header');
        $this->load->view($data, 'inc/sidebar');
        $this->load->view($data, '404');
        $this->load->view($data, 'inc/footer');
    }
}

?>