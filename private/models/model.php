<?php

require "../private/includes/functions.php";

/*
    The prepare and execute and return should be in a function on my next project
    so my code is less repeated.

    Because the only thing that changes each function is pretty much just the sql

    Also I need to redifine how I show errors

    Any criticism om my code is 100% welcome
*/

class model {

    // ------------ get all articles in article table ------------

    function getAllArticles() {

        $db = dbConnect();

        $sql = "SELECT a_id, a_title, a_par, a_img_links FROM linfo_articles ORDER BY a_datum desc LIMIT 15";
        $sm = $db->prepare($sql);
        if (!$sm->execute()) {
            echo "something not ok <br>";
            echo "error-code: 1";
        }

        return $sm->fetchAll(\PDO::FETCH_CLASS);
    }

    // ------------ get specific article information ------------
    
    function getArticle($id = null) {

        if (!$id) {
            return;
        }

        $db = dbConnect();

        $sql = "SELECT a_id, a_title, a_par, a_img_links FROM linfo_articles WHERE a_id = $id";

        $sm = $db->prepare($sql);
        if (!$sm->execute()) {
            echo "something not ok <br>";
            echo "error-code: 2";
        }

        return $sm->fetchAll(\PDO::FETCH_CLASS)[0];
    }

    function getArticlesThroughSaves(...$data) {

        $db = dbConnect();

        $sql = "";

        $range = count($data);

        $last_post = $data[0][$range];

        foreach ($data[0] as $post_id) {
            $sql .= "(SELECT * FROM linfo_articles WHERE a_id = $post_id->post_id)";
            if ($post_id->post_id != $last_post->post_id) {
                $sql .= " union ";
            }
        }

        $sm = $db->prepare($sql);

        if (!$sm->execute()) {
            echo "something not ok <br>";
            echo "error-code: 93";
            die();
        }

        return $sm->fetchAll(\PDO::FETCH_CLASS);
    }

    // ------------ get a list of articles with a certain offset ------------

    function getArticles($offset = 0, $limit = 6) {

        $db = dbConnect();

        $sql = "SELECT * FROM linfo_articles ORDER BY a_datum DESC LIMIT $limit OFFSET $offset";

        $sm = $db->prepare($sql);
        if (!$sm->execute()) {
            echo "something not ok <br>";
            echo "error-code: 3";
            die();
        }

        return $sm->fetchAll(\PDO::FETCH_CLASS);
    }

    // ------------ get amount of articles in articles table ------------

    function getArticleCount() {

        $db = dbConnect();

        $sql = "SELECT count(*) FROM linfo_articles";

        $sm = $db->prepare($sql);
        if (!$sm->execute()) {
            echo "something not ok <br>";
            echo "error-code: 4";
            die();
        }

        return (int)$sm->fetch()[0];
    }

    // ------------ search specific article ------------

    function searchArticle($query) {

        $db = dbConnect();

        $sql = "SELECT * FROM linfo_articles WHERE a_title LIKE concat('%', :query, '%')";

        $sm = $db->prepare($sql);

        if (!$sm->execute(array('query' => $query))) {
            echo "something not ok <br>";
            echo "error-code: 5";
        }

        return $sm->fetchAll(\PDO::FETCH_CLASS);
    }

    // ------------ get all comments from specific post ------------

    function getArticleComments($post_id) {

        $db = dbConnect();

        $sql = "SELECT user_id, comment FROM linfo_comments WHERE post_id = :id ORDER BY `date` DESC";

        $sm = $db->prepare($sql);

        if (!$sm->execute(array('id' => $post_id))) {
            echo "something not ok <br>";
            echo "error-code: 6";
            die();
        }

        return $sm->fetchAll(\PDO::FETCH_CLASS);
    }

    // ------------ post comment ------------

