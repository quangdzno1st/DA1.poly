<?php


class ImageController extends Controller
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
        $data = '';
        $this->load->view($data, 'header');
        $this->load->view($data, 'slider');
        $this->load->view($data, 'home');
        $this->load->view($data, 'footer');
    }

    public function delete($id)
    {
        $imageModel = $this->load->model('imagesModel');
        $imageModel->deleteALL($id);
    }

    public function deleteBackUpdate($id)
    {
        $imagesModel = $this->load->model('imagesModel');

        $imageData = $imagesModel->getById($id);



        $imagesModel->deleteById($id);

        header("Location: ".BASE_URL.'RoomTypeController/viewUpdateRoomType/'.$imageData[0]['id_loaiphong']);
    }
}

?>