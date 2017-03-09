<?php
class HomeController extends Controller {

    function parseParams() { }

    function view() {
        $this->set('intro', "Hello, World");
    }
}
