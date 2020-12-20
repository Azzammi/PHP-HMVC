<?php

class App{
    public  function  __construct()
    {
        $url = $this->parseURL();
        var_dump($url);
    }

    public function parseURL(){
        if( isset($_GET['url'])){
            //Remove Slash '/'
            $url = rtrim($_GET['url'],'/');
            //Bersihkan dar karakter ngaco
            $url = filter_var($url, FILTER_SANITIZE_URL);
            //Pecah url
            $url = explode('/', $url);
            return $url;
        }
    }
}