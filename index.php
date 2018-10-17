<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


define('ROOT', getcwd() . '/');
define('APP', ROOT . 'app/');

if(isset($_GET['url']) && trim($_GET['url']) != '')
    define('URL', trim($_GET['url']));
else
    define('URL', 'index');

//Подключение файла главного ядра

require('db/db.php');
require('core/Main_core.php');
require('core/GodController.php');
require(APP . 'controllers/Controller.php');

use \core\Main_core;
use \DB\DB;

//Подключение нужных файлов

$settings = require('settings.php');
$urls_arr = require('routes.php');

if($settings['db']['avilable'] == true){
    DB::connect($settings['db']);
    $models = glob(APP . 'models/*.php');
    foreach($models as $model){
        include $model;
    }
}

$mcore = new Main_core($settings, $urls_arr);
$mcore->findController($urls_arr);

DB::close();
