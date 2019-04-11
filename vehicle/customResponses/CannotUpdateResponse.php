<?php

class CannotUpdateResponse {

    public function get() {
        return array("message" => "ERR: cannot update vehicle. It does not exist.");
    }

}