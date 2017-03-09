<?php
class Model extends SQLQuery {
    protected $_model;

    function __construct() {
        $this->connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $this->_model = get_class($this);
    }

    function __destruct() { }
}
