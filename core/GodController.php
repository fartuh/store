<?php

namespace core;

class GodController
{
    protected function view($name, $params = []){
        include_once(APP . 'views/' . $name . '.php');
    }
}
