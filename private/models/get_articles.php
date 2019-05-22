<?php

class articles {
    function getArticles($option = "") {
        if ($option) {
            require __DIR__ . "../private/includes/functions.php";
            $db = dbConnect();
            switch ($option) {
                default:
                    break;
            }
            $sql = "SELECT * FROM articles DESC";
            // foreach () {
                
            // }
        }
    }

    function getSpecifiedArticle($id) {
        if (!$id) {
            return;
        }
        require "../private/includes/functions.php";
        $db = dbConnect();
        $sql = "SELECT * FROM linfo_articles WHERE id = $id";
        $sm = $db->prepare($sql);
        if (!$sm->execute()) {
            return "nothing was found";
        }
        $article_array = $sm->fetchAll();
        return $article_array;
    }
}