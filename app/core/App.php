<?php

class App{
    //Set default
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public  function  __construct()
    {
        $url = $this->parseURL();
        // Nama Controller
        if( file_exists('../app/controllers/'. $url[0] . '.php')){
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // Nama Method
        if(isset($url[1])){
            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // params
        if(!empty($url)){
            $this->params = array_values($url);
        }

        //Jalankan controller & method
        call_user_func_array([$this->controller, $this->method], $this->params);
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