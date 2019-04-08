<?php
include 'Database.php';
include '../libs/DataToJson.php';

header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers,  Access-Control-Allow-Methods, Authorization, X-Requested-With");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Origin: *");

$database = new Database();
$db = $database->getConnection();
$tablaMer = 'mercedes';
$tablaMini = 'minibus';
$tablaVtc = 'vtc';

$queryMer = "SELECT * FROM " . $tablaMer . " WHERE transferDate = ?";
$queryMini = "SELECT * FROM " . $tablaMini . " WHERE transferDate = ?";
$queryVtc = "SELECT * FROM " . $tablaVtc . " WHERE transferDate = ?";
$param = array((string)$_POST['transferDate']);


$dataMer = $database->query($queryMer, $param);
$dataMini = $database->query($queryMini, $param);
$dataVtc = $database->query($queryVtc, $param);


$dataToJson = new DataToJson();
$resultMer = $dataToJson->convert($dataMer);
$resultMini = $dataToJson->convert($dataMini);
$resultVtc = $dataToJson->convert($dataVtc);

$result = json_encode(array_merge(json_decode($resultMer,true),json_decode($resultMini,true),json_decode($resultVtc,true)));

http_response_code(200);
echo $result;