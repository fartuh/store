<?php

namespace models;

use \DB\DB;

class User
{
    public function getUserById($id){
        $db = DB::getDB();       
        $data = $db->prepare("SELECT * FROM users WHERE id = ?");
        $data->execute([$id]);
        return $data->fetch();
    }
}
