<?php

class LoginResponse {

    private $token = null;
    private $userRole = "";

    public function isCorrectLogin() {
        return $this->token != null;
    }

    public function get() {
        return array("message" => "Verified.", "token" => $this->token, "role" => $this->userRole);
    }

    public function setToken($token) {
        $this->token = $token;
    }

    public function setUserRole($userRole) {
        $this->userRole = $userRole;
    }

}