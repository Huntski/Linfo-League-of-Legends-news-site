<?php

class RegisterController {
    function loadPage() {

        if (isset($_SESSION['userid'])) {
            header("location: ./");
        }

        require "../private/models/model.php";

        $model = new model;

        $empty = array();

        $errors = array();

        // if (isset($_POST['email']) && isset($_POST['passw']) && isset($_POST['repeat-passw']) &&isset($_POST['username'])) {

        //     if (empty($_POST['email'])) array_push($empty, "email");

        //     if (empty($_POST['passw'])) array_push($empty, "passw");

        //     if (empty($_POST['repeat-passw'])) array_push($empty, "repeat-passw");

        //     if (empty($_POST['username'])) array_push($empty, "username");

        //     if (!$empty) {

        //         $errors = $model->validateRegister($_POST['email'], $_POST['passw'], $_POST['repeat-passw']);

        //         if (!$errors) {
        //             $model->registerUser($_POST['email'], $_POST['passw'], $_POST['repeat-passw'], $_POST['username']);
        //         }
        //     }
        // }

        require "../private/views/engine.php";

        $template_engine = new template_engine;

        $template_engine->render("register", $errors, $empty);

        echo $model->generateUuid();

        echo password_hash("Molly3Lisa", PASSWORD_ARGON2I);
    }
}