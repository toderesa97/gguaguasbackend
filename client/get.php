<?php

include_once '../libs/Database.php';
include_once '../libs/Checker.php';
include_once 'customResponses/ClientNotFoundResponse.php';
include_once '../libs/commonResponses/MissingFieldsOrInvalidCharactersResponse.php';

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");

Database::createDatabaseInstance();

if (Checker::areSetAndValidFields($_POST['id'])) {
    $data = Database::executeSQL("SELECT * from clients where id=?", array($_POST['id']));
    if ($data->rowCount() > 0) {
    	foreach($data as $row) {
    		echo json_encode(array("clientName" => $row['clientName'], "cif" => $row['cif'], "email" => $row['email'], "nickname" => $row['nickname']));
    	}
    } else {
    	echo json_encode((new ClientNotFoundResponse())->get());
    }
} else {
    echo json_encode((new MissingFieldsOrInvalidCharactersResponse())->get());
}

?>