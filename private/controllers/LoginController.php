<?php

$debug = true;

class LoginController {
    function loadPage() {

        if (isset($_SESSION['userid'])) {
            header("location: ./");
        }

        require "../private/models/model.php";

        $error = false;

        if (isset($_POST['email']) && isset($_POST['passw'])) {

            $model = new model;

            if (filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)) {

                $user_id = $model->loginUser($_POST['email'], $_POST['passw']);

                if ($user_id != 'error') {

                    // echo "<br> $user_id <br>";

                    $_SESSION['userid'] = $user_id;

                    header("location: ./");
                }

                echo $_POST['email'] . "<br>";
                echo $_POST['passw'] . "<br>";
            }
        }

        require "../private/views/engine.php";

        $template_engine = new template_engine;

        $template_engine->render("login", $error);
    }
}