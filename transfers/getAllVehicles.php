<?php

include_once '..\libs\Database.php';
include_once '..\libs\Checker.php';

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");

Database::createDatabaseInstance();

function exec_()
{
    $retrievedData = Database::executeSQL("SELECT DISTINCT V.licensePlate, V.brand
                                                    FROM vehicles V, transfers T
                                                    WHERE V.licensePlate = T.vehicle");
    if ($retrievedData) {
        $response = array();
        foreach ($retrievedData as $row) {
            $response[] = array('licensePlate' => $row['licensePlate'], 'brand' => $row['brand']);
        }
        echo json_encode($response);
    }
}

exec_();