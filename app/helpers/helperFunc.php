<?php

use App\Core\View;
use App\Libraries\DotEnv;

function dd($data)
{
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    exit;
}

if (!function_exists('public_path')) {
    function public_path($path = null)
    {
        if ($path === null) return APP_URL;
        else return APP_URL . $path;
    }
}

if (!function_exists('css')) {
    function css($fileName)
    {
        return public_path("/css/$fileName.css");
    }
}

if (!function_exists('route')) {
    function route($url)
    {
        return APP_URL . $url;
    }
}

if (!function_exists('redirectTo')) {
    function redirectTo($url)
    {
        $path = APP_URL . $url;
        header("Location: $path");
    }
}

if (!function_exists('js')) {
    function js($fileName)
    {
        return public_path("/js/$fileName.js");
    }
}


if (!function_exists('img_path')) {
    function img_path($path)
    {
        return public_path(("/img/$path"));
    }
}

if (!function_exists('view')) {
    function view($path, $data = [])
    {
        $view = new View();
        return $view->LoadView($path, $data);
    }
}



if (!function_exists('envPath')) {
    function envPath($path)
    {
        return DotEnv::setPath($path);
    }
}

if (!function_exists('env')) {
    function env($key)
    {
        return DotEnv::get_env($key);
    }
}

if (!function_exists('setEnv')) {
    function setEnv(...$arr)
    {
        // $args = func_get_args();
        return DotEnv::set_env($arr[0]);
    }
}

if (!function_exists('envUpdate')) {
    function envUpdate($key, $val)
    {
        return DotEnv::update($key, $val);
    }
}
