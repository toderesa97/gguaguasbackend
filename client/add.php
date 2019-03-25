<?php

include_once '..\lib\Database.php';
include_once '..\lib\Checker.php';

header("Content-Type: application/json; charset=UTF-8");

Database::createDatabaseInstance();

if (Checker::areSetAndValidFields($_POST['clientName'], $_POST['cif'], $_POST['email'], $_POST['nickname'])) {
    Database::exec(sprintf("INSERT into clients (clientName, cif, email, nickname) 
                                        VALUES ('%s', '%s', '%s', '%s')",
                                        $_POST['clientName'], $_POST['cif'], $_POST['email'], $_POST['nickname']));
    echo json_encode(array('message' => 'OK.'));
} else {
    echo json_encode(array("message" => "ERR: missing fields or invalid characters"));
}