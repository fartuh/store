<?php

namespace app\controllers;

use models\User;

class IndexController extends Controller
{

    public function index(){
        $user = new User();
        $data = $user->getUserById(1);
        $this->view('welcome', ['name' => $data['name']]);
    }

    public function testdb(){
        $db = DB::getDB();
        $stmt = $db->prepare("SELECT * FROM users");
        $stmt->execute();
        foreach($stmt as $d){
            echo $d;
        }
    }
}
