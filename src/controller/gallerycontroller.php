<?php
class GalleryController extends Controller {
    function view() {
        $sess = new Session();
        $text = new Text($this->_lang->getLang());
        $this->set('title', $sess->sessionGet('title'));
        $this->set('text', $text);
    }
}
