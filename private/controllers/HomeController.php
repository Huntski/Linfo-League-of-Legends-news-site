<?php

class HomeController {
    function loadPage($option = null) {

        require "../private/models/get_articles.php";
        $aritlce = new articles;

        if ($option) {
            $article_info = $aritlce->getArticle($option);
        } else {
            $allArticles = $aritlce->getAllArticles();
        }

        echo "<pre>";
        var_dump($allArticles_info);
        echo "</pre>";
    }
}