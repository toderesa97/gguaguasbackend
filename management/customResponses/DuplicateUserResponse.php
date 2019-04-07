<?php
/**
 * Created by PhpStorm.
 * User: TDRS
 * Date: 07/04/2019
 * Time: 15:13
 */

class DuplicateUserResponse {

    public function get() {
        return array("message" => "ERR: User exists.");
    }

}