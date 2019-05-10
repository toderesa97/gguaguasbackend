<?php
/**
 * Created by PhpStorm.
 * User: TDRS
 * Date: 09/05/2019
 * Time: 23:38
 */

class DriverExistsResponse
{

    public function get() {
        return array("message" => "ERR: driver already exists.");
    }

}