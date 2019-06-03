<?php

class SettingsController {
    function loadPage() {

        require "../private/models/model.php";

        $model = new model;

        if (isset($_POST['submit'])) { // check if something is submitted

            if (!empty($_POST['validate'])) { // check if vvalidate passw input is not empty

                if ($model->checkPassword($_SESSION['userid'], $_POST['validate'])) { // check if password is correct

                    if ($_FILES['avatar_img']['size'] != 0 && $_FILES['avatar_img']['error'] == 0) {
                        $model->updateAvatar($_SESSION['userid'], $_FILES);
                    }

                    if (isset($_POST['usern'])) {
                        if (!$model->exist("usern", $_POST['usern'])) {
                            if (!empty($_POST['usern'])) {
                                $result = $model->updateUsername($_SESSION['userid'], $_POST['usern']);
                            }
                        } else {
                            echo $model->alert("username already exist");
                        }
                    }

                    if (isset($_POST['passw']) && $_POST['r-passw']) {
                        if (!empty($_POST['passw']) && !empty($_POST['r-passw']) && $_POST['passw'] === $_POST['r-passw']) {
                            $model->updatePassword($_SESSION['userid'], filter_var($_POST['passw'], FILTER_SANITIZE_STRING));
                        }
                    }

                    echo $model->alert("settings submitted successfully");

                } else {
                    echo $model->alert("current password is incorrect");
                }
            } else {
                echo $model->alert("please enter your current password");
            }
        }

        require "../private/views/engine.php";

        $template_engine = new template_engine;

        $template_engine->render("settings");
    }
}