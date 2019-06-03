<?php

class NewsController {
    function loadPage($page = 1) {

        require "../private/models/model.php";

        $model = new model;

        define("LIST_LIMIT", 6);

        if ($page <= 1) {
            $offset = $page;
        } else {
            $offset = $page * LIST_LIMIT - LIST_LIMIT;
        }

        $article_list = $model->getArticles($offset, LIST_LIMIT);

        $articleCount = $model->getArticleCount();

        if (isset($articleCount)) {

            require "../private/views/engine.php";

            $template_engine = new template_engine;

            $template_engine->render("news", $article_list, $articleCount, $page);

        } else {
            echo "no articles found";
        }
    }
}