<?php

include_once '..\libs\Database.php';
include_once '..\libs\Checker.php';

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