<?php

include_once '../libs/Database.php';
include_once '../libs/Checker.php';

header("Content-Type: application/json; charset=UTF-8");

Database::createDatabaseInstance();

if (Checker::areSetAndValidFields($_GET['licensePlate'], $_GET['brand'], $_GET['seats'])) {
	if (Database::existsPrimaryKeyOn("vehicles", "licensePlate", $_GET['licensePlate'])) {
		echo json_encode(array('message' => 'ERR: vehicle exists.'));
	} else {
		if (! preg_match("/[0-9]{4}-[A-Z]{3}/i", $_GET['licensePlate'])) {
			echo json_encode(array('message' => 'ERR: invalid license plate format.'));
		} else {
			Database::exec(sprintf("INSERT into vehicles (licensePlate, brand, seats) VALUES ('%s', '%s', %d)", $_GET['licensePlate'], $_GET['brand'], $_GET['seats']));
			echo json_encode(array('message' => 'OK.'));
		}
	}
} else {
	echo json_encode(array("message" => "ERR: missing fields or invalid characters"));
}


?>