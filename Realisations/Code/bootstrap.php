<?php

define('BASE_PATH', 'Realisations/');

function autoload($class) {
    $path = str_replace('\\', '/', $class) . '.class.php';
    if (is_file($path)) {
        require_once $path;
    }
}

spl_autoload_register('autoload');