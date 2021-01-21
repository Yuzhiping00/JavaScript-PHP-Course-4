<?php

/**
 * Name: Zhiping Yu  Student Number: 000822513
 * File Created Date: 2020-11-17
 * Purpose: This file connects to the database
 */
try {
    $dbh = new PDO(
        "mysql:host=localhost;dbname=000822513",
        "000822513",
        "19900805"
    );
} catch (Exception $e) {
    die("ERROR: Couldn't connect. {$e->getMessage()}");
}
