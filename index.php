<?php


require_once 'Init/core.php';

$indexPage = new Web;

$employee = new Employee;

//print_r($employee->updatePK(11,["employee_number"=>'28731',"first_name"=>'Jerome',"last_name"=>'Del Rosario']));
$indexPage->setTitle('Home page');
$indexPage->setAddLinks(['Assets/iziToast-master/dist/css/iziToast.min.css']);
$indexPage->setAddScript(['Assets/js/index.js','Assets/iziToast-master/dist/js/iziToast.min.js']);
$indexPage->head();

include 'component.employeetable.php';

$indexPage->end();