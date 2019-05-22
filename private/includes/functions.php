<?php

function dbConnect() {

    try {
        $config = require __DIR__ . "/db_config.php";
        $dsn = 'mysql:host=' . $config['db_host'] . ';dbname=' . $config['db_name'];

        $connection = new PDO($dsn, $config['db_usern'], $config['db_passw']);

        return $connection;

    } catch (PDOException $e) {
        echo 'something not ok: ' . $e->getMessage();
    }

}