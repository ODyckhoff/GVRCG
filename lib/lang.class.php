<?php
class Lang {
    protected $_session;

    function __construct() {
        $this->_session = new Session();
    }

    function setLang($lang='en') {
        if($this->_session->sessionIsSet('lang') && $this->_session->sessionGet('lang') == $lang) {
            return;
        }
        else {
            $this->_session->sessionAdd('lang', $lang);
        }
    }

    function getLang() {
        if(!$this->_session->sessionIsSet('lang')) {
            // Shouldn't actually be possible.
            $this->setLang();
            return $this->getLang();
        }
        else {
            return $this->_session->sessionGet('lang');
        }
    }
}
