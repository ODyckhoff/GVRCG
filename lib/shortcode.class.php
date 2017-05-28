<?php

class Shortcode {
    protected $_code;
    protected $_type;
    protected $_args;
    protected $_func;

    function __construct($shortcode) {
        $this->_code = $shortcode;
        $this->parse();
    }

    function parse() {
        $matches = array();
        if(! preg_match('/^\[\[(\w+):(.*)\]\]$/', $this->_code, $matches)) {
            return FALSE;
        }

        $this->_type = $matches[1];
        $this->_args  = $matches[2];

        switch($this->_type) {
            case 'linkin':
                $this->_func = 'expand_linkin';
            break;
            case 'linkin':
                $this->_func = 'expand_linkout';
            break;
            default:
                return FALSE;
            break;
        }
        return TRUE;
    }

    function expand() {
        return call_user_func('Shortcode::' . $this->_func, $this->_args);
    }

    function expand_linkin($arg) {
        $arr = explode('|', $arg);
        $str = '<a href="' . BASE_URI . $arr[0] . '">' . (count($arr) == 2 ? $arr[1] : $arr[0]) . '</a>';
        return $str;
    }

    function expand_linkout($arg) {
        $arr = explode('|', $arg);
        $str = '<a href="' . $arr[0] . '">' . (count($arr) == 2 ? $arr[1] : $arr[0]) . '</a>';
        return $str;
    }
}


