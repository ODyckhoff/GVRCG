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
                    'user'     => $result['member_handle'],
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
}
