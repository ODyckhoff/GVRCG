<?php
class NewsController extends Controller {
    function view() {
        $sess = new Session();
        $text = new Text($this->_lang->getLang());
        $content = null;
        if(! $sess->sessionIsSet('loggedin')) {
            header('Location:' . BASE_URI . '/members/auth');
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
        $model = $this->News;

        $model->selectAll('tbl_news')
              ->order('news_pubdate', 'desc')
              ->_end();
        $model->prepare();
        $model->execute();
        $articles = $model->getAll();
         
        $this->set('content', $articles);
        $this->set('text', $text);
        
    }

    function edit($args = null) {
        $sess = new Session();
        $text = new Text($this->_lang->getLang());
        $content = null;
        if(! $sess->sessionIsSet('loggedin')) {
            header('Location:' . BASE_URI . '/members/auth');
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
        // check args at some point;
        $model = $this->News;

        $model->selectAll('tbl_news')
              ->where('news_id = :id')
              ->_end();
        $model->prepare();
        $model->bindParam(':id', $args);
        if($model->execute()) {
            $article = $model->getResult();
            if(empty($article)) {
                $this->set('error', 'Unable to retrieve article');
                $this->set('article', null);
            }
            else {
                $this->set('article', $article);
            }
        }
        else {
            $this->set('error', 'Unable to retrieve article');
        }
    }

    function add() {
        $sess = new Session();
        $text = new Text($this->_lang->getLang());
        $content = null;
        if(! $sess->sessionIsSet('loggedin')) {
            header('Location:' . BASE_URI . '/members/auth');
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
        $this->set('content', $content);
        $this->set('text', $text);

    } 

    function delete($args = null) {
        $sess = new Session();
        $text = new Text($this->_lang->getLang());
        $content = null;
        $this->set('args', $args);
        if(! $sess->sessionIsSet('loggedin')) {
            header('Location:' . BASE_URI . '/members/auth');
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
        // check args at some point;
        $model = $this->News;
    }
}
