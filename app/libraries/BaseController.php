<?php
include_once '..' . DS . 'app' . DS . 'libraries' . DS . 'View.php';
class BaseController
{
    protected $view;
    public function __construct()
    {

        $this->view = new View();
    }

    protected function model($model)
    {
        if (file_exists('..' . DS . 'app' . DS . 'models' . DS . $model . '.php')) {
            require_once '..' . DS . 'app' . DS . 'models' . DS . ucwords($model) . '.php';
            return new $model();
        }
    }
}
