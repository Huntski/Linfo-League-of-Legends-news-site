<?php

$debug = true;

class LoginController {
    function loadPage() {

        $router = new router;

        $uri = $router->getCoreUrl();

        if (isset($_SESSION['userid'])) {
            header("location: $uri");
        }

        $error = false;

        if (isset($_POST['email']) && isset($_POST['passw'])) {

            $model = new model;

            if (filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)) {

                $user_id = $model->loginUser($_POST['email'], $_POST['passw']);

                if ($user_id) {

                    $_SESSION['userid'] = $user_id;

                    header("location: $uri");
                } else {
                    $error = true;
                }
            }
        }

        $template_engine = new template_engine;

        $template_engine->render("login", $error);
    }
}