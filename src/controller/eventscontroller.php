<?php
class EventsController extends Controller {
    function view() {
        $sess = new Session();
        $text = new Text($this->_lang->getLang());
        $events = $this->Events;

        $events->selectAll('tbl_events')
               ->_join('left', 'tbl_organiser', 'event_organiser=org_id')
               ->order('event_datestart')
               ->_end();
        $events->prepare();
        $results = null;
        if($events->execute()) {
            $results = $events->getAll();
            $ev_list = array();

            foreach($results as $result) {
                if(($result['event_dateend'] != '0000-00-00'
                && $result['event_dateend'] >= strftime('%F'))
                || $result['event_datestart'] >= strftime('%F')) {
                    $ev_list[] = $result;
                }
            }
            $this->set('content', $ev_list);
        }
    }
}
