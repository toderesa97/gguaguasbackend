<?php

class InvalidLicensePlateFormatResponse {

    public function get() {
        return array('message' => 'ERR: invalid license plate format.');
    }
}