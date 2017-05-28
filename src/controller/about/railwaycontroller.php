<?php
class RailwayController extends Controller {
    function view() {
        $text = new Text($this->_lang->getLang());
        $this->set("text", $text);
    } 
}
