<?php


include_once '../libs/Database.php';
include_once '../libs/Checker.php';
include_once 'customResponses/VehicleExistsResponse.php';
include_once 'customResponses/InvalidLicensePlateFormatResponse.php';
include_once 'customResponses/CannotUpdateResponse.php';
include_once '../libs/commonResponses/OkResponse.php';
include_once '../libs/commonResponses/MissingFieldsOrInvalidCharactersResponse.php';

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");

Database::createDatabaseInstance();
function exec_() {

    if (Checker::areSetAndValidFields($_POST['licensePlate'], $_POST['brand'], $_POST['seats'])) {
        if (!Database::existsUniqueKeyValueOn("vehicles", "licensePlate", $_POST['licensePlate'])) {
            echo json_encode((new CannotUpdateResponse())->get());
        } else {
            if (! preg_match("/[0-9]{4}-[A-Z]{3}/i", $_POST['licensePlate'])) {
                echo json_encode((new InvalidLicensePlateFormatResponse())->get());
            } else {
                Database::executeSQL("UPDATE vehicles SET brand=?, seats=? WHERE licensePlate=?",
                    array($_POST['brand'], $_POST['seats'], $_POST['licensePlate']));
                echo json_encode((new OkResponse())->get());
            }
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

?>