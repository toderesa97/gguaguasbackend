<?php

include_once '..\libs\Database.php';
include_once '..\libs\Checker.php';

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");

Database::createDatabaseInstance();

function exec_()
{
    $retrievedData = Database::executeSQL("SELECT * from hotels");
    if ($retrievedData) {
        $response = array();
        foreach ($retrievedData as $row) {
            $response[] = array('hotelCif' => $row['hotelCif'], 'hotelName' => $row['hotelName'],
                'hotelEmail' => $row['hotelEmail'], 'nickname' => $row['nickname']);
        }
        echo json_encode($response);
    }
}

exec_();
