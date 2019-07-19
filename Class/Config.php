<?php


class Config {

    public static function get($paths){

        $config = $GLOBALS['config'];

        $paths = explode('/',$paths);
        
        if(count($paths) > 0){
            foreach($paths as $item){

                if(isset($config[$item])){
                    $config = $config[$item];
                }else{
                    return '';
                }
            }

            return $config;
        }else{
            return '';
        }
       

       

    }


}