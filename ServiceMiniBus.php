<?php
include 'Database.php';
include 'Service.php';
include 'DataToJson.php';

header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers,  Access-Control-Allow-Methods, Authorization, X-Requested-With");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Origin: *");

if (isset($_POST['id'])) {
    $database = new Database();
    $db = $database->getConnection();

    $service = new Service($db);
    $data = $service->getById((int)$_POST['id']);

    $dataToJson = new DataToJson();
    $result = $dataToJson->convert($data);

    http_response_code(200);
    echo $result;

} else if (isset($_POST['add'])){
    $database = new Database();
    $db = $database->getConnection();

    $service = new Service($db);

    extract($_POST);

    if(isset($name, $destiny, $origin, $seats, $company, $directionCompany, $transferDate, $transferTime, $description))
        $service->add($name, $destiny, $origin, (int)$seats, $company, $directionCompany, $transferDate, $transferTime, $description);

} else {
    http_response_code(400);
    echo json_encode((array('message' => 'Error')));
}

