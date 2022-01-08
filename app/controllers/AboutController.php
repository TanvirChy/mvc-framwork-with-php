<?php

class AboutController extends BaseController
{
    public function __construct()
    {
    }

    public function index()
    {
        echo ' About INDEX';
    }

    public function about()
    {
        $data = ['title'=> 'hello this about view solved'];
         $this->view('aboutView', $data);
    }
}
