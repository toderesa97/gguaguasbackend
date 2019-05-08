<?php
include '../libs/DataToJson.php';
include_once '..\libs\Database.php';
include_once '../libs/commonResponses/NotAuthenticatedResponse.php';
include_once '../libs/commonResponses/MissingFieldsOrInvalidCharactersResponse.php';


header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers,  Access-Control-Allow-Methods, Authorization, X-Requested-With");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Origin: *");

Database::createDatabaseInstance();

function exec_() {

    $tablaMer = 'mercedes';
    $tablaMini = 'minibus';
    $tablaVtc = 'vtc';

    $param = array((string)$_POST['transferDate']);

    $dataMer = Database::executeSQL("SELECT * FROM " . $tablaMer . " WHERE transferDate = ?", $param);
    $dataMini = Database::executeSQL("SELECT * FROM " . $tablaMini . " WHERE transferDate = ?", $param);
    $dataVtc = Database::executeSQL("SELECT * FROM " . $tablaVtc . " WHERE transferDate = ?", $param);

    $dataToJson = new DataToJson();
    $resultMer = $dataToJson->convert($dataMer);
    $resultMini = $dataToJson->convert($dataMini);
    $resultVtc = $dataToJson->convert($dataVtc);

    $result = json_encode(array_merge(json_decode($resultMer,true),json_decode($resultMini,true),json_decode($resultVtc,true)));

    http_response_code(200);
    echo $result;
}

if (Checker::areSetAndValidFields($_POST['username'], $_POST['token'])) {
    if (Database::isValidTokenForUser($_POST['username'], $_POST['token'])) {
        exec_();
    } else {
        die(json_encode((new NotAuthenticatedResponse())->get()));
    }
} else {
    die(json_encode((new MissingFieldsOrInvalidCharactersResponse())->get()));
}
