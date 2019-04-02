<?php

class Service {

    public static function toArray($data){
        $response = array();
        if ($data->rowCount() > 0) {
            while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
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
                    'description' => $row['description']
                );
                $response[] = $response_item;
            }
        }
        return json_encode($response);
    }

}