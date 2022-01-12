<?php
// include_once '..' . DS . 'app' . DS . 'models' . DS . 'Users.php';

use App\Core\BaseController;
use App\Models\Users;
use App\Core\Session;

class PageController extends BaseController
{
    protected $data;
    private $userModel;


    public function __construct()
    {
        $this->userModel = new Users();
    }
    public function index()
    {
        $data  = ['user', 'name'];
        view('indexView', compact('data'));
    }
    public function users()
    {
        $users = $this->userModel->all();
        dd($users);

        // $getDataFromServer = Http::get('https://jsonplaceholder.typicode.com/todos/');
        // dd($getDataFromServer);
        // $data = [];
        // $getDataFromServer = Http::get('https://jsonplaceholder.typicode.com/todos/');
        // $data['getDataFromServer'] = json_decode($getDataFromServer);

        // $this->view->LoadView('pageView', $data);
    }
    public function registration()
    {

        view('registrationView');
    }


    public function takeDataRegistration()
    {
        if (
            $_SERVER["REQUEST_METHOD"] == "POST" &&
            !empty($_POST['name']) &&
            !empty($_POST['email']) &&
            !empty($_POST['phone']) &&
            !empty($_POST['country']) &&
            !empty($_POST['password'])
        ) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $country = $_POST['country'];
            $password = $_POST['password'];

            $data = [
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'country' => $country,
                'password' => $password
            ];

            $result = $this->userModel->insertRegForm('users', $data);

            if ($result) {
                redirectTo('/page/index');
            }
        }
    }

    // Login Part
    public function login()
    {
        view('loginView');
    }

    public function takeDataLogin()
    {
        if (
            $_SERVER["REQUEST_METHOD"] == "POST"
            && !empty($_POST['email'])
            && !empty($_POST['password'])
        ) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $data = [
                'email' => $email,
                'password' => $password,
            ];

            $result = $this->userModel->loginData($data);
            // dd($result);
            // if (session_status() == PHP_SESSION_NONE) {
            //     echo 'session are not start yet';
            //  }else{
            //      echo 'session start already';
            //  }
            Session::set('currentUser', $result);
            $sessionUser = Session::get('currentUser');
            dd($sessionUser);
            if ($password === $result->password) {
                echo "Your are Sign In Now ";
            } else {
                echo 'Your are not registerd user, Please Register First.';
            }
        }
    }
}
