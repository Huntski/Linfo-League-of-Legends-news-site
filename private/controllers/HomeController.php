<?php

class HomeController {
    function loadPage($option = null) {
        try {

            require "../private/models/model.php";

            $model = new model;

            if (isset($_SESSION['userid'])) {
                $user_info = $model->getUserInformation($_SESSION['userid']);
            }

            $allArticles = $model->getArticles(0, 4);

        } catch (Exception $e) {
            echo "error found: $e";
            die();
        }

        if ($allArticles) {
            require "../private/views/engine.php";

            $template_engine = new template_engine;

            $template_engine->render("home", $allArticles);
        }
    }
}