<?php
class Controller {
    protected $_model;
    protected $_controller;
    protected $_action;
    protected $_template;
    protected $_path;
    protected $_lang;
    protected $_params;
    protected $_header;
    protected $_footer;

    function __construct($controller, $params, $path) {
        $this->_controller = $controller;
        $this->_model = $controller;
        $this->_action = NULL;
        $this->_path = $path;
        $this->_lang = new Lang();
        $this->_params = $params;

        $this->getModel();
        $model = ucwords($this->_model);
        if(preg_match('/^\d/', $model)) {
            $model = '_' . $model;
        }
        $this->$model = new $model();

        if($controller != 'header' && $controller != 'footer') {
            $this->_header = $this->getHeader();
            $this->_footer = $this->getFooter();
        }
        $this->_template = new Template($controller, $this->getAction(), $this->_path);
    }

    function execute() {
        if($this->_controller != "header" && $this->_controller != "footer") {
            $this->_header->execute();
        }
        call_user_func_array(array($this, $this->_action), $this->_params);
        $this->runTemplate();
        if($this->_controller != "header" && $this->_controller != "footer") {
            $this->_footer->execute();
        }
    }

    function getModel() {
        $path = SRC . 'model' . DS . $this->_path . '.php';
        if(file_exists($path)) {
            require_once($path);
        }
    }

    function getAction() {
        if($this->_action == NULL && empty($this->_params)) {
            $this->_action = 'view';
        }
        else if($this->_action == NULL) {
            $this->_action = array_shift($this->_params);
        }
        return $this->_action;
    }

    function getHeader() {
        $header = NULL;
        if(file_exists(SRC . 'template' . DS . $this->_path . DS . 'header.php')) {
            $header = new HeaderController('header', array('view', $this->_controller), $this->_path);
        }
        else {
            $header = new HeaderController('header', array('view', $this->_controller), 'header');
        }
        return $header;
    }

    function getFooter() {
        $footer = NULL;
        if(file_exists(SRC . 'template' . DS . $this->_path . DS . 'footer.php')) {
            $footer = new FooterController('footer', array('view'), $this->_path);
        }
        else {
            $footer = new FooterController('footer', array('view'), 'footer');
        }
        return $footer;
    }

    function set($name, $value) {
        $this->_template->set($name, $value);
    }

    function runTemplate() {
        if($this->_template != NULL) {
            $this->_template->render();
        }
    }
}
