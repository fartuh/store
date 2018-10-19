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

//composer autoload

require_once(ROOT . 'vendor/autoload.php');

//Подключение классов

spl_autoload_register(function ($class) {
    $str = '';
    $c = 0;
    $arr = explode('\\', $class);
    if($arr[0] == 'models')
        return;
    foreach($arr as $path){
        $c += 1;
        if($c == 1){
            $str .= $path;
            continue;
        }
        $str .= '/' . $path;
    }
    require($str . '.php');
});

//require('db/db.php');
//require('core/GodController.php');
//require('core/Main_core.php');
//require(APP . 'controllers/Controller.php');

use \core\Main_core;
use \db\DB;

//Подключение нужных файлов

$settings = require('settings.php');
$urls_arr = require('routes.php');


/*
 * Engine starting
 */

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
