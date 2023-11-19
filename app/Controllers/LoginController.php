<?php



class LoginController extends Controller
{

    public function __construct()
    {
        $data = [];
        parent::__construct();
    }

    public function index()
    {
        $this->login();
    }


    public function login($data = '')
    {
        $this->load->view($data, 'header');
        Session::init();
        if(Session::get('login')){
            header('Location: ' . BASE_URL . 'LoginController/dashboard');
        }
        $this->load->view($data, 'admin/login');
        $this->load->view($data, 'footer');
    }

    public function dashboard()
    {
        Session::checkSession();
        $this->load->view('', 'admin/header');
        $this->load->view('', 'admin/menu');
        $this->load->view('', 'admin/dashboard');
        $this->load->view('', 'admin/footer');
    }


    public function authentication()
    {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $tableName = 'tbl_admin';
        $loginModel = $this->load->model('LoginModel');

        $count = $loginModel->login($tableName, $username, $password);
        if ($count == 0) {
            $data['msg'] = '<p style="color: red">Information username or password incorrect !</p>';
            $this->login($data);
        } else {
            $result = $loginModel->getLogin($tableName, $username, $password);
            Session::init();
            Session::set('login', true);
            Session::set('username', $result[0]['username']);
            Session::set('userid', $result[0]['admin_id']);
            header('Location: ' . BASE_URL . 'LoginController/dashboard');
        }

    }

    public function logout()
    {
        Session::init();
        Session::destroy();
        header('Location: ' . BASE_URL . 'LoginController');
    }

}

?>