<?php

class articles {
    function getAllArticles() {

        require "../private/includes/functions.php";
        $db = dbConnect();

        $sql = "SELECT a_id, a_title, a_par, a_img_links FROM linfo_articles LIMIT 15";
        $sm = $db->prepare($sql);
        if (!$sm->execute()) {
            return "something not ok";
        }

        return $sm->fetchAll(PDO::FETCH_CLASS);
    }

    function getArticle($id = null) {

        if (!$id) {
            return;
        }

        require "../private/includes/functions.php";
        $db = dbConnect();

        $sql = "SELECT a_id, a_title, a_par, a_img_links FROM linfo_articles WHERE a_id = $id";
        $sm = $db->prepare($sql);
        if (!$sm->execute()) {
            return "something not ok";
        }

        return $sm->fetchAll(PDO::FETCH_CLASS);
    }
}