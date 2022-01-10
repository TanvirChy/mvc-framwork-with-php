<?php
// include_once '..' . DS . 'app' . DS . 'models' . DS . 'Users.php';

use App\Core\BaseController;
use App\Core\BaseModel;
use App\Database\DB;
use App\Libraries\Http;
use App\Models\Users;

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
}
