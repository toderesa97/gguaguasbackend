<?php

include_once '..\libs\Database.php';
include_once '..\libs\Checker.php';

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");

Database::createDatabaseInstance();

function exec_()
{
    $retrievedData = Database::executeSQL("SELECT * from drivers");
    if ($retrievedData) {
        $response = array();
        foreach ($retrievedData as $row) {
            $response[] = array('id' => $row['id'], 'name' => $row['name'], 'surname' => $row['surname'],
                'socialSecurityNumber' => $row['socialSecurityNumber'], 'email' => $row['email']);
        }
        echo json_encode($response);
    }
}

exec_();
