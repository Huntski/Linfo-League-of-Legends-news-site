<?php

$debug = true;

class NewsController {
    function loadPage($option = 0) {

        if (!filter_var($option, FILTER_VALIDATE_INT)) { // check if option is int
            if ($option != 0) {
                echo "na na naaa.. found something suspicious";
                die();
            }
        }

        require "../private/models/model.php";

        $model = new model;

        define("LIST_LIMIT", 12);

        if ($option != 1) {
            $offset = $option;
        } else {
            $offset = $option * LIST_LIMIT;
        }

        $article_list = $model->getArticles($offset, LIST_LIMIT);

        $articleCount = $model->getArticleCount();

        if (isset($articleCount)) {

            require "../private/views/engine.php";

            $template_engine = new template_engine;

            $template_engine->render("news", $article_list, $articleCount);

        } else {
            echo "no articles found";
        }
    }
}