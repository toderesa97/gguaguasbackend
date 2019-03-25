<?php

include_once '..\libs\Database.php';
include_once '..\libs\Checker.php';

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");

Database::createDatabaseInstance();

if (Checker::areSetAndValidFields($_POST['id'])) {
    $data = Database::query(sprintf("SELECT * from clients where id=%d", $_POST['id']));
    if ($data) {
    	foreach($data as $row) {
    		echo json_encode(array("clientName" => $row['clientName'], "cif" => $row['cif'], "email" => $row['email'], "nickname" => $row['nickname']));
    	}
    } else {
    	echo json_encode(array('message' => 'ERR: client not found.'));
    }
} else {
    echo json_encode(array("message" => "ERR: missing fields or invalid characters"));
}

?>