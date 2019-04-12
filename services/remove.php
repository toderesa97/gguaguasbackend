<?php
include 'Database.php';
include '../libs/DataToJson.php';

header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers,  Access-Control-Allow-Methods, Authorization, X-Requested-With");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Origin: *");

$database = new Database();
$db = $database->getConnection();
$tabla = $database->selectServiceTable($_POST['vehicle']);

$query = "DELETE FROM " . $tabla . " WHERE id = ?";
$param = array((int)$_POST['id']);

$data = $database->query($query, $param);

http_response_code(200);