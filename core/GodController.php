<?php

namespace core;

class GodController
{
    protected function view($__name, $__params = []){
        foreach($__params as $__key => $__param){
            $$__key = $__param;
        }

        include_once(APP . 'views/' . $__name . '.php');
    }

}
