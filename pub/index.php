<?php

    define('DS', DIRECTORY_SEPARATOR);
    define('ROOT', dirname(dirname(__FILE__)));

    define('CFG', ROOT . DS . 'cfg' . DS);
    define('LIB', ROOT . DS . 'lib' . DS);
    define('SRC', ROOT . DS . 'src' . DS);
    define('PUB', ROOT . DS . 'pub' . DS);

    //$url = $_SERVER['REQUEST_URI'];
    $url = $_GET['url'];

    require_once(LIB . 'bootstrap.php');
