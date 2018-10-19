<?php

namespace app\controllers;

use app\models\User;

class IndexController extends Controller
{

    public function index(){
        $user = new User;
        $data = $user->getAllWhere('id = ?', [2])->toArray();
        $this->view('welcome', ['name' => $data[0]['name']]);
    }

}
