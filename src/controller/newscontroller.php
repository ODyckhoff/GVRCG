<?php
class NewsController extends Controller {
    function view() {
        $sess = new Session();
        $text = new Text($this->_lang->getLang());
        $this->set('title', $sess->sessionGet('title'));
        $this->set('text', $text);

        $newsfeed = $this->News;

        $newsfeed->selectAll('tbl_news')
                 ->order('news_pubdate', 'DESC')
                 ->_end();
        $newsfeed->prepare();

        $newsfeed->execute();
        $results = $newsfeed->getAll();

        $this->set('newslist', $results);
    }

    function read($args) {
        $sess = new Session();
        $text = new Text($this->_lang->getLang());
        $this->set('text', $text);

        $news = $this->News;

        $news->selectAll('tbl_news')
             ->where('news_id = :id')
             ->_end();

        $news->prepare();
        $news->bindParam(':id', $args);

        if(! $news->execute()) {
            $this->set('err', $news->getErr());
        }
        $results = $news->getResult();

        $this->set('content', $results);
    }
}
