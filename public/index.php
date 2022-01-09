<?php

use App\Routes\Route;

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));
define('WEBROOT', 'http://localhost/ownMvc');

include_once '..' . DS . 'app' . DS . 'bootstrap.php';



$route = new Route;


//  http handler ...Curl
//  seasion and cookie...