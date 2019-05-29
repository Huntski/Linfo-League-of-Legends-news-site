<?php

require "../private/includes/functions.php";

class model {

    // -- articles --

    // get all articles in article table
    function getAllArticles() {

        $db = dbConnect();

        $sql = "SELECT a_id, a_title, a_par, a_img_links FROM linfo_articles ORDER BY a_datum desc LIMIT 15";
        $sm = $db->prepare($sql);
        if (!$sm->execute()) {
            return "something not ok";
        }

        return $sm->fetchAll(PDO::FETCH_CLASS);
    }

    // get specific article information
    function getArticle($id = null) {

        if (!$id) {
            return;
        }

        $db = dbConnect();

        $sql = "SELECT a_id, a_title, a_par, a_img_links FROM linfo_articles WHERE a_id = $id";

        $sm = $db->prepare($sql);
        if (!$sm->execute()) {
            return "something not ok";
        }

        return $sm->fetchAll(PDO::FETCH_CLASS);
    }

    // get a list of articles with a certain offset
    function getArticles($offset = 0, $limit = 6) {

        $db = dbConnect();

        $sql = "SELECT * FROM linfo_articles ORDER BY a_datum DESC LIMIT $limit OFFSET $offset";

        $sm = $db->prepare($sql);
        if (!$sm->execute()) {
            echo "something not ok (>o<)";
            die();
        }

        return $sm->fetchAll(PDO::FETCH_CLASS);
    }

    // get amount of articles in articles table
    function getArticleCount() {

        $db = dbConnect();

        $sql = "SELECT count(*) FROM linfo_articles";

        $sm = $db->prepare($sql);
        if (!$sm->execute()) {
            echo "kut php";
            die();
        }

        return (int)$sm->fetch()[0];
    }

    function searchArticle($query) {

        $db = dbConnect();

        $sql = "SELECT * FROM linfo_articles WHERE a_title LIKE %$query%";

        $sm = $db->prepare($sql);

        if (!$sm->execute()) {
            return "something went wrong";
        }

        return $sm->fetchAll(PDO::FETCH_CLASS);

    }

    // -- events --

    function getAllEvents() {

        require "../private/includes/functions.php";
        $db = dbConnect();

        $sql = "SELECT * FROM linfo_events";
        $sm = $db->prepare($sql);
        if (!$sm->execute()) {
            return "something not ok";
        }
        return $sm->fetchAll(\PDO::FETCH_ASSOC);
    }


    function getEvent($id = null) {

        require "../private/includes/functions.php";
        $db = dbConnect();

        $sql = "SELECT e_team1, e_team2, e_location FROM linfo_events";
        $sm = $db->prepare($sql);
        if (!$sm->execute()) {
            return "something not ok";
        }

        return $sm->fetchAll(\PDO::FETCH_ASSOC);
    }

    // -- user --

    function getUserInformation($user_id) {
        start_session();
        $user_id = $_SESSION['user'];

        $db = dbConnect();

        $sql = "SELECT `user_email`, `user_name` FROM linfo_accounts WHERE `user_id` = $user_id";

        $sm = $db->prepare($sql);

        if (!$sm->execute()) {
            die();
        }

        return $sm->fetchAll(PDO::FETCH_CLASS);
    }

    // check if email exist in database
    function checkEmail($email) {
        $db = dbConnect();

        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        $sql = "SELECT * FROM linfo_accounts WHERE email = $email";

        $sm = $db->prepare($sql);

        $result = $db->execute();

        return $result;
    }

    // check if password connects with email from database
    function checkPassword($email, $passw) {
        $db = dbConnect();

        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        $sql = "SELECT * FROM linfo_accounts WHERE email = $email";

        $sm = $db->prepare($sql);

        $result = $db->execute();

        return $result;
    }

}