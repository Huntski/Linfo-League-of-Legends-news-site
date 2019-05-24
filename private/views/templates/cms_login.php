<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login into cms</title>
</head>
<body>
    <form method="get"></form>
</body>
</html>
<?php

if (isset($_GET['submit'])) {
    checkLogin();
}

function checkLogin($usern, $passw) {
    $db = $dbConnect();

    $sql = "SELECT username FROM linfo_cms_accounts WHERE usern = $usern";

    $sm = $db->prepare($sql);

    if (!$sm->execute()) {
        echo "something went wrong";
        die();
    }
}