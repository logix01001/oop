<?php

require_once 'Init/core.php';

if(Request::getMethod() == 'POST'){

    if(Input::exists('id')){

        $employee = new Employee;

        if( $employee->deletePK(Input::get('id')) == true)
            echo 1;
        else 
            echo 0;

    }



}