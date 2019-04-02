<?php

class ClientExistsResponse {

    public function get() {
        return array("message" => "ERR: client already exists.");
    }

}