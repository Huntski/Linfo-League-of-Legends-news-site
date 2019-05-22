<?php

class router {

    function getRoutes() {
        // get uri
        $basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
        $uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
        if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
        $uri = '/' . trim($uri, '/');
        // create array with all uri routes
        $uri_routes = array();
        $uri_routes = explode('/', $uri);

        // create array for only routes
        $routes = array();
        foreach($uri_routes as $route) {
            if(trim($route))
                array_push($routes, $route);
        }

        // return array with all routes
        if (count($routes) === 0) {
            array_push($routes, "home");
        }
        return $routes;
    }

    function getController($routes) {
        switch ($routes[0]) {
            case "players":
                $controller = "PlayersController";
                break;
            case "articles":
                $controller = "ArticlesController";
                break;
            case "events":
                $controller = "EventsController";
                break;
            default:
                $controller = "HomeController";
                break;
        }
        return $controller;
    }

}