    function postComment($user_info, $article_id, $comment) {

        $comment = htmlspecialchars($comment);

        $db = dbConnect();

        $sql = "INSERT INTO linfo_comments (post_id, `user_id`, comment) VALUES (?, ?, ?)";

        $sm = $db->prepare($sql);

        $data = array($article_id, $user_info->user_id, $comment);

        if (!$sm->execute($data)) {
            echo "something not ok <br>";
            echo "error-code: 7";
            die();
        }
    }

    // -- events --

    function getAllEvents() {

        $db = dbConnect();

        $sql = "SELECT * FROM linfo_events";
        $sm = $db->prepare($sql);
        if (!$sm->execute()) {
            echo "something not ok <br>";
            echo "error-code: 8";
        }
        return $sm->fetchAll(\PDO::FETCH_ASSOC);
    }


    function getEvent($id = null) {

        $db = dbConnect();

        $sql = "SELECT e_team1, e_team2, e_location FROM linfo_events";
        $sm = $db->prepare($sql);
        if (!$sm->execute()) {
            echo "something not ok <br>";
            echo "error-code: 9";
        }

        return $sm->fetchAll(\PDO::FETCH_ASSOC);
    }

    // ------------ get user information ------------

    function getUserInformation($query, $type = null) {

        if ($type == null || $type == 'id') {
            $sql = "SELECT `user_name`, `user_avatar`, `user_id` FROM `linfo_users` WHERE `user_id` = '$query'";
        } elseif ($type == 'name') {
            $sql = "SELECT `user_name`, `user_avatar`, `user_id` FROM `linfo_users` WHERE lower(`user_name`) = lower('$query')";
        }

        $db = dbConnect();

        $sm = $db->prepare($sql);

        if (!$sm->execute()) {
            echo "something not ok <br>";
            echo "error-code: 10";
            die();
        }

        return $sm->fetchAll(\PDO::FETCH_CLASS)[0];
    }

    function getUserSaves($user_id) {

        $db = dbConnect();

        $sql = "SELECT `post_id` FROM linfo_saves WHERE `user_id` = '$user_id'";

        $sm = $db->prepare($sql);

        if (!$sm->execute()) {
            echo "something not ok <br>";
            echo "error-code: 10";
            die();
        }

        return $sm->fetchAll(\PDO::FETCH_CLASS);
    }

    // ------------ login user ------------

    function loginUser($email, $passw) {

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);

            $db = dbConnect();

            $sql = "SELECT user_passw FROM `linfo_users` WHERE user_email = '$email'";

            $sm = $db->prepare($sql);

            if (!$sm->execute()) {
                echo "something not ok <br>";
                echo "error-code: 11";
                die();
            }

            $passw_id_db = $sm->fetchColumn();

