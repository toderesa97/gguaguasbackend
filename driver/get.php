<?php

include_once '..\libs\Database.php';
include_once '..\libs\Checker.php';
include_once '../libs/commonResponses/MissingFieldsOrInvalidCharactersResponse.php';
include_once '../libs/commonResponses/NotAuthenticatedResponse.php';

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");

Database::createDatabaseInstance();

function exec_() {
    if (Checker::areSetAndValidFields($_POST['id'])) {
        $data = Database::executeSQL("SELECT * from drivers where id=?", array($_POST['id']));
        if ($data) {
            foreach($data as $row) {
                echo json_encode(array("name" => $row['name'], "surname" => $row['surname'],
                    "socialSecurityNumber" => $row['socialSecurityNumber'], "email" => $row['email']));
            }
        } else {
            echo json_encode(array('message' => 'ERR: driver not found.'));
        }
    } else {
        echo json_encode(array("message" => "ERR: missing fields or invalid characters"));
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