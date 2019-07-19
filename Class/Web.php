<?php


class Web{

    private $_title = 'Web page',
    $_links = '',
    $_scripts = '';

    public function head(){

        echo "<!DOCTYPE html>
                <html>
                    <head>
                        <meta charset='utf-8' >
                        <title>{$this->_title}</title>
                        <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
                        {$this->_links}
                    </head>
                    <body>";

    }


    public function end(){
        echo "
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
        <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' integrity='sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM' crossorigin='anonymous'></script>
        {$this->_scripts}</body>
        </html>";
    }

    public function setTitle($title){

        $this->_title = $title;
    }

    public function setAddLinks(Array $links){
        
        
        foreach($links as $link){

            $this->_links .= "<link href='{$link}' rel='stylesheet'>";

        }


    }

    public function setAddScript(Array $scripts){
        
        
        foreach($scripts as $script){

            $this->_scripts .= "<script src='{$script}'></script>";

        }


    }



}