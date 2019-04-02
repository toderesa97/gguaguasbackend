<?php

class MissingFieldsOrInvalidCharactersResponse {

    public function get() {
        return array("message" => "ERR: missing fields or invalid characters");
    }
}