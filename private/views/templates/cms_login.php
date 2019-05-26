<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login into cms</title>
</head>
<body>
    <form method="get">
        <input type="text" name="usern"
    </form>
</body>
</html>
<?php

function checkLogin($usern = null, $passw = null) {
    $db = dbConnect();

    $sql = "SELECT username FROM linfo_cms_accounts WHERE usern = $usern";

    $sm = $db->prepare($sql);

    if (!$sm->execute()) {
        echo "something went wrong";
        die();
    }
}

if (isset($_GET['submit'])) {
    $usern = filter_var($_POST['usern'], FILTER_SANITIZE_STRING);
    $passw = filter_var($_POST['password'], FILTER_SANITIZE_MAGIC_QUOTES);
    checkLogin($usern, $passw);
}