<?php
class HomeController extends Controller {

    function parseParams() { }

    function view() {
        $model = $this->Home;
        $handle = $model->handle();

        $qry = $model->selectAll('tbl_page')
                     ->_join('LEFT', 'tbl_template', 'tbl_page.tpl_id = tbl_template.tpl_id')
                     ->where('page_id = :page_id')->_end();
        $model->prepare();
        $model->bindParam(':page_id', 1);
        $model->execute();
        $result = $model->getResult();

        $this->set('intro', '<pre>' . print_r($result, 1) . '</pre>');
    }
}
