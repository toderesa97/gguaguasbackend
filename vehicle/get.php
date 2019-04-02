<?php

include_once '../libs/Database.php';
include_once '../libs/Checker.php';
include_once '../libs/commonResponses/CouldNotRetrieveDataResponse.php';
include_once '../libs/commonResponses/MissingFieldsOrInvalidCharactersResponse.php';

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");

Database::createDatabaseInstance();

if (Checker::areSetAndValidFields($_GET['licensePlate'])) {
	$data = Database::executeSQL("SELECT * from vehicles WHERE licensePlate=?", array($_GET['licensePlate']));
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

?>