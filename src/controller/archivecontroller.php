<?php
class ArchiveController extends Controller {
    function view() {
        $sess = new Session();
        $this->set('title', $sess->sessionGet('title'));
    }
}
