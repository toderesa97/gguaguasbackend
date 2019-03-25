<?php

include_once '..\libs\Database.php';
include_once '..\libs\Checker.php';

header("Content-Type: application/json; charset=UTF-8");

Database::createDatabaseInstance();

$retrievedData = Database::query("SELECT * from clients");
if ($retrievedData) {
    $response = array();
    foreach ($retrievedData as $row) {
        $response[] = array('id' => $row['id'], 'clientName' => $row['clientName'], 'cif' => $row['cif'], 'email' => $row['email'],
            'nickname' => $row['nickname']);
    }
    echo json_encode($response);
}