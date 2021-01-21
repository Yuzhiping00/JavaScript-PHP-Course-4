
<?php
/**
 * Name: Zhiping Yu  Student Number: 000822513
 * File Created Date: 2020-11-17
 * Purpose: This file receives GET parameters for a new item 
 *          and inserts it into the database. 
 * 
 * 
 */


include "connect.php";
// validate the values user inputs
$item = filter_input(INPUT_GET, "item", FILTER_SANITIZE_SPECIAL_CHARS);
$quantity = filter_input(INPUT_GET, "quantity", FILTER_VALIDATE_INT);

// Insert a new item into the shoppinlist table in the database
$command = "INSERT INTO shoppinglist(item,quantity) VALUES(?,?)";
$stmt = $dbh->prepare($command);
$params = [$item, $quantity];
$success = $stmt->execute($params);
?>