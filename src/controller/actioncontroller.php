<?php
class ActionController extends Controller {

    function setlang($langcode) {
        $lang = new Lang();
        $lang->setLang($langcode);
        header('Location:' . $_SERVER['HTTP_REFERER']);
    }
}
