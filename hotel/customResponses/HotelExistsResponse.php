<?php
/**
 * Created by PhpStorm.
 * User: TDRS
 * Date: 09/05/2019
 * Time: 23:40
 */

class HotelExistsResponse
{

    public function get() {
        return array("message" => "ERR: hotel already exists.");
    }

}