<?php

class Input {


    public static function exists($key){

        if(isset($_POST[$key]) || isset($_GET[$key])){
            return true;
        }else{
            return false;
        }


    }


    public static function get($key){

        if(isset($_POST[$key])){
            return $_POST[$key];

        }else if(isset($_GET[$key])){
            return $_GET[$key];
        }else{
            return '';
        }

    }

    public static function all(){

        if(!empty($_POST)){
           
            return $_POST;
        }else if(!empty($_GET)){

            return $_GET;

        }else{
         
            return [];
        }

    }
}