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

    // get all information from user
    function getUserInformation($user_id) {

        $db = dbConnect();

        $sql = "SELECT `user_name`, `user_avatar` FROM `linfo_users` WHERE `user_id` = '$user_id'";

        $sm = $db->prepare($sql);

        if (!$sm->execute()) {
            echo "something not ok";
            die();
        }

        return $sm->fetchAll(\PDO::FETCH_CLASS)[0];
    }

    function loginUser($email, $passw) {

        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        $db = dbConnect();

        $sql = "SELECT user_passw FROM `linfo_users` WHERE user_email = '$email'";

        $sm = $db->prepare($sql);

        if (!$sm->execute()) {
            echo "something not ok";
            die();
        }

        $passw_id_db = $sm->fetchColumn();

        if (!$passw_id_db) return "login failed";

        if (password_verify($passw, $passw_id_db)) {

            $sql = "SELECT user_id FROM `linfo_users` WHERE user_email = '$email'";

            $sm = $db->prepare($sql);

            if (!$sm->execute()) {
                echo "something not ok";
                die();
            }

            return $sm->fetchColumn();
        } else {
            return "login failed";
        }
    }

    // validate input
    function validateRegister($email, $passw, $passw_repeat) {
        $errors = array();

        // check if email is email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "email");
        }

        // check if passw is same as passw repeat
        $passw = filter_var($passw, FILTER_SANITIZE_STRING);
        $passw_repeat = filter_var($passw_repeat, FILTER_SANITIZE_STRING);;
        if ($passw !== $passw_repeat) {
            array_push($errors, "passw not same");
        }

        return $errors;
    }

    // generate random uuid for user
    function generateUuid() {
        $data = openssl_random_pseudo_bytes(16);
        assert(strlen($data) == 16);

        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10

        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
}