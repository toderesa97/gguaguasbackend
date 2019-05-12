<?php

include_once '..\libs\Database.php';
include_once '..\libs\Checker.php';

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");

Database::createDatabaseInstance();

function exec_()
{
    $retrievedData = Database::executeSQL("SELECT DISTINCT H.nickname
                                                    FROM hotels H, transfers T
                                                    WHERE H.hotelCif = T.hotel");
    if ($retrievedData) {
        $response = array();
        foreach ($retrievedData as $row) {
            $response[] = array('nickname' => $row['nickname']);
        }
        echo json_encode($response);
    }
}

exec_();
