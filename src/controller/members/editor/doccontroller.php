<?php
class DocController extends Controller {

    function view() {
        $sess = new Session();
        $text = new Text($this->_lang->getLang());
        $model = $this->Doc;
        if(! $sess->sessionIsSet('loggedin')) {
            header('Location:' . PROTOCOL . BASE_URI . '/members/auth');
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

        $model->selectAll('tbl_files')
              ->_end();
        $model->prepare();
        $model->execute();

        $filerefs = $model->getAll();
        $files = array_slice(scandir(PUB . '/doc/'), 2);
        $filtered = array_filter($filerefs,
			function($data) use ($files) {
                            return array_search($data['file_name'], $files) !== FALSE;
                        }
                    );

        $this->set('filtered', $filtered);

        $this->set('refs', $filerefs);
    }

    function delete($name) {
        $sess = new Session();
        $text = new Text($this->_lang->getLang());
        $model = $this->Doc;
        if(! $sess->sessionIsSet('loggedin')) {
            header('Location:' . PROTOCOL . BASE_URI . '/members/auth');
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
        
        $this->set('filename', $name);
    }

    function add() {
        $sess = new Session();
        $text = new Text($this->_lang->getLang());
        $model = $this->Doc;
        if(! $sess->sessionIsSet('loggedin')) {
            header('Location:' . PROTOCOL . BASE_URI . '/members/auth');
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

    }

    function edit($args = null) {
        $sess = new Session();
        $text = new Text($this->_lang->getLang());
        $model = $this->Doc;
        if(! $sess->sessionIsSet('loggedin')) {
            header('Location:' . PROTOCOL . BASE_URI . '/members/auth');
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

        $model->selectAll('tbl_files')
              ->where('file_id = :id')
              ->_end();
        $model->prepare();
        $model->bindParam(':id', $args);
        $model->execute();

        $file = $model->getResult();
        if(empty($file)) {
            $this->set('error', 'Unable to retrieve file');
            $this->set('doc', null);
        }
        else {
            $this->set('doc', $file);
        }
    }
}
