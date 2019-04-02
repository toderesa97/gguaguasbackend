<?php

class CouldNotRetrieveDataResponse {

    public function get() {
        return array("message" => "ERR: Could not retrieve data.");
    }
}