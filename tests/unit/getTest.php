<?php

namespace tests\unit;

use app\models\User;
use PHPUnit\Framework\TestCase;

class getTest extends TestCase
{
    public function testGet(){
        $model = new User();
        $this->assertTrue(is_array($model->getWhere('name', 'id=1')->toArray));
    }
}
