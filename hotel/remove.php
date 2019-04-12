<?php

include_once '../libs/Database.php';
include_once '../libs/Checker.php';

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");

Database::createDatabaseInstance();

if (Checker::areSetAndValidFields($_POST['hotelCif'])) {
    Database::executeSQL("DELETE from hotels WHERE hotelCif=?", array($_POST['hotelCif']));
    echo json_encode(array("message" => "OK"));
} else {
    echo json_encode(array("message" => "ERR: missing fields or invalid characters"));
}
