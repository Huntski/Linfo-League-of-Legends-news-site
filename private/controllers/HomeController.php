<?php

class HomeController {
    function loadPage() {
        try {

            $model = new model;

            if (isset($_SESSION['userid'])) {
                $user_info = $model->getUserInformation($_SESSION['userid']);
            }

            $allArticles = $model->getArticles(0, 7);

        } catch (\Exception $e) {
            echo "error found: $e";
            die();
        }

        if ($allArticles) {

            $template_engine = new template_engine;

            $template_engine->render("home", $allArticles);
        }
    }
}