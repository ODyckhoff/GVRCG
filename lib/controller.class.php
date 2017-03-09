<?php
class Controller {
    protected $_model;
    protected $_controller;
    protected $_action;
    protected $_template;
    protected $_path;

    function __construct($controller, $params, $path) {
        $this->_controller = $controller;
        $this->_model = $controller;
        $this->_action = 'view'; // default;
        $this->_path = $path;

        $this->getModel();
        $model = ucwords($this->_model);
        $this->$model = new $model();
        $this->_template = new Template($controller, $this->_action, $this->_path);
    }

    function getModel() {
        $path = SRC . 'model' . $this->_path . '.php';
        if(file_exists($path)) {
            require_once($path);
        }
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
