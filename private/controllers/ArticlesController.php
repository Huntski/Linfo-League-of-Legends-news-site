<?php

class ArticlesController {
    function loadPage($option = null) {
        require "../private/models/get_articles.php";

        $article = new articles;
        if ($option) {
            $article_info = $article->getArticle($option);
        } else {
            $allArticles_info = $article->getAllArticles();
        }
    }
}