<?php

include_once '../libs/Database.php';
include_once '../libs/Checker.php';

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");

Database::createDatabaseInstance();

$retrievedData = Database::query("SELECT * from vehicles");
if ($retrievedData) {
	$response = array();
    foreach ($retrievedData as $row) {
        $response[] = array('licensePlate' => $row['licensePlate'], 'brand' => $row['brand'], 'seats' => $row['seats']);
    }
    echo json_encode($response);
}

?>