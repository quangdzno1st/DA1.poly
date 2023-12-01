<?php


class CommentController extends Controller
{

    public function __construct()
    {
        $data = [];
        parent::__construct();
    }

    public function index()
    {
        $this->listComment();
    }


    public function listComment()
    {
        $RoomModel = $this->load->model('RoomModel');
        $dataCmt = $RoomModel->selectAllCmt();
        $this->load->view('', 'admin/inc/header');
        $this->load->view('', 'admin/inc/sidebar');
        $this->load->view($dataCmt, 'admin/comment/list');
        $this->load->view('', 'admin/inc/footer');
    }

    public function deleteCmt($id)
    {
        $RoomModel = $this->load->model('RoomModel');
        $result = $RoomModel->deleteCmt($id);
        if($result){
            header('Location: '.BASE_URL.'/CommentController');
        }
    }

}

?>