<?php
include_once '..\libs\Database.php';
include '../libs/DataToJson.php';
include_once '../libs/commonResponses/NotAuthenticatedResponse.php';
include_once '../libs/commonResponses/MissingFieldsOrInvalidCharactersResponse.php';


header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers,  Access-Control-Allow-Methods, Authorization, X-Requested-With");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Origin: *");

Database::createDatabaseInstance();

function exec_() {
    $tabla = $_POST['vehicle'];

    $query = "UPDATE " . $tabla . " SET name=?, destiny=?, origin=?, seats=?,
            company=?, directionCompany=?, transferDate=?, transferTime=?,
            description=? WHERE id=?";

    $params = array($_POST['name'], $_POST['destiny'], $_POST['origin'], $_POST['seats'],
        $_POST['company'], $_POST['directionCompany'], $_POST['transferDate'],
        $_POST['transferTime'], $_POST['description'], $_POST['id']);

    Database::executeSQL($query, $params);

    http_response_code(200);
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