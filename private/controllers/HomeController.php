<?php

class HomeController {
    function loadPage($option) {
        // print_r(scandir(""));
        // require __DIR__ . "/../private/models/articles.php";
        require "../private/models/get_articles.php";

        $aritlce = new articles;
        if ($option) {
            echo $option;
        }

        echo "test";
        var_dump($option);
    }
}