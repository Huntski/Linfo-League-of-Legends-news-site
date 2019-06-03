<?php

class RegisterController {
    function loadPage() {

        require "../private/models/model.php";

        $model = new model;

        $empty = array();

        if (isset($_POST['email']) && isset($_POST['passw']) && isset($_POST['r-passw']) && isset($_POST['usern'])) {

            if (empty($_POST['email'])) array_push($empty, "email");

            if (empty($_POST['passw'])) array_push($empty, "passw");

            if (empty($_POST['r-passw'])) array_push($empty, "r-passw");

            if (empty($_POST['usern'])) array_push($empty, "usern");

            if (!count($empty)) {
                // check if email & username already exist

                if ($model->exist("email", $_POST['email'])) {
                    echo $model->alert("email already exist");

                } elseif ($model->exist("usern", $_POST['usern'])) {
                    echo $model->alert("username already exist");

                } else {
                    $model->registerUser($model->generateUuid(), $_POST['email'], $_POST['passw'], $_POST['usern']);
                }
            }
        }

        require "../private/views/engine.php";

        $template_engine = new template_engine;

        $template_engine->render("register", $empty);
    }
}