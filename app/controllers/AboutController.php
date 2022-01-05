<?php

class AboutController extends BaseController{
    public function __construct()
    {
        echo 'about constructor';
    }

    public function index(){
        echo 'about controller index method';
    }

    public function about(){
        $data = ['title'=>'hello welcome to our about section .'];
        $this->view('aboutView',$data);
    }
}