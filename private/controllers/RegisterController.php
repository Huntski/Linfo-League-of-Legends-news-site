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
                $model->registerUser($_POST['email'], $_POST['passw'], $_POST['username']);
            }
        }

        require "../private/views/engine.php";

        $template_engine = new template_engine;

        $template_engine->render("register", $empty);
    }
}