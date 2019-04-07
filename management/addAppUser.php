<?php

include_once '../libs/Database.php';
include_once '../libs/Checker.php';
include_once '../libs/commonResponses/MissingFieldsOrInvalidCharactersResponse.php';
include_once '../libs/commonResponses/NotAuthenticatedResponse.php';
include_once '../libs/commonResponses/OkResponse.php';
include_once 'customResponses/DuplicateUserResponse.php';

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");

Database::createDatabaseInstance();

if (Checker::areSetAndValidFields($_POST['username'], $_POST['token'], $_POST['newUsername'], $_POST['accountType'], $_POST['password'])) {
    if (Database::isValidTokenForUser($_POST['username'], $_POST['token']) && Database::isRoot($_POST['username'])) {
        if (Database::existsUniqueKeyValueOn("users", "username", $_POST['newUsername'])) {
            echo json_encode((new DuplicateUserResponse())->get());
        } else {
            Database::addAppUser($_POST['newUsername'], $_POST['accountType'], $_POST['password']);
            echo json_encode((new OkResponse())->get());
        }
    } else {
        echo json_encode((new NotAuthenticatedResponse())->get());
    }
} else {
    echo json_encode((new MissingFieldsOrInvalidCharactersResponse())->get());
}