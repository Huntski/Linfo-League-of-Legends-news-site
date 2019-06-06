<?php

class template_engine {
    function render(...$data) {

        // the way I transfer data to templates needs to change

        if (!count($data)) die();

        include "templates/header.php";

        switch ($data[0]) {
            case "news":
                $article_list = $data[1];
                $articleCount = $data[2];
                $page = $data[3];
                include "templates/news.php";
                break;

            case "article":
                $article_info = $data[1];
                $article_comments = $data[2];
                $user_info = $data[3];
                include "templates/article.php";
                break;

            case "login":
                if (isset($data[1])) $error = true;
                include "templates/login.php";
                break;

            case "register":
                $empty = $data[1];
                include "templates/register.php";
                break;

            case "settings":
                include "templates/settings.php";
                break;

            case "account":
                $user_info = $data[1];
                $article_list = $data[2];
                include "templates/account.php";
                break;

            case "events":
                $event_list = $data[1];
                include "templates/events.php";
                break;

            default:
                $allArticles = $data[1];
                include "templates/home.php";
                break;
        }

        include "templates/footer.php";
    }
}