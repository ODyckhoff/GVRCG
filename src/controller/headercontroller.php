<?php
class HeaderController extends Controller {
    function view($page) {
        $model = $this->Header;
        $model->selectAll('tbl_page')->where('page_name = :page_name')->_end();
        $model->prepare();
        $model->bindParam(':page_name', $page);
        $model->execute();

        $result = $model->getResult();
        $language = new Lang();
        $lang = $language->getLang();
        $title = $result['page_title_' . $lang];

        $model->select(array('page_title_' . $lang,'page_name'),'tbl_page')->where('page_route="/"')->_end();
        $model->prepare();
        $model->execute();
        $result = $model->getAll(PDO::FETCH_ASSOC);
        $this->set('pages', $result);
        $this->set('lang', $lang);
        $this->set('title', $title);
    }
}
