<?php

class LoginResponse {

    private $token = null;

    public function isCorrectLogin() {
        return $this->token != null;
    }

    public function get() {
        return array("message" => "Verified.", "token" => $this->token);
    }

    public function setToken($token) {
        $this->token = $token;
    }

}