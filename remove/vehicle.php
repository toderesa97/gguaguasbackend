<?php

include_once '../libs/Database.php';
include_once '../libs/Checker.php';

header("Content-Type: application/json; charset=UTF-8");

Database::createDatabaseInstance();

if (Checker::areSetAndValidFields($_GET['licensePlate'])) {
	Database::exec(sprintf("DELETE from vehicles WHERE licensePlate='%s'", $_GET['licensePlate']));
} else {
	echo json_encode(array("message" => "ERR: missing fields or invalid characters"));
}

?>