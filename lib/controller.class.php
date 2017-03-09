<?php
class Controller {
    protected $_model;
    protected $_controller;
    protected $_action;
    protected $_template;

    function __construct($controller, $params, $path) {
        $this->_controller = $controller;
        $this->_model = $controller;
        $this->_action = 'view'; // default;

        //$this->$model = new $model;
        $this->_template = new Template($controller, $this->_action, $path);
    }

    function getAction() {
        return $this->_action;
    }

    function set($name, $value) {
        $this->_template->set($name, $value);
    }

    function __destruct() {
        if($this->_template != NULL) {
            $this->_template->render();
        }
    }
}
