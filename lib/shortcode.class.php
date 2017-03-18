<?php
class Shortcode {
    protected $_code;
    protected $_type;

    function __construct($shortcode) {
        $this->_code = $shortcode;
        $this->_parse();
    }

    function parse() {
        if(! preg_match('/^\[\[(\w+):(\w+)\]\]$/', $this->_code, $matches)) {
            return FALSE;
        }

        $this->_type = $matches[1];
        $this->_arg  = $matches[2];
        return TRUE;
    }
