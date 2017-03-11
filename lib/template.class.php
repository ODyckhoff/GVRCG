<?php
class Template {
    protected $variables = array();
    protected $_controller;
    protected $_action;
    protected $_path;

    function __construct($controller, $action, $path) {
        $this->_controller = $controller;
        $this->_action = $action;
        $this->_path = $path;
    }

    function set($name, $value) {
        $this->variables[$name] = $value;
    }

    function render() {
        extract($this->variables);
        include(SRC . 'template' . DS . $this->_path . DS . $this->_action . '.php');
    }
}
