<?php

namespace core;

class Main_core
{

    protected
        $settings,
        $urls_arr;

    function __construct($settings, $urls_arr){
        $this->settings = $settings;
        $this->urls_arr = $urls_arr;
    }


    public function findController($urls_arr){
        foreach($urls_arr as $url => $controller_string){
            if(URL == $url){
                $controller_arr = explode(':', $controller_string);

                require(APP . 'controllers/' . $controller_arr[0] . '.php'); 

                $controller = $controller_arr[0];
                $method = $controller_arr[1];

                $path = rtrim('\app\controllers\ ') . $controller_arr[0];
                $controller_obj = new $path();
                $controller_obj->$method();
                return;
            }
        }
        echo 'not found';
    }

}
