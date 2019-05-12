<?php

include_once '../libs/Database.php';
include_once '../libs/Checker.php';
include_once '../libs/commonResponses/MissingFieldsOrInvalidCharactersResponse.php';
include_once '../libs/commonResponses/NotAuthenticatedResponse.php';

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");

Database::createDatabaseInstance();

function exec_() {
    $retrievedData = Database::executeSQL("SELECT T.*
                                                    FROM transfers T, drivers D
                                                    WHERE D.socialSecurityNumber = T.driver
                                                    AND concat(D.name,' ',D.surname) LIKE ?", array($_POST['driver']));
	
	$response = array();
	if ($retrievedData->rowCount() > 0) {
		while ($row = $retrievedData->fetch(PDO::FETCH_ASSOC)) {
			$response_item = array(
				'id' => $row['id'],
				'name' => $row['name'],
				'destiny' => $row['destiny'],
				'origin' => $row['origin'],
				'seats' => $row['seats'],
				'company' => $row['company'],
				'directionCompany' => $row['directionCompany'],
				'transferDate' => $row['transferDate'],
				'transferTime' => $row['transferTime'],
				'description' => $row['description'],
				'driver' => $row['driver'],
				'hotel' => $row['hotel'],
				'vehicle' => $row['vehicle'],
				'client' => $row['client']
			);
			$response[] = $response_item;
		}
	}
	echo json_encode($response);
	//echo $result;
}

if (Checker::areSetAndValidFields($_POST['username'], $_POST['token'])) {
    if (Database::isValidTokenForUser($_POST['username'], $_POST['token'])) {
        exec_();
    } else {
        die(json_encode((new NotAuthenticatedResponse())->get()));
    }
} else {
    die(json_encode((new MissingFieldsOrInvalidCharactersResponse())->get()));
}

?>