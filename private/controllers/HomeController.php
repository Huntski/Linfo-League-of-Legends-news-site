<?php

require "../private/models/get_articles.php";

class HomeController {
    function loadPage($option = null) {
        try {

            $article = new articles;

            $allArticles = $article->getAllArticles();

        } catch (Exception $e) {
            echo "error found: $e";
            die();
        }

        if ($allArticles) {
            include "../private/views/templates/header.php";

            include "../private/views/templates/home.php";

            include "../private/views/templates/footer.php";
        }
    }
}