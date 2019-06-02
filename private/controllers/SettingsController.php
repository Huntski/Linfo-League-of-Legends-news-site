<?php

class SettingsController {
    function loadPage() {

        if (!isset($_SESSION['userid'])) {
            header("location: ./");
        }

        require "../private/models/model.php";

        $model = new model;

        if (isset($_POST['submit'])) {
            if ($_FILES['avatar_img']['size'] != 0 && $_FILES['avatar_img']['error'] == 0) {
                $result = $model->updateAvatar($_SESSION['userid'], $_FILES);
            }

            if (isset($_POST['usern'])) {
                if (!empty($_POST['usern'])) {
                    $result = $model->updateUsername($_SESSION['userid'], $_POST['usern']);
                }
            }

            if (isset($_POST['passw']) && $_POST['r-passw']) {
                if (!empty($_POST['passw']) && !empty($_POST['r-passw']) && $_POST['passw'] === $_POST['r-passw']) {
                    $model->updatePassword($_SESSION['userid'], filter_var($_POST['passw'], FILTER_SANITIZE_STRING));
                }
            }
        }

        require "../private/views/engine.php";

        $template_engine = new template_engine;

        $template_engine->render("settings");
    }
}