<?php
class Text {

    protected $_lang;
    protected $_text;

    function __construct($lang) {
        $this->_lang = $lang;
    }

    function get_text($name) {
        $model = new Model();
        $model->selectAll('tbl_text')->where('text_name = :text_name')->_end();
        $model->prepare();
        $model->bindParam(':text_name', $name);
        $model->execute();
        $result = $model->getResult(PDO::FETCH_ASSOC);

        $this->_text = $result['text_' . $this->_lang];
        $matches = array();
        if(preg_match('/\[\[.*?\]\]/', $this->_text, $matches)) {
            $sc = new Shortcode($matches[0]);
	    $this->_text = str_replace($matches[0], $sc->expand(), $this->_text);
        }
        
        return $this->_text;
    }
}
