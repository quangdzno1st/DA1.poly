<?php


class NoiThatController extends Controller
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


    public function homePage(){

    }

    public function deleteBackUpdate($id_noithat,$id_loaiphong){
        $noiThatModel = $this->load->model('NoiThatModel');
        $noiThatModel->deleteById($id_noithat,$id_loaiphong);

        header("Location: ".BASE_URL.'RoomTypeController/viewRoomUpdate/'.$id_loaiphong);
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