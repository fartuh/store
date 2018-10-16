<?php

namespace DB;

class DB
{
    protected static $db = null;

    public static function connect($settings){
        if(self::$db != null)
            return false;

        $host    = $settings['host'];
        $name  = $settings['name'];
        $charset = $settings['charset'];
        $user    = $settings['user'];
        $pass    = $settings['pass'];
        $pdo = new \PDO("mysql:host=$host;dbname=$name;charset=$charset", $user, $pass);

        self::$db = $pdo;

        return true;
    }

    public static function close(){
        self::$db = null;
        return true;
    }
    public static function getDB(){
        return self::$db;
    }
}
