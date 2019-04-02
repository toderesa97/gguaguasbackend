<?php


class ClientNotFoundResponse {

    public function get() {
        return array('message' => 'ERR: client not found.');
    }
}