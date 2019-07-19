<?php

class Validation {

    private $_errors = [],
            $_db,
            $_oldvalues = [],
            $_passed = false;

    public function __construct(){

        $this->_db = new DB;

    }

    public function validate(Array $inputs, Array $rules){

        foreach($rules as $key=>$rules){

           
            $rules = explode('|',$rules);

            $value = trim($inputs[$key]);
            $field = trim($key);

            foreach($rules as $rule){
               
                $this->addOldValues("{$key}_old",$value);

               if($rule === 'required' && empty($value)){
                   
                   $this->addErrors("{$key}_error","{$key} must be required.");
               }else{
                
                    if($rule === 'required'){
                            continue;
                    }  

                    $error_field = str_replace("_"," ", $key);
                    $rule_field = explode(':',$rule)[0];
                    
                    $rule_value = explode(':',$rule)[1];

                    switch($rule_field){
                        case 'min': 
                                   
                                    if(strlen($value) < $rule_value && !$this->errorExists("{$key}_error")){
                                        $this->addErrors("{$key}_error","{$error_field} must be a minimum of {$rule_value} characters.");
                                    }
                                    break;
                        case 'max':
                                    if(strlen($value) > $rule_value && !$this->errorExists("{$key}_error")){
                                        $this->addErrors("{$key}_error","{$error_field} must be a maxmimum of {$rule_value} characters.");
                                    }
                                    break; 
                        case 'unique':
                                    if( $this->_db->check_unique($rule_value,$key,$value) > 0 && !$this->errorExists("{$key}_error")){
                                        $this->addErrors("{$key}_error","{$error_field} must be a unique value.");
                                    }
                                    break;       

                    }

               }

            }

           


        }
        
        if(empty($this->_errors)) {
            $this->_passed = true;
        }


    }

    private function addErrors($field,$rule){
        $this->_errors[$field] = $rule;
    }

    private function addOldValues($field,$oldvalue){
        $this->_oldvalues[$field] = $oldvalue;
    }

    public function passed(){
        return $this->_passed;
    }

    public function errors(){
        return $this->_errors;
    }

    public function oldvalues(){
        return $this->_oldvalues;
    }


    public function errorExists($key){
        return array_key_exists($key,$this->_errors);
    }


}
