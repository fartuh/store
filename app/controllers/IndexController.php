<?php

namespace app\controllers;

use app\models\User;

class IndexController extends Controller
{

    public function index(){
        $user = new User();
        $data = $user->getUserById(1);
        $this->view('welcome', ['name' => $data['name']]);
    }

}
