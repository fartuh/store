<?php

namespace core;

use \DB\DB;

class modelDB
{

    protected function db(){
        return DB::getDB();
    }

}
