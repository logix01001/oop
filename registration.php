
<?php
require_once 'Init/core.php';

$validation = new Validation;
$employee = new Employee;
$indexPage = new Web;
if(Request::getMethod() == 'POST'){
     
   
    if(Input::exists('id')){
        $employee_number_rule = 'required|min:5|max:10'; 
    }else{
        $employee_number_rule = 'required|min:5|max:10|unique:employees'; 
    }



    $validation->validate(
        Input::all()
    ,
    [
        "employee_number" =>  $employee_number_rule,
        "first_name"=> 'required|min:5|max:25',
        "last_name" => 'required|min:5|max:25'
    ]
    );
    
    if($validation->passed()){
        
        if(Input::exists('id')){
            $employee->updatePK(Input::get('id'), Input::all() );
            Session::flash('success','Successfully Updated.');
            foreach($employee->find(Input::get('id')) as $field=>$error){
                Session::flash("{$field}_old",$error);
            }
        }else{
            $employee->insert( Input::all() );
            Session::flash('success','Successfully inserted.');
        }



    }else{
        
        foreach($validation->errors() as $field=>$error){
            Session::flash($field,$error);
        }
        print_r($validation->oldvalues());
        foreach($validation->oldvalues() as $field=>$error){
            Session::flash($field,$error);
        }
    }
   
}else{

    if(Input::exists('id')){
        foreach($employee->find(Input::get('id')) as $field=>$error){
            Session::flash("{$field}_old",$error);
        }
      
    }


}




//print_r($employee->updatePK(11,["employee_number"=>'28731',"first_name"=>'Jerome',"last_name"=>'Del Rosario']));
$indexPage->setTitle('Registration page');

$indexPage->head();

include 'component.registration.php';

$indexPage->end();