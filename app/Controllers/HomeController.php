<?php



class HomeController extends Controller
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
        Session::init();

        $roomModel = $this->load->model("roomModel");

        $nowDate = date('Y-m-d');
        $date = new DateTime();
        $date->modify("+1 day");
        $data = [
            'ngay_dat_phong' => $nowDate,
            'ngay_tra_phong' => $date->format('Y-m-d'),
            'suc_chua' => null,
            'id_loaiphong' => null,
        ];

        Session::set('dateDefault', $data);

        if (isset($_SESSION['dataSearch'])) {
            unset($_SESSION['dataSearch']);
        }

        $result = $roomModel->searchRoom($data);


        $this->load->view($data, 'client/inc/header');
        $this->load->view($result, 'client/home/home');
        $this->load->view('', 'client/inc/footer');

    }

    public function handleSearch()
    {
        Session::init();
        $roomModel = $this->load->model("roomModel");

        $data = [
            'ngay_dat_phong' => date('Y-m-d', strtotime($_POST['arrivalDate'])),
            'ngay_tra_phong' => date('Y-m-d', strtotime($_POST['departureDate'])),
            'suc_chua' => $_POST['suc_chua'],
            'id_loaiphong' => null
        ];

        $dateNow = date('Y-m-d');

        if ($data['ngay_dat_phong'] < $dateNow or $data['ngay_tra_phong'] < $dateNow or $data['ngay_dat_phong'] > $data['ngay_tra_phong']) {
            $this->room(null);

        }

       else {
           $data['roomData'] = $roomModel->searchRoom($data);
           Session::set('dataSearch', $data);
           $this->room($data);
       }

    }



    public function room($data = null)
    {
        $this->load->view('', 'client/inc/header');
           $this->load->view($data, 'client/room/room');
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