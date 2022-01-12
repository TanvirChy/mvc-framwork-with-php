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
        $currentUserInfo = Session::get('currentUser');
        $data  = ['currentUserInfo'=> $currentUserInfo];
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
            
            $currentUserData = [
                'id' => $result->id,
                'name' => $result->name,
                'email' => $result->email,
            ];
            Session::set('currentUser', $currentUserData);
            // $sessionUser = Session::get('currentUser');
            // dd($sessionUser);
            if ($password === $result->password) {
                redirectTo('/page/index');
            }
        }
    }

    public function profile()
    {
        view('profileView');
    }

    public function takeUpdateProfile()
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

            $currentUserId = Session::get('currentUser');
            $data = [
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'country' => $country,
                'password' => $password,
                'id' => $currentUserId['id']
            ];

            $result = $this->userModel->insertUpdatedData('users', $data);
           
        }
        
    }
    public function takeDeleteUser()
    {
        // dd($_POST);
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete']) ){
            $id = Session::get('currentUser')['id'];
            // dd($id);
            $result = $this->userModel->deleteUser('users',$id);
           
        }
        if($result){
            redirectTo('/page/login');
        }

    }
}
