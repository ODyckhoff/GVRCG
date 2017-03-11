<?php
class HeaderController extends Controller {
    function view($page) {
        $model = $this->Header;
        $model->selectAll('tbl_page')->where('page_name = :page_name')->_end();
        $model->prepare();
        $model->bindParam(':page_name', $page);
        $model->execute();

        $result = $model->getResult();
        $lang = new Lang();
        $title = $result['page_title_' . $lang->getLang()];

        $model->select(array('page_title_' . $lang->getLang()),'tbl_page')->where('page_route="/"')->_end();
        $model->prepare();
        $model->execute();
        $result = $model->getAll(PDO::FETCH_COLUMN);
        $this->set('pages', $result);
 
        $this->set('title', $title);
    }
}
