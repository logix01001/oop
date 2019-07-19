<?php

class Employee extends DB{

    public function __construct(){

        parent::__construct();

        $this->_table = 'employees';

    }

}