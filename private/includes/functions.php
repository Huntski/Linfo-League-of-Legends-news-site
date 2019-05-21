<?php

function dbConnect($config) {

    try {
        $dsn = 'mysql:host=' . $config['DB_HOST'] . ';dbname=' . $config['DB_NAME'];

        $connection = new PDO($dsn, $config['DB_USER'], $config['DB_PASSWORD']);

        return $connection;

    } catch (\PDOException $e) {
        echo 'something not ok: ' . $e->getMessage();
    }

}