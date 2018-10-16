<?php

namespace app\controllers;

use \DB\DB;


class IndexController extends Controller
{

    public function index(){
        
        $this->view('welcome');
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
