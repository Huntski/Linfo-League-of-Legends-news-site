<?php

class template_engine {
    function render(...$data) {

        include "templates/header.php";

        switch ($data[0]) {
            case "news":
                $article_list = $data[1];
                $articleCount = $data[2];
                include "templates/news.php";
                break;
            case "login":
                include "templates/login.php";
                break;
            default:
                $allArticles = $data[1];
                include "templates/home.php";
                break;
        }

        include "templates/footer.php";
    }
}