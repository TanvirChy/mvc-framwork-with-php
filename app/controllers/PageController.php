<?php
// include_once '..' . DS . 'app' . DS . 'models' . DS . 'Users.php';

use App\Core\BaseController;
use App\Models\Users;

class PageController extends BaseController
{
    protected $data;
    private $userModel;


    public function __construct()
    {
        parent::__construct();
        // $this->userModel = $this->model('users');
        $this->userModel = new Users();
    }
    public function index()
    {

        return $this->view->LoadView('indexView');
    }

    public function users()
    {
        $data =  $this->userModel->usersData();
        $this->view->LoadView('pageView', $data);
    }
}


