<?php
    class MakepaymentController extends Controller {
        function view($args = null) {
           $text = new Text($this->_lang->getLang()); 
           $this->set('text', $text);

           print_r( "Testing" ); die;
        }
    }
?>
