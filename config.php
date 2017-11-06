<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 16/08/17
 * Time: 13:47
 */

ini_set('display_errors', 1);
ini_set('max_execution_time', 30);

define('DB_HOST', 'localhost'); //Host
define('DB_USER', 'root'); //User
define('DB_PASS', ''); //Password
define('DB_NAME', 'repository'); //Database

define('DEBUG', 1);

$TITULO2 = false;
//
define('DS', DIRECTORY_SEPARATOR);
/*Configurações Básicas do Servidor*/
$url = "";
define('ABSPATH', dirname(__FILE__));
define('URL',$url);
$secureKey = "thisPasswordisnot-so-secure";
ob_start();
session_start();

function __autoload($class_name)
{
    include ABSPATH . DS . "classes" . DS . $class_name . '.php';
}

function validadeParameters($path, $needed)
{
    $return = true;
    foreach ($needed as $temp) {
        if (!array_key_exists($temp, $path)) {
            $return = false;
        }
    }
    return $return;
}

setlocale(LC_ALL, 'pt_BR','pt_BR.utf-8','pt_BR.utf-8','portuguese');
date_default_timezone_set('America/Sao_Paulo');

?>


