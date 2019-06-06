<?php

class SettingsController {
    function loadPage() {

        $model = new model;

        if (isset($_POST['submit'])) { // check if something is submitted

            $submitted = false;

                if ($_FILES['avatar_img']['size'] != 0 && $_FILES['avatar_img']['error'] == 0) {

                    $imageFileType = strtolower(pathinfo(basename($_FILES["avatar_img"]["name"]), PATHINFO_EXTENSION));

                    if ($imageFileType != 'gif' && $imageFileType != 'jpg' && $imageFileType != 'jpeg' && $imageFileType != 'png') {
                        echo $model->alert("only png, jpg and gif allowed");
                    } else {
                        $model->updateAvatar($_SESSION['userid'], $_FILES);

                        $submitted = true;
                    }
                }

                if (isset($_POST['usern'])) {
                    if (!empty($_POST['usern'])) {
                        if (!$model->exist("usern", $_POST['usern'])) {

                            $model->updateUsername($_SESSION['userid'], $_POST['usern']);

                            $submitted = true;
                        } else {
                            echo $model->alert("username already exist");
                        }
                    }
                }

                if ($submitted) {
                    echo $model->alert("settings submitted successfully");

                    $router = new router;

                    $url = $router->getUrl();

                    header("location: $url");
                }
        }

        $template_engine = new template_engine;

        $template_engine->render("settings");
    }
}