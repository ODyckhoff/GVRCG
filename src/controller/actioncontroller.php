<?php
class ActionController extends Controller {

    function setlang($langcode) {
        $lang = new Lang();
        $lang->setLang($langcode);
        header('Location:' . $_SERVER['HTTP_REFERER']);
    }

    function auth() {
        if(empty($_POST['name']) || empty($_POST['password'])) {
            header('Location:' . BASE_URI . '/members');
        }
        $user = $email = $_POST['name'];
        $pass = $_POST['password'];

        $model = $this->Action;
/*
        $model->update('tbl_member')
              ->set('member_pass = :pass')
              ->where('member_id = 1')
              ->_end();
        $model->prepare();
        $model->bindParam(':pass', $pass);
        $model->execute();
*/

        $model->selectAll('tbl_member')
              ->where('member_user = :handle')
              ->_or('member_email = :email')
              ->_end();
        $model->prepare();
        $model->bindParam(':handle', $user);
        $model->bindParam(':email', $email);
        $model->execute();
        $result = $model->getResult();

        $sess = new Session();
        $text = new Text($this->_lang->getLang());
        if(!password_verify($pass, $result['member_pass'])) {
            $sess->sessionAdd('error', $text->get_text('badcredentials'));
            header('Location:' . BASE_URI . '/members');
        }
        else {
            $sess->sessionAdd('loggedin',
                array(
                    'id'       => $result['member_id'],
                    'user'     => $result['member_user'],
                    'name'     => $result['member_name'],
                    'email'    => $result['member_email'],
                    'level'    => $result['member_level'],
                    'approved' => $result['member_approved']
                )
            );
            $sess->sessionAdd('success', $text->get_text('loggedin'));
            header('Location:' . BASE_URI . '/members');
        }
    }

    function logout() {
        $sess = new Session();
        $text = new Text($this->_lang->getLang());

        if($sess->sessionIsSet('loggedin')) {
            $sess->sessionRemove('loggedin');
        }

        $sess->sessionAdd('success', $text->get_text('loggedout'));
        header('Location:' . BASE_URI . '/members/auth');
    }

    function register() {
        $sess = new Session();
        $text = new Text($this->_lang->getLang());

        if(empty($_POST)
        || empty($_POST['username'])
        || empty($_POST['name'])
        || empty($_POST['email'])
        || empty($_POST['password'])
        || empty($_POST['confirmpassword'])
        ) {
            $sess->sessionAdd('error', $text->get_text('missingfield'));
            header('Location:' . BASE_URI . '/members/register');
        }

        if($_POST['password'] != $_POST['confirmpassword']) {
            $sess->sessionAdd('error', $text->get_text('nopassmatch'));
            header('Location:' . BASE_URI . '/members/register');
        }

        $user  = $_POST['username'];
        $name  = $_POST['name'];
        $email = $_POST['email'];
        $pass  = $_POST['password'];

        $model = $this->Action;
        $model->selectAll('tbl_member')
              ->where('member_user = :user')
              ->_or('member_user = :email')
              ->_or('member_email = :user')
              ->_or('member_email = :email')
              ->_end();
        $model->prepare();
        $model->bindParam(':user', $user);
        $model->bindParam(':email', $email);
        $model->execute();
        $result = $model->getAll();

        if(!empty($result)) {
            $sess->sessionAdd('error', $text->get_text('userexists'));
            header('Location:' . BASE_URI . '/members/register');
        }

        $model->insert('tbl_member', array('default', "'$user'", "'$email'", "'$name'", "'".password_hash($pass, PASSWORD_BCRYPT)."'", 'default', 'default', 'default'))
              ->_end();
        $model->prepare();
        if($model->execute()) {
            $sess->sessionAdd('loggedin',
                array(
                    'id'       => $model->handle()->lastInsertId(),
                    'user'     => $user,
                    'level'    => 4,
                    'approved' => 0
                )
            );
            $sess->sessionAdd('registered', true);
            header('Location:' . BASE_URI . '/members/success');
        }
        else {
            $sess->sessionAdd('error', $model->getErr());
            header('Location:' . BASE_URI . '/members/register');
        }
    }

    function approve($args) {
        $sess = new Session();
        $model = $this->Action;
        $model->update('tbl_member')
              ->set('member_approved = 1')
              ->where('member_id = :id')
              ->_end();
        $model->prepare();
        $model->bindParam(':id', $args);
        if($model->execute()) {
            $sess->sessionAdd('success', 'Member ID ' . $args . ' approved.');
        }
        else {
            $sess->sessionAdd('error', $model->getErr());
        }
        header('Location:' . BASE_URI . '/members/approve');
    }

    function deny($args) {
        $sess = new Session();
        $model = $this->Action;
        $model->update('tbl_member')
              ->set('member_denied = 1')
              ->where('member_id = :id')
              ->_end();
        $model->prepare();
        $model->bindParam(':id', $args);
        if($model->execute()) {
            $sess->sessionAdd('success', 'Member ID ' . $args . ' denied all access.');
        }
        else {
            $sess->sessionAdd('error', $model->getErr());
        }
        header('Location:' . BASE_URI . '/members');
    }
}
