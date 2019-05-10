<?php

include_once '../libs/Database.php';
include_once '../libs/Checker.php';
include_once '../libs/commonResponses/OkResponse.php';
include_once '../libs/commonResponses/MissingFieldsOrInvalidCharactersResponse.php';
include_once 'customResponses/DriverExistsResponse.php';
include_once '../libs/commonResponses/NotAuthenticatedResponse.php';

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");

Database::createDatabaseInstance();

function exec_() {
    if (Checker::areSetAndValidFields($_POST['name'], $_POST['surname'], $_POST['socialSecurityNumber'], $_POST['email'])) {
        if (Database::existsUniqueKeyValueOn("drivers", "id", $_POST['id'])) {
            echo json_encode((new DriverExistsResponse())->get());
        } else {
            Database::executeSQL("INSERT into drivers (name, surname, socialSecurityNumber, email) VALUES (?,?,?,?)",
                array($_POST['name'], $_POST['surname'], $_POST['socialSecurityNumber'], $_POST['email']));
            echo json_encode((new OkResponse())->get());
        }
    } else {
        echo json_encode((new MissingFieldsOrInvalidCharactersResponse())->get());
    }
}

if (Checker::areSetAndValidFields($_POST['username'], $_POST['token'])) {
    if (Database::isValidTokenForUser($_POST['username'], $_POST['token'])) {
        exec_();
    } else {
        die(json_encode((new NotAuthenticatedResponse())->get()));
    }
} else {
    die(json_encode((new MissingFieldsOrInvalidCharactersResponse())->get()));
}
