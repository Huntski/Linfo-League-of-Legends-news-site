<?php

class HomeController {
    function loadPage() {
        $debug = true;
        try {

            $model = new model;

            if (isset($_SESSION['userid'])) {
                $user_info = $model->getUserInformation($_SESSION['userid']);
                if ($debug) echo "<script type='text/javascript'>console.log('Found: USER_INFO')</script>";
            }

            $allArticles = $model->getArticles(0, 7);
            echo "articles: <br><pre>";
            // var_dump($allArticles);
            echo "</pre>";
            if ($debug) echo "<script type='text/javascript'>console.log('Found: ARTICLE_LIST')</script>";
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