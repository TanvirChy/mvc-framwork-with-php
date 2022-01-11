<?php
// include_once '..' . DS . 'app' . DS . 'models' . DS . 'Users.php';

use App\Core\BaseController;
use App\Models\Users;
// use App\Core\BaseModel;
// use App\Database\DB;
// use App\Libraries\Http;

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

        // if (
        //     isset($_POST) &&
        //     !empty($_POST['name']) &&
        //     !empty($_POST['email']) &&
        //     !empty($_POST['phone']) &&
        //     !empty($_POST['country']) &&
        //     !empty($_POST['password'])
        // ) {
        //     echo $_POST('name');
        // }
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
            // collect value of input field
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $country = $_POST['country'];
            $password = $_POST['password'];

            $data = [
                'name'=> $name,
                'email' => $email,
                'phone' => $phone,
                'country' => $country,
                'password' => $password
            ];

            $this->userModel->insert($data);

            // echo $name;
            // echo $email;
            // echo $phone;
            // echo $country;
            // echo $password;
        }
    }
}
