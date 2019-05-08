<?php
include_once '../services/Database.php';
include '../libs/DataToJson.php';

header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers,  Access-Control-Allow-Methods, Authorization, X-Requested-With");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Origin: *");

$database = new Database();
$db = $database->getConnection();
$tabla = "transfer";


$query = "INSERT INTO " . $tabla . " (name, destiny, origin, seats, company, directionCompany, transferDate, transferTime, description, selectedDriver)
                  VALUES (?,?,?,?,?,?,?,?,?,?)";

extract($_POST);

$params = array($name, $destiny, $origin, $seats, $company, $directionCompany,
    $transferDate, $transferTime, $description, selectedDriver);

$database->query($query, $params);

http_response_code(200);
