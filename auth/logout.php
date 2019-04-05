<?php

include_once '../libs/Database.php';
include_once '../libs/Checker.php';
include_once '../libs/commonResponses/MissingFieldsOrInvalidCharactersResponse.php';
include_once '../libs/commonResponses/OkResponse.php';
include_once '../libs/commonResponses/NotAuthenticatedResponse.php';

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");

Database::createDatabaseInstance();

if (Checker::areSetAndValidFields($_POST['username'], $_POST['token'])) {
    if (Database::isValidTokenForUser($_POST['username'], $_POST['token'])) {
        Database::updateTokenForUser($_POST['username'], "");
        echo json_encode((new OkResponse())->get());
    } else {
        echo json_encode((new NotAuthenticatedResponse())->get());
    }
} else {
    echo json_encode((new MissingFieldsOrInvalidCharactersResponse())->get());
}
