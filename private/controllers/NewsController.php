<?php

class NewsController {
    function loadPage($page = 1) {

        $model = new model;

        define("LIST_LIMIT", 6);

        if ($page <= 1) {
            $offset = 0;
        } else {
            $offset = $page * LIST_LIMIT - LIST_LIMIT;
        }

        $article_list = $model->getArticles($offset, LIST_LIMIT);

        $articleCount = $model->getArticleCount();

        if (isset($articleCount)) {

            $template_engine = new template_engine;

            $template_engine->render("news", $article_list, $articleCount, $page);

        } else {
            echo "no articles found";
        }
    }
}