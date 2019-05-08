<?php
include_once '..\libs\Database.php';
include '../libs/DataToJson.php';

header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers,  Access-Control-Allow-Methods, Authorization, X-Requested-With");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Origin: *");

Database::createDatabaseInstance();

$tabla = $_POST['vehicle'];

$query = "DELETE FROM " . $tabla . " WHERE id = ?";
$param = array((int)$_POST['id']);

$retrievedData = Database::executeSQL($query, $param);

http_response_code(200);