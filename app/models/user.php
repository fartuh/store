<?php

namespace app\models;

use \DB\DB;

class User extends Model
{
    public function getUserById($id){
        $db = $this->db();       
        $data = $db->prepare("SELECT * FROM users WHERE id = ?");
        $data->execute([$id]);
        return $data->fetch();
    }
}
