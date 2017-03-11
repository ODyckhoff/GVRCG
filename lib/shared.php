<?php
    function setReporting() {
        if(defined('DEV_ENV') && DEV_ENV == true) {
            error_reporting(E_ALL);
            ini_set('display_errors', 'On');
        }
        else {
            error_reporting(E_ALL);
            ini_set('display_errors', 'Off');
            ini_set('log_errors', 'On');
            ini_set('error_log', ROOT . DS . 'var' . DS . 'log ' . DS . 'error.log');
        }
    }

    function stripSlashesDeep($value) {
        $value = is_array($value) ? array_map('stripSlashesDeep', $value) : stripslashes($value);
        return $value;
    }

    function removeMagicQuotes() {
        if(get_magic_quotes_gpc()) {
            $_GET = stripSlashesDeep($_GET);
            $_POST = stripSlashesDeep($_POST);
            $_COOKIE = stripSlashesDeep($_COOKIE);
        }
    }

    function unregisterGlobals() {
        if(ini_get('register_globals')) {
            $array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
            foreach($array as $value) {
                foreach($GLOBALS[$value] as $key => $var) {
                    if($var === $GLOBALS[$key]) {
                        unset($GLOBALS[$key]);
                    }
                }
            }
        }
    }

    function callHook() {
        global $url;
        $url = rtrim($url, "/");

	$controller = $params = NULL;

        if(!$url) {
            $controller = "home";
        }
        else {
            $urlArray = array();
            $urlArray = explode("/", $url);
            list($controller, $path, $params) = parseParams($urlArray);
        }

        $controllerName = $controller;
        $controller = ucwords($controller);
        $controller .= 'Controller';

        $dispatch = new $controller($controllerName, $params, $path);
        $action = $dispatch->getAction();

        if((int)method_exists($controller, $action)) {
            $dispatch->execute();
            //call_user_func_array(array($dispatch, $action));
        }
    }

    function parseParams(&$params) {
        $basePath = SRC . 'controller';
        $found = NULL;
        $args = array();

        while(!$found && !empty($params)) {
            $testPath = implode("/", $params);
            if(file_exists($basePath . DS . $testPath . 'controller.php')) {
                $controller = $params[ count($params) - 1 ];
                $found = true;
            }
            else {
                array_unshift($args, array_pop($params));
            }
        }
        if(empty($params)) {
            echo "404 ERROR"; die;
        }
        require_once($basePath . DS . $testPath . 'controller.php');
        return array($controller, $testPath, $args);
    }

    function __autoload($className) {
        $class = strtolower($className);
        $libtest = LIB . $class . '.class.php';
        $control = SRC . 'controller' . DS . $class . '.php';
        $model = SRC . 'model' . DS . $class . '.php';

        if(file_exists($libtest)) {
            require_once($libtest);
        }
        else if(file_exists($control)) {
            require_once($control);
        }
        else if(file_exists($model)) {
            require_once($model);
        }
        else {
            echo "Error: No Such Class - " . $className;
        }
    }

    setReporting();
    removeMagicQuotes();
    unregisterGlobals();
    callHook();
