<?php

if (isset($_POST['email']) && isset($_POST['passw'])) {
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

        $passw = filter_var($_POST['passw'], FILTER_SANITIZE_STRING);
    }
}

require "../private/models/get_validate.php";

function checkEmail($email) {


    return ;
}