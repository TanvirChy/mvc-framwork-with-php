<?php
include_once '../app/config/config.php';
class Route
{
    protected $defaultController = DEFAULT_CONTROLLER ;
    protected $defaultMethod = DEFAULT_METHOD ;
    protected $params = [];

    public function  __construct()
    {
        $url = $this->getUrl();

        if ($url && file_exists('../app/controllers/' . ucwords($url[0]) . 'Controller.php')) {
            $this->defaultController = ucwords($url[0]) . 'Controller';
            unset($url[0]);
        }
        include_once '../app/controllers/' . $this->defaultController . '.php';
        $this->defaultController = new $this->defaultController;
        if (isset($url[1])) {
            if (method_exists($this->defaultController, $url[1])) {
                $this->defaultMethod = $url[1];
                unset($url[1]);
            }
        }
        $this->params = $url ? array_values($url) : [];
       
        call_user_func_array([$this->defaultController, $this->defaultMethod], $this->params);
    }

    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
