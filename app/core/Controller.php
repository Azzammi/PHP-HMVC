<?php

class Controller{
    public function view($view, $data = []){
        $module = $this->get_calling_class();
        require_once '../app/modules/'. $module . '/views/' . $view . '.php';
    }
    public function template($view, $data = []){
        require_once '../app/views/' . $view .'.php';
    }
    public function model($model){
        $module = $this->get_calling_class();
        require_once '../App/modules/'. $module .'/models/' . $model . '.php';
        return new $model;
    }

    /**
     * Cek class mana yang memanggil
     * @link https://gist.github.com/kylefarris/5188645 Gist KyleFarris
     * @return string
     */
    function get_calling_class() {

        //get the trace
        $trace = debug_backtrace();

        // Get the class that is asking for who awoke it
        $class = ( isset( $trace[1]['class'] ) ? $trace[1]['class'] : NULL );

        // +1 to i cos we have to account for calling this function
        for ( $i=1; $i<count( $trace ); $i++ ) {
            if ( isset( $trace[$i] ) && isset( $trace[$i]['class'] ) ) // is it set?
                if ( $class != $trace[$i]['class'] ) // is it a different class
                    return $trace[$i]['class'];
        }
    }
}