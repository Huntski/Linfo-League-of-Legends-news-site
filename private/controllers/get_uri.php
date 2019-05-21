<?php

function getRoutes() 
{
    // get uri
    $basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
    $uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
    if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
    $uri = '/' . trim($uri, '/');
    // create array with all uri routes
    $routes = array();
    $routes = explode('/', $uri);
    foreach($routes as $route)
    {
        if(trim($route) != '')
            array_push($routes, $route);
    }

    return $routes;
}
