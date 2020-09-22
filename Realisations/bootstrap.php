<?php

define('BASE_PATH', 'Code/');

function autoload($class) {
    $path = str_replace('\\', '/', $class) . '.class.php';
    $path = dirname(__FILE__) ."/". $path;
    if (is_file($path)) {
        require_once $path;
    }
}

spl_autoload_register('autoload');