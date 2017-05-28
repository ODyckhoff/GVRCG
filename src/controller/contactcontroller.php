<?php
class ContactController extends Controller {
    function view() {
        $sess = new Session();
        $this->set('title', $sess->sessionGet('title'));
        $text = new Text($this->_lang->getLang());
        $this->set('text', $text);
    }
}
