<?php

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

session_start();

require __DIR__ . "/../private/includes/router.php";

$router = new router;

$routes = $router->getRoutes();

if ($routes[0] == 'logout') {
    session_destroy();

    $uri = $router->getCoreUrl();

    header("location: $uri");
}

$controller = $router->getController($routes);

$extension = $router->checkExtension($routes);

if ($controller) {

    // echo $controller;
    try {
        $linkToController = "/../private/controllers/" . $controller . ".php";
        require __DIR__ . $linkToController;

        $controller = new $controller;

        require "../private/models/model.php";
        require "../private/views/engine.php";

        if ($extension) {
            $controller->loadPage($extension);
        } else {
            $controller->loadPage();
        }
    } catch (Exception $e) {
        echo $e;
        echo "<br> $controller";
    }
} else {
    echo "<h3 style='text-align: center;'>404 no page found</h3>";
    die();
}

// echo "plz work";