<?php

include_once '../libs/Database.php';
include_once '../libs/Checker.php';
include_once '../libs/commonResponses/MissingFieldsOrInvalidCharactersResponse.php';
include_once 'customResponses/IncorrectLogin.php';

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");

Database::createDatabaseInstance();

if (Checker::areSetAndValidFields($_POST['username'], $_POST['password'])) {
    $loginObj = Database::areValidCredentials($_POST['username'], $_POST['password']);
    if ($loginObj->isCorrectLogin()) {
        echo json_encode($loginObj->get());
    } else {
        echo json_encode((new IncorrectLogin())->get());
    }
} else {
    echo json_encode((new MissingFieldsOrInvalidCharactersResponse())->get());
}