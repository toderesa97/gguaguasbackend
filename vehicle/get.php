<?php

include_once '../libs/Database.php';
include_once '../libs/Checker.php';

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");

Database::createDatabaseInstance();

if (Checker::areSetAndValidFields($_GET['licensePlate'])) {
	$data = Database::query(sprintf("SELECT * from vehicles WHERE licensePlate='%s'", $_GET['licensePlate']));
	if ($data) {
		foreach ($data as $row) {
			echo json_encode(array("seats" => $row['seats'], "brand" => $row['brand']));
		}
	} else {
		echo json_encode(array("message" => "ERR: Could not retrieve data."));
	}
	
} else {
	echo json_encode(array("message" => "ERR: missing fields or invalid characters"));
}

?>