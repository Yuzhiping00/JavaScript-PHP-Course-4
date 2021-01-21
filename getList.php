<?php

/**
 * Name: Zhiping Yu  Student Number: 000822513
 * File Created Date: 2020-11-17
 * Purpose: This file gets the entire table from the database, 
 *          sorted alphabetically, creates an array of item 
 *          objects (i.e. an array of associative arrays), 
 *          and outputs a JSON encoding of this array. 
 */

include "connect.php";

// Prepare and execute the DB query
$command = "SELECT item, quantity FROM shoppinglist ORDER BY item";
$stmt = $dbh->prepare($command);
$success = $stmt->execute();

// Fill an array with Item objects based on the results.
$shoppinglist = [];
while ($row = $stmt->fetch()) {
    $item = [
        "item" => $row["item"],
        "quantity" => (int) $row["quantity"]
    ];
    array_push($shoppinglist, $item);
}

// Write the json encoded array to the HTTP Response
echo json_encode($shoppinglist);
