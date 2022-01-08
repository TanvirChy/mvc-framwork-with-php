<?php
// include_once '../app/models/Users.php';

include_once '..' . DS . 'app' . DS . 'models' . DS . 'Users.php';

class PageController extends BaseController
{
    protected $data;
    private $userModel;


    public function __construct()
    {
        parent::__construct();
        $this->userModel = $this->model('users');
    }
    public function index()
    {

        return $this->view->LoadView('indexView');
    }

    public function users()
    {
        $data =  $this->userModel->pageData();
        $this->view->LoadView('pageView',$data);
    }
}
