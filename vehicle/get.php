<?php

include_once '../libs/Database.php';
include_once '../libs/Checker.php';
include_once '../libs/commonResponses/CouldNotRetrieveDataResponse.php';
include_once '../libs/commonResponses/MissingFieldsOrInvalidCharactersResponse.php';

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");

Database::createDatabaseInstance();
function exec_() {

    if (Checker::areSetAndValidFields($_POST['licensePlate'])) {
        $data = Database::executeSQL("SELECT * from vehicles WHERE licensePlate=?", array($_POST['licensePlate']));
        if ($data->rowCount() > 0) {
            foreach ($data as $row) {
                echo json_encode(array("seats" => $row['seats'], "brand" => $row['brand']));
            }
        } else {
            echo json_encode((new CouldNotRetrieveDataResponse())->get());
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