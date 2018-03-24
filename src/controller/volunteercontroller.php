<?php
class VolunteerController extends Controller {
    function view() {
        $sess = new Session();
        $text = new Text($this->_lang->getLang());
        $model = $this->Volunteer;

        $model->selectAll('tbl_content')
              ->_join('left', 'tbl_page', 'tbl_content.page_id = tbl_page.page_id')
              ->where('page_name = "volunteer"')
              ->_end();
        $model->prepare();
        $model->execute();

        $text = $model->getResult();

        $this->set('title', $sess->sessionGet('title'));
        $this->set('content', $text['content_en']);
    }
}
