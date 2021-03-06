<?php

include_once '../libs/Database.php';
include_once '../libs/Checker.php';
include_once '../libs/commonResponses/MissingFieldsOrInvalidCharactersResponse.php';
include_once '../libs/commonResponses/OkResponse.php';
include_once 'customResponses/ClientNotFoundResponse.php';

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");

Database::createDatabaseInstance();

if (Checker::areSetAndValidFields($_POST['id'])) {
    if (Database::existsUniqueKeyValueOn("clients", "id", $_POST['id'])) {
        Database::executeSQL("DELETE from clients WHERE id=?", array($_POST['id']));
        echo json_encode((new OkResponse())->get());
    } else {
        echo json_encode((new ClientNotFoundResponse())->get());
    }
} else {
    echo json_encode((new MissingFieldsOrInvalidCharactersResponse())->get());
}