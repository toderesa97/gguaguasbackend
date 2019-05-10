<?php

include_once '..\libs\Database.php';
include_once '..\libs\Checker.php';

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");

Database::createDatabaseInstance();

if (Checker::areSetAndValidFields($_POST['hotelCif'])) {
    $data = Database::executeSQL(sprintf("SELECT * from hotels where hotelCif=%d", $_POST['hotelCif']));
    if ($data) {
    	foreach($data as $row) {
    		echo json_encode(array("hotelName" => $row['hotelName'], "hotelEmail" => $row['hotelEmail'],
                "nickname" => $row['nickname']));
    	}
    } else {
    	echo json_encode(array('message' => 'ERR: hotel not found.'));
    }
} else {
    echo json_encode(array("message" => "ERR: missing fields or invalid characters"));
}

?>