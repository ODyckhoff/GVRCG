<?php

    define('DS', DIRECTORY_SEPARATOR);
    define('ROOT', dirname(dirname(__FILE__)));

    define('CFG', ROOT . DS . 'cfg' . DS);
    define('LIB', ROOT . DS . 'lib' . DS);

    $url = $_SERVER['REQUEST_URI'];

    require_once(LIB . 'bootstrap.php');
