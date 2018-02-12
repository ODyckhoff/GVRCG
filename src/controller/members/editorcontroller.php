<?php
class EditorController extends Controller {
    function view() {
        $text = new Text($this->_lang->getLang());
        $this->set("text", $text);
    } 

    /* NEWS */

    function addnews() {
        $sess = new Session();
        $text = new Text($this->_lang->getLang());
        $content = null;
        if(! $sess->sessionIsSet('loggedin')) {
            header('Location:' . PROTOCOL . BASE_URI . '/members/auth');
        }
        else {
        }
        $user = $sess->sessionGet('loggedin');
        if(!$user['approved']) {
            $content .= '<div class="w3-content"><div class="w3-panel w3-leftbar w3-border-red w3-pale-red w3-padding">';
            $content .= ($user['denied'] ? $text->get_text('regdenied') : $text->get_text('pending')) . ' '
                     . $text->get_text('noauth');
            $content .= '</div></div>';
            $this->set('noop', true);
        }
        elseif($user['level'] >= LVL_VISITOR) {
            echo '<div class="w3-content"><div class="w3-panel w3-leftbar w3-border-red w3-pale-red w3-padding">';
            echo $text->get_text('noauth');
            echo '</div></div>';
            $this->set('noop', true);
        }
        elseif($sess->sessionIsSet('success')) {
            $this->set('success', $sess->sessionGet('success'));
            $sess->sessionRemove('success');
        }
        elseif($sess->sessionIsSet('error')) {
            $this->set('error', $sess->sessionGet('error'));
            $sess->sessionRemove('error');
        }
        $this->set('content', $content);
        $this->set('text', $text);

    } 
    function editnews() {
        $sess = new Session();
        $text = new Text($this->_lang->getLang());
        $content = null;
        if(! $sess->sessionIsSet('loggedin')) {
            header('Location:' . PROTOCOL . BASE_URI . '/members/auth');
        }
        else {
        }
        $user = $sess->sessionGet('loggedin');
        if(!$user['approved']) {
            $content .= '<div class="w3-content"><div class="w3-panel w3-leftbar w3-border-red w3-pale-red w3-padding">';
            $content .= ($user['denied'] ? $text->get_text('regdenied') : $text->get_text('pending')) . ' '
                     . $text->get_text('noauth');
            $content .= '</div></div>';
            $this->set('noop', true);
        }
        elseif($user['level'] > LVL_EDITOR) {
            echo '<div class="w3-content"><div class="w3-panel w3-leftbar w3-border-red w3-pale-red w3-padding">';
            echo $text->get_text('noauth');
            echo '</div></div>';
            $this->set('noop', true);
        }
        elseif($sess->sessionIsSet('success')) {
            $this->set('success', $sess->sessionGet('success'));
            $sess->sessionRemove('success');
        }
        elseif($sess->sessionIsSet('error')) {
            $this->set('error', $sess->sessionGet('error'));
            $sess->sessionRemove('error');
        }

        $articles = array();
        $model = $this->Editor;

        $model->selectAll('tbl_news')
              ->order('news_pubdate', 'desc')
              ->_end();
        $model->prepare();
        $model->execute();
        $articles = $model->getAll();
         

        $this->set('content', $articles);
        $this->set('text', $text);


    }
    function delnews() {

    }


    /* EVENTS */

    function addevent() {

    }
    function editevent() {

    }
    function delevent() {

    }


    /* PAGES */

    function addpage() {

    }
    function editpage() {

    }
    function delpage() {

    }

    /* DOCUMENTS */

    function adddoc() {

    }
    function editdoc() {

    }
    function deldoc() {

    }
}
