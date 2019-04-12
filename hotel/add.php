<?php

include_once '../libs/Database.php';
include_once '../libs/Checker.php';
include_once '../libs/commonResponses/OkResponse.php';
include_once '../libs/commonResponses/MissingFieldsOrInvalidCharactersResponse.php';

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");

Database::createDatabaseInstance();

if (Checker::areSetAndValidFields($_POST['hotelCif'], $_POST['cif'], $_POST['hotelName'], $_POST['hotelEmail'], $_POST['nickname'])) {
    if (Database::existsUniqueKeyValueOn("hotels", "hotelCif", $_POST['hotelCif'])) {
        echo json_encode((new HotelExistsResponse())->get());
    } else {
        Database::executeSQL("INSERT into hotels (hotelCif, cif, hotelName, hotelEmail, nickname) VALUES (?,?,?,?,?)",
            array($_POST['hotelCif'], $_POST['cif'], $_POST['hotelName'], $_POST['hotelEmail'], $_POST['nickname']));
        echo json_encode((new OkResponse())->get());
    }
} else {
    echo json_encode((new MissingFieldsOrInvalidCharactersResponse())->get());
}