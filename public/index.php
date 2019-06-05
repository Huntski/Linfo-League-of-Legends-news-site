<?php

// error_reporting(0);

session_start();

require __DIR__ . "/../private/includes/router.php";

$router = new router;

$routes = $router->getRoutes();

if ($routes[0] == 'logout') {
    session_destroy();
    header("location: ./");
}

$controller = $router->getController($routes);

$page = $router->checkPage($routes);

// echo $controller;

if ($controller) {
    try {
        $linkToController = "/../private/controllers/" . $controller . ".php";
        require __DIR__ . $linkToController;

        $controller = new $controller;

        if ($page) {
            $controller->loadPage($page);
        }
        $controller->loadPage();
    } catch (Exception $e) {
        echo $e;
        echo "<br> $controller";
    }
} else {
    echo "<h3 style='text-align: center;'>404 no page found</h3>";
    die();
}

// echo "plz work";