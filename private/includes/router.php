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
                if (!isset($_SESSION['userid'])) {
                    header("location: ./register");
                }
                $controller = "PlayersController";
                break;

            case strpos($routes[0], "news"):
                if (!isset($_SESSION['userid'])) {
                    header("location: ./register");
                }
                $controller = "NewsController";
                break;

            case "events":
                if (!isset($_SESSION['userid'])) {
                    header("location: ./register");
                }
                $controller = "EventsController";
                break;

            case "login":
                $controller = "LoginController";
                break;

            case "settings":
                if (!isset($_SESSION['userid'])) {
                    header("location: ./register");
                }
                $controller = "SettingsController";
                break;

            case "register":
                $controller = "RegisterController";
                break;

            case "home":
                $controller = "HomeController";
                break;

            case strpos($routes[0], "article"):
                if (!isset($_SESSION['userid'])) {
                    header("location: ./register");
                }
                $controller = "ArticleController";
                break;

            case "cms":
                $controller = "AdminController";
                break;

            default:
                if (!isset($_SESSION['userid'])) {
                    header("location: ./welcome");
                }
                $controller = "HomeController";
                break;
        }
        return $controller;
    }

    function getCoreUrl() {
        $basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
        return $basepath;
    }

    function getUrl() {
        $url = $_SERVER['REQUEST_URI'];
        return $url;
    }

    function checkPage($routes) {
        if (!strpos( $routes[0], "-")) return false;

        return (int)explode("-", $routes[0])[1];
    }

}