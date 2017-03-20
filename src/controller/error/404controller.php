<?php
class _404Controller extends Controller {
    function view() {
        $sess = new Session();
        $err = $sess->sessionGet('error');
        $this->set('error', $err);
        $this->set('text', new Text($this->_lang->getLang()));
        $sess->sessionRemove('error');
    }
}
