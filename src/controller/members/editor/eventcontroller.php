<?php
class EventController extends Controller {
    function view() {
        $sess = new Session();
        $text = new Text($this->_lang->getLang());
        $model = $this->Event;
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

        $events = $this->Event;

        $events->selectAll('tbl_events')
               ->_join('left', 'tbl_organiser', 'event_organiser=org_id')
               ->order('event_datestart')
               ->_end();
        $events->prepare();
        $results = null;
        if($events->execute()) {
            $results = $events->getAll();
            $ev_list = $results;

            $this->set('content', $ev_list);
        }
        
    }

    function add() {
        $sess = new Session();
        $text = new Text($this->_lang->getLang());
        $model = $this->Event;
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

        $model->select(array('org_id', 'org_name'), 'tbl_organiser')
              ->_end();
        $model->prepare();
        $orgs = null;

        if($model->execute()) {
            $orgs = $model->getAll();
        }
        $this->set('orgs', $orgs);

    }

    function edit($args = null) {
        $sess = new Session();
        $text = new Text($this->_lang->getLang());
        $model = $this->Event;
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

        $model->select(array('org_id', 'org_name'), 'tbl_organiser')
              ->_end();
        $model->prepare();
        $orgs = null;

        if($model->execute()) {
            $orgs = $model->getAll();
        }
        $this->set('orgs', $orgs);

        $model->selectAll('tbl_events')
              ->where('event_id = :id')
              ->_end();
        $model->prepare();
        $model->bindParam(':id', $args);
        $result = null;

        if($model->execute()) {
            $result = $model->getResult();
            if(empty($result)) {
                $this->set('error', 'Unable to retrieve event');
                $this->set('ev', null);
            }
            else {
                $this->set('ev', $result);
            }
        }
        else {
            $this->set('error', $model->getErr());
        }
    }

    function delete($args = null) {
        $this->set('args', $args);
    }
}