            if (password_verify($passw, $passw_id_db)) {

                $sql = "SELECT user_id FROM `linfo_users` WHERE user_email = '$email'";

                $sm = $db->prepare($sql);

                if (!$sm->execute()) {
                    echo "something not ok <br>";
                    echo "error-code: 12";
                    die();
                }

                return $sm->fetchColumn();
            } else {
                return false;
            }
        }
    }

    // ------------ register user ------------

    function registerUser($user_id, $email, $passw, $usern) {

        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        $usern = filter_var($usern, FILTER_SANITIZE_STRING);

        $passw = password_hash($passw, PASSWORD_ARGON2I);

        $sql = "INSERT INTO linfo_users (`user_id`, `user_email`, `user_passw`, `user_name`) VALUES (?, ?, ?, ?)";
        $data = array($user_id, $email, $passw, $usern);

        $db = dbConnect();

        $sm = $db->prepare($sql);

        if (!$sm->execute($data)) {
            echo "something not ok <br>";
            echo "error-code: 13";
            die();
        }

        $_SESSION['userid'] = $user_id;

        header("location: ./");
    }

    // ------------ save article for user ------------

    function saveArticle($article_id, $user_id) {

        $db = dbConnect();

        // check if already in article

        $sql = "SELECT `post_id`, `user_id` FROM linfo_saves WHERE `post_id` = ? AND `user_id` = ?";

        $sm = $db->prepare($sql);

        $data = array($article_id, $user_id);

        if (!$sm->execute($data)) {
            echo "something not ok <br>";
            echo "error-code: 73";
            die();
        }

        if (count($sm->fetchAll())) {
            return false;
        }

        // if not in db save article

        $sql = "INSERT INTO linfo_saves (`post_id`, `user_id`) VALUES (?, ?)";

        $sm = $db->prepare($sql);

        $data = array($article_id, $user_id);

        if (!$sm->execute($data)) {
            echo "something not ok <br>";
            echo "error-code: 78";
            die();
        }

        return true;
    }

    function removeSavedArticle($article_id, $user_id) {

        $db = dbConnect();

        $sql = "DELETE FROM linfo_saves WHERE `user_id` = ? AND `post_id` = ?";

        $sm = $db->prepare($sql);
        $data = array();

        if ($sm->execute($data)) {
            echo "something not ok <br>";
            echo "error-code: 22";
            die();
        }
    }


    // ------------ check logged in password ------------

    function checkPassword($user_id, $passw) {

        $db = dbConnect();

        $sql = "SELECT user_passw FROM `linfo_users` WHERE `user_id` = '$user_id'";

        $sm = $db->prepare($sql);

        if (!$sm->execute()) {
            echo "something not ok <br>";
            echo "error-code: 61";
            die();
        }

        $passw_id_db = $sm->fetchColumn();

        if (password_verify($passw, $passw_id_db)) {

            return true;
        } else {

            return false;
        }
    }

    // ------------ update user settings ------------

    function updateAvatar($user_id, $img) {
        $target_dir = "img/avatar/";
        $target_file = $target_dir . basename($img["avatar_img"]["name"]);

        if (!file_exists($target_file)) {
            if (!move_uploaded_file($_FILES["avatar_img"]["tmp_name"], $target_file)) {
                return false;
            }
        }

        $sql = "UPDATE linfo_users SET user_avatar = ? WHERE user_id = ?";

        $db = dbConnect();

        $sm = $db->prepare($sql);

        $data = array(basename($img["avatar_img"]["name"]), $user_id);

        if (!$sm->execute($data)) {
            echo "something not ok <br>";
            echo "error-code: 14";
            die();
        }
    }

    function updateUsername($user_id, $usern) {

        $db = dbConnect();

        $sql = "UPDATE linfo_users SET user_name = ? WHERE user_id = ?";

        $sm = $db->prepare($sql);

        $data = array($usern, $user_id);

        if (!$sm->execute($data)) {
            echo "something not ok <br>";
            echo "error-code: 15";
            die();
        }
    }

    function updatePassword($user_id, $passw) {

        $db = dbConnect();

        $sql = "UPDATE linfo_users SET user_passw = :passw WHERE user_id = :id";

        $sm = $db->prepare($sql);

        $data = array('passw' => password_hash($passw, PASSWORD_ARGON2I), 'id' => $user_id);

        if (!$sm->execute($data)) {
            echo "something not ok <br>";
            echo "error-code: 16";
            die();
        }
    }


    function exist($type, $query) {

        $query = filter_var($query, FILTER_SANITIZE_STRING);

        switch ($type) {
            case "usern":
                $sql = "SELECT `user_name` FROM linfo_users WHERE lower(`user_name`) = lower(:query)";
                break;
            case "email":
                $sql = "SELECT `user_email` FROM linfo_users WHERE lower(`user_email`) = lower(:query)";
                break;
            default:
                echo "type not found";
                die();
        }

        $db = dbConnect();

        $sm = $db->prepare($sql);

        if (!$sm->execute(array('query' => $query))) {
            echo "something not ok <br>";
            echo "error-code: 83";
            die();
        }

        if ($sm->fetchColumn()) {
            return true;
        } else {
            return false;
        }
    }

    function alert($query) {
        return "<script type='text/javascript'>alert('".$query."'); </script>";
    }

    // generate random uuid for user
    function generateUuid() {

        $data = openssl_random_pseudo_bytes(16);
        assert(strlen($data) == 16);

        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
}