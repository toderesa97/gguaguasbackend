<?php

include_once '../libs/Database.php';
include_once '../libs/Checker.php';
include_once '../libs/commonResponses/OkResponse.php';
include_once '../libs/commonResponses/MissingFieldsOrInvalidCharactersResponse.php';

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");

Database::createDatabaseInstance();

if (Checker::areSetAndValidFields($_POST['licensePlate'])) {
	Database::executeSQL("DELETE from vehicles WHERE licensePlate=?", array($_POST['licensePlate']));
	echo json_encode((new OkResponse())->get());
} else {
	echo json_encode((new MissingFieldsOrInvalidCharactersResponse())->get());
}

?>