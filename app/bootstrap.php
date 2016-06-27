<?php
error_reporting(E_ALL);
ini_set('display.errors', 1);
define('APP_ROOT', __DIR__);
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/resources/config.php';
require __DIR__ . '/zaolik.php';
require __DIR__ . '/lang/Internationalization.php';
set_error_handler(function($errno, $errstr, $errfile, $errline){
    throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
});
