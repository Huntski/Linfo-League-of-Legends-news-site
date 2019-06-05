<?php

function dbConnect() {

    try {
        $config = require __DIR__ . "/config.php";
        $host = $config['db_host'];
        $dbname = $config['db_name'];

        $connection = new PDO("mysql:host=$host;dbname=$dbname", $config['db_usern'], $config['db_passw']);

        return $connection;

    } catch (PDOException $e) {
        echo 'something not ok: ' . $e->getMessage();
        die();
    }
}