<?php

include_once '..\libs\Database.php';
include_once '..\libs\Checker.php';

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");

Database::createDatabaseInstance();

function exec_()
{
    $retrievedData = Database::executeSQL("SELECT DISTINCT D.name, D.surname
                                                    FROM drivers D, transfers T
                                                    WHERE D.socialSecurityNumber = T.driver");
    if ($retrievedData) {
        $response = array();
        foreach ($retrievedData as $row) {
            $response[] = array('name' => $row['name'], 'surname' => $row['surname']);
        }
        echo json_encode($response);
    }
}

exec_();
