<?php

include_once '../lib/Database.php';
include_once '../lib/Checker.php';

header("Content-Type: application/json; charset=UTF-8");

Database::createDatabaseInstance();

if (Checker::areSetAndValidFields($_POST['id'])) {
    Database::exec(sprintf("DELETE from clients WHERE id=%d", $_POST['id']));
    echo json_encode(array("message" => "OK"));
} else {
    echo json_encode(array("message" => "ERR: missing fields or invalid characters"));
}