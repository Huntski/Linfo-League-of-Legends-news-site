<?php

class ArticlesController {
    function loadPage($option) {
        require "../private/models/get_articles.php";

        $article = new articles;
        if ($option) {
            $article_info = $article->getSpecifiedArticle($option);
        }
        print_r($article_info);
        return;
    }
}