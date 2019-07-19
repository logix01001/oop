<?php

session_start();

$GLOBALS['config'] = [
    'mysql' => [
        'host' => '127.0.0.1',
        'database' => 'oop5',
        'username' => 'root',
        'password' => 'lynadmin'
    ]


];


spl_autoload_register(function($class){

    require_once 'Class/' . $class . '.php';

});