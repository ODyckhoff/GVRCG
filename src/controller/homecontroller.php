<?php
class HomeController extends Controller {

    function parseParams() { }

    function view() {
        $this->set('lang', $this->_lang->getLang());
        $this->set('text', new Text($this->_lang->getLang()));
    }
}
