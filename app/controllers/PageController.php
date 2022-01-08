<?php
include_once '../app/models/Users.php';
class PageController extends BaseController
{
    protected $data;
    private $userModel;


    public function __construct()
    {
        $this->userModel = $this->model('users');
    }
    public function index()
    {
        
        $this->view('indexView');
    }

    public function users()
    {
        $data =  $this->userModel->pageData();
        $this->view('pageView', $data);
    }
}
