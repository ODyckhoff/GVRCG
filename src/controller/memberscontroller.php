<?php
class MembersController extends Controller {
    function view() {
        $sess = new Session();
        $text = new Text($this->_lang->getLang());
        if(! $sess->sessionIsSet('loggedin')) {
            header('Location:' . BASE_URI . '/members/auth');
        } 

        $user = $sess->sessionGet('loggedin');
        if(!$user['approved']) {
            echo '<div class="w3-content"><div class="w3-panel w3-leftbar w3-border-red w3-pale-red w3-padding">';
            echo $text->get_text('pending') . ' ' . $text->get_text('noauth');
            echo '</div></div>';
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
        $this->set('text', $text);

        if($user['level'] <= LVL_ADMIN) {
            $model = $this->Members;
            $model->select('count(*) as count', 'tbl_member')
                  ->where('member_approved = 0')
                  ->_end();
            $model->prepare();
            $model->execute();
            $result = $model->getResult();

            $this->set('level', 'admin');
            $this->set('numberUnapproved', $result['count']);
        }
    }

    function auth() {
        $sess = new Session();
        $text = new Text($this->_lang->getLang());
        if($sess->sessionisSet('error')) {
            $this->set('error', $sess->sessionGet('error'));
            $sess->sessionRemove('error');
        }
        if($sess->sessionIsSet('success')) {
            $this->set('success', $sess->sessionGet('success'));
            $sess->sessionRemove('success');
        }
        $this->set('text', $text);
        
    }

    function show() {
        $sess = new Session();
        $text = new Text($this->_lang->getLang());
        $this->set('text', $text);

        if(!$sess->sessionIsSet('loggedin')) {
            header('Location:' . BASE_URI . '/members/auth');
        }
        $user = $sess->sessionGet('loggedin');
        if($user['level'] <= LVL_BOARD) {
            $model = $this->Members;
            $model->selectAll('tbl_member');
            $model->prepare();
            $model->execute();
            $result = $model->getAll();

            $this->set('members', $result);
            $this->set('user', $user);
        }
        else {
            echo '<div class="w3-content"><div class="w3-panel w3-leftbar w3-border-red w3-pale-red w3-padding">';
            echo $text->get_text('noauth');
            echo '</div></div>';
            $this->set('noop', true); 
        }
    }

    function edit($memberid) {
        $sess = new Session();
        $text = new Text($this->_lang->getLang());
        $this->set('text', $text);

        if(!$sess->sessionIsSet('loggedin')) {
            header('Location:' . BASE_URI . '/members/auth');
        }

        $user = $sess->sessionGet('loggedin');
        if($user['level'] <= LVL_BOARD || $user['member_id'] == $memberid) {
            $model = $this->Members;
            $model->selectAll('tbl_member')
                  ->where('member_id = :id')
                  ->_end();
            $model->prepare();
            $model->bindParam(':id', $memberid);
            $model->execute();
            $result = $model->getResult();
            $this->set('result', $result);
        }
        else {
            echo '<div class="w3-content"><div class="w3-panel w3-leftbar w3-border-red w3-pale-red w3-padding">';
            echo $text->get_text('noauth');
            echo '</div></div>';
            $this->set('noop', true);
        }
    }
}
