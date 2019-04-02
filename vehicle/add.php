<?php

include_once '../libs/Database.php';
include_once '../libs/Checker.php';
include_once 'customResponses/VehicleExistsResponse.php';
include_once 'customResponses/InvalidLicensePlateFormatResponse.php';
include_once '../libs/commonResponses/OkResponse.php';
include_once '../libs/commonResponses/MissingFieldsOrInvalidCharactersResponse.php';

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");

Database::createDatabaseInstance();

if (Checker::areSetAndValidFields($_GET['licensePlate'], $_GET['brand'], $_GET['seats'])) {
	if (Database::existsUniqueKeyValueOn("vehicles", "licensePlate", $_GET['licensePlate'])) {
		echo json_encode((new VehicleExistsResponse())->get());
	} else {
		if (! preg_match("/[0-9]{4}-[A-Z]{3}/i", $_GET['licensePlate'])) {
			echo json_encode((new InvalidLicensePlateFormatResponse())->get());
		} else {
			Database::executeSQL("INSERT into vehicles (licensePlate, brand, seats) VALUES (?, ?, ?)",
                array($_GET['licensePlate'], $_GET['brand'], $_GET['seats']));
			echo json_encode((new OkResponse())->get());
		}
	}
} else {
	echo json_encode((new MissingFieldsOrInvalidCharactersResponse())->get());
}


?>