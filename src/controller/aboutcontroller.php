<?php
class AboutController extends Controller {

    function view() {
        $this->set('intro', "Hello, About");
    }
}
