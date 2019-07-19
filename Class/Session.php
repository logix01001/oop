<?php

class Session{

    public static function exists($key){

        if(isset($_SESSION[$key])){
            return true;
        }else{
            return false;
        }

    }

    public static function put($key,$value){

        $_SESSION[$key] = $value;

    }

    public static function get($key){

        return $_SESSION[$key];

    }

    public static function delete($key){

        if(self::exists($key)) {
            unset($_SESSION[$key]);
        }

    }

    public static function flash($key,$value = ''){

        if(self::exists($key)){
            $session = $_SESSION[$key];
            self::delete($key);
            return $session;

        }else{
            self::put($key,$value);
        }

    }

    public static function all(){

        return $_SESSION;
        
    }


   

}