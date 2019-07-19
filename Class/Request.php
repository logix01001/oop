<?php

class Request {


    public static function getMethod(){

        return $_SERVER['REQUEST_METHOD'];

    }
}