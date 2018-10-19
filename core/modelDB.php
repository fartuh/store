<?php

namespace core;

use \DB\DB;

class modelDB
{
    protected $table = null;
    protected $db = null;

    public function __construct(){
        $this->db = $this->db();
    }

    protected function db(){
        return DB::getDB();
    }

    public function get($columns, $values = []){
        $db = $this->db;
        $data = $db->prepare("SELECT $columns FROM $this->table");
        $data->execute($values);
        return new class($data->fetchAll()){
            private $array;

            public function __construct($data){
                $this->array = $data;
            }

            public function toArray(){
                return $this->array;
            }

        };
    }

    public function getAll($values = []){
        $db = $this->db;
        $data = $db->prepare("SELECT * FROM $this->table");
        $data->execute($values);
        return new class($data->fetchAll()){
            private $array;

            public function __construct($data){
                $this->array = $data;
            }

            public function toArray(){
                return $this->array;
            }
        };
    }

    public function getAllWhere($where, $values = []){
        $db = $this->db;
        $data = $db->prepare("SELECT * FROM $this->table WHERE $where");
        $data->execute($values);
        return new class($data->fetchAll()){
            private $array;

            public function __construct($data){
                $this->array = $data;
            }

            public function toArray(){
                return $this->array;
            }
        };
    }
    
    public function getWhere($columns, $where, $values = []){
        $db = $this->db;
        $data = $db->prepare("SELECT $columns FROM $this->table WHERE $where");
        $data->execute($values);
        return new class($data->fetchAll()){
            private $array;

            public function __construct($data){
                $this->array = $data;
            }

            public function toArray(){
                return $this->array;
            }

        };
    }

}
