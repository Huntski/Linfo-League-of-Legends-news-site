<?php

session_start();

require __DIR__ . "/../private/includes/router.php";

$router = new router;

$routes = $router->getRoutes();

$controller = $router->getController($routes);

// echo $controller;

if ($controller) {
    try {
        $linkToController = "/../private/controllers/" . $controller . ".php";
        require __DIR__ . $linkToController;

        $controller = new $controller;
        if (isset($routes[1])) {
            chdir(".");
            echo "AAAAAAAAAAAAA";
            $controller->loadPage($routes[1]);
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