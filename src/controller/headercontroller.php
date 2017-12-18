<?php
class HeaderController extends Controller {
    function view($page) {
        $sess = new Session();
        $model = $this->Header;
        $model->selectAll('tbl_page')->where('page_name = :page_name')->_end();
        $model->prepare();
        $model->bindParam(':page_name', $page);
        $model->execute();

        $result = $model->getResult();
        $language = new Lang();
        $lang = $language->getLang();
        $title = $result['page_title_' . $lang];

        $model->select(array('page_title_' . $lang,'page_name'),'tbl_page')
              ->where('page_route not like "/%/%"')
              ->_and('page_order != "NULL"')
              ->order('page_order')
              ->_end();
        $model->prepare();
        $model->execute();
        $result = $model->getAll(PDO::FETCH_ASSOC);
        $this->set('pages', $result);
        $this->set('lang', $lang);
        $this->set('text', new Text($lang));
        $this->set('title', $title);
        $sess->sessionAdd('title', $title);
    }
}
