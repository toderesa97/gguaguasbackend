<?php

class NotAuthenticatedResponse {

    public function get() {
        return array("message" => "ERR: Not Authenticated.");
    }

}