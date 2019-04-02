<?php

include_once '../libs/Database.php';
include_once '../libs/Checker.php';
include_once '../libs/commonResponses/OkResponse.php';
include_once '../libs/commonResponses/MissingFieldsOrInvalidCharactersResponse.php';
include_once 'customResponses/ClientExistsResponse.php';

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");

Database::createDatabaseInstance();

if (Checker::areSetAndValidFields($_POST['clientName'], $_POST['cif'], $_POST['email'], $_POST['nickname'])) {
    if (Database::existsUniqueKeyValueOn("clients", "cif", $_POST['cif'])) {
        echo json_encode((new ClientExistsResponse())->get());
    } else {
        Database::executeSQL("INSERT into clients (clientName, cif, email, nickname) VALUES (?,?,?,?)",
            array($_POST['clientName'], $_POST['cif'], $_POST['email'], $_POST['nickname']));
        echo json_encode((new OkResponse())->get());
    }
} else {
    echo json_encode((new MissingFieldsOrInvalidCharactersResponse())->get());
}