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


    public function room($data = null)
    {
        $imageModel = $this->load->model("imagesModel");
        $roomModel = $this->load->model("roomModel");

        $data['room'] = $roomModel->searchRoom($data);
        $data['images'] = $imageModel->getAllImages();


        $this->load->view('', 'client/inc/header');
        $this->load->view($data, 'client/room/room');
        $this->load->view('', 'client/inc/footer');
    }

    public function roomTypeDetail($id)
    {
        Session::init();
        $roomModel = $this->load->model("roomModel");
        $cartModel = $this->load->model("cartModel");
        if (isset($_POST['binhluan'])) {
            $id_loaiphong = $_POST['id_loaiphong'];
            $id_khachhang = $_POST['id_khachhang'];
            $review = $_POST['review'];
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $currentDateTime = date('Y-m-d H:i:s');
            $data = [
                'id_loaiphong' => $id_loaiphong,
                'id_khachhang' => $id_khachhang,
                'noi_dung' => htmlspecialchars($review),
                'thoi_gian' => $currentDateTime
            ];
            if (!empty($data['noi_dung'])) {
                $result = $roomModel->insertCmt($data);
                header("Location: " . BASE_URL . 'clientController/roomTypeDetail/' . $id_loaiphong);
            }
        }

        if (!empty($id)) {
            $nowDate = date('Y-m-d');
            $date = new DateTime();
            $date->modify("+1 day");
            $data = [
                'ngay_dat_phong' => $nowDate,
                'ngay_tra_phong' => $date->format('Y-m-d'),
                'suc_chua' => null,
                'id_loaiphong' => $id,
            ];


            if (isset($_SESSION['dataSearch'])) {
                $data['ngay_dat_phong'] = $_SESSION['dataSearch']['ngay_dat_phong'];
                $data['ngay_tra_phong'] = $_SESSION['dataSearch']['ngay_tra_phong'];
            }

            $result['search'] = $roomModel->searchRoom($data);
            $result['cmt'] = $roomModel->getAllCmt($id);

            $id_checkKH = isset($_SESSION['dataUser']['id_khachhang']) ? $_SESSION['dataUser']['id_khachhang'] : '';
            if (!empty($id_checkKH)) {
                $result['check_buy'] = $cartModel->checkIdKH($id_checkKH);
            }
            if ($result) {
                $this->load->view('', 'client/inc/header');
                $this->load->view($result, 'client/room/roomdetail');
                $this->load->view('', 'client/inc/footer');
            } else {
                $this->load->view('', 'client/inc/header');
                $this->load->view('', 'client/inc/404');
                $this->load->view('', 'client/inc/footer');
            }
        } else {
            $this->load->view('', 'client/inc/header');
            $this->load->view('', 'client/inc/404');
            $this->load->view('', 'client/inc/footer');
        }


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