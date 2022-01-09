<?php

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
        if ($path === null) return WEBROOT;
        else return WEBROOT . $path;
    }
}

if (!function_exists('css')) {
    function css($fileName)
    {
        return public_path("/css/$fileName.css");
    }
}

if (!function_exists('js')) {
    function js($fileName)
    {
        return public_path("/js/$fileName.js");
    }
}
