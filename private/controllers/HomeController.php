<?php

class HomeController {
    function loadPage($option = null) {
        try {
            require "../private/models/get_articles.php";

            $article = new articles;

            $allArticles = $article->getAllArticles();

        } catch (Exception $e) {
            echo "error found: $e";
            die();
        }
        // echo "<pre>";
        // var_dump($allArticles);
        // echo "</pre>";
        // die();

        include "../private/views/templates/header.php";

        include "../private/views/templates/home.php";

        include "../private/views/templates/footer.php";
    }
}