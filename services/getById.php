<?php
include '../libs/DataToJson.php';

include_once '..\libs\Database.php';

header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers,  Access-Control-Allow-Methods, Authorization, X-Requested-With");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Origin: *");

Database::createDatabaseInstance();

$tabla = $_POST['vehicle'];

$param = array((int)$_POST['id']);

$retrievedData = Database::executeSQL("SELECT * FROM " . $tabla . " WHERE id = ?", $param);

$dataToJson = new DataToJson();
$result = $dataToJson->convert($retrievedData);

http_response_code(200);
echo $result;
