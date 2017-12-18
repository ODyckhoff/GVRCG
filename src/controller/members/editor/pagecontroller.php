<?php
class PageController extends Controller {
    function view() {
        $sess = new Session();
        $model = $this->Page;
        if(! $sess->sessionIsSet('loggedin')) {
            header('Location:' . BASE_URI . '/members/auth');
        }

        $user = $sess->sessionGet('loggedin');
        if(!$user['approved']) {
            $content .= '<div class="w3-content"><div class="w3-panel w3-leftbar w3-border-red w3-pale-red w3-padding">';
            $content .= ($user['denied'] ? $text->get_text('regdenied') : $text->get_text('pending')) . ' '       
                     . $text->get_text('noauth');                                                                 
            $content .= '</div></div>';                                                                           
            $this->set('noop', true);                                                                             
        }                                                                                                         
        elseif($user['level'] > LVL_EDITOR) {                                                                     
            echo '<div class="w3-content"><div class="w3-panel w3-leftbar w3-border-red w3-pale-red w3-padding">';
            echo $text->get_text('noauth');                                                                       
            echo '</div></div>';                                                                                  
            $this->set('noop', true);                                                                             
        }                                                                                                         
        elseif($sess->sessionIsSet('success')) {                                                                  
            $this->set('success', $sess->sessionGet('success'));                                                  
            $sess->sessionRemove('success');                                                                      
        }                                                                                                         
        elseif($sess->sessionIsSet('error')) {                                                                    
            $this->set('error', $sess->sessionGet('error'));                                                      
            $sess->sessionRemove('error');                                                                        
        }                                                                                                         
        $model->selectAll('tbl_page')
              ->where('page_clearance >= :level and page_editable = 1')
              ->_end();
        $model->prepare();
        $model->bindParam(':level', $user['level']);
        $model->execute();

        $results = $model->getAll();

        $this->set('content', $results);
    }

    function edit($args = null) {
        
        $sess = new Session();
        $model = $this->Page;
        if(! $sess->sessionIsSet('loggedin')) {
            header('Location:' . BASE_URI . '/members/auth');
        }

        $user = $sess->sessionGet('loggedin');
        if(!$user['approved']) {
            $content .= '<div class="w3-content"><div class="w3-panel w3-leftbar w3-border-red w3-pale-red w3-padding">';
            $content .= ($user['denied'] ? $text->get_text('regdenied') : $text->get_text('pending')) . ' '       
                     . $text->get_text('noauth');                                                                 
            $content .= '</div></div>';                                                                           
            $this->set('noop', true);                                                                             
        }                                                                                                         
        elseif($user['level'] > LVL_EDITOR) {                                                                     
            echo '<div class="w3-content"><div class="w3-panel w3-leftbar w3-border-red w3-pale-red w3-padding">';
            echo $text->get_text('noauth');                                                                       
            echo '</div></div>';                                                                                  
            $this->set('noop', true);                                                                             
        }                                                                                                         
        elseif($sess->sessionIsSet('success')) {                                                                  
            $this->set('success', $sess->sessionGet('success'));                                                  
            $sess->sessionRemove('success');                                                                      
        }                                                                                                         
        elseif($sess->sessionIsSet('error')) {                                                                    
            $this->set('error', $sess->sessionGet('error'));                                                      
            $sess->sessionRemove('error');                                                                        
        }                                                                                                         

        $model->selectAll('tbl_page')
              ->_join('left', 'tbl_content', 'tbl_page.page_id = tbl_content.page_id')
              ->where('tbl_page.page_id = :id')
              ->_end();
        $model->prepare();
        $model->bindParam(':id', $args);
        $model->execute();

        $result = $model->getResult();

        $this->set('content', $result);
    }

    function add() {
        
        $sess = new Session();
        $model = $this->Page;
        if(! $sess->sessionIsSet('loggedin')) {
            header('Location:' . BASE_URI . '/members/auth');
        }

        $user = $sess->sessionGet('loggedin');
        if(!$user['approved']) {
            $content .= '<div class="w3-content"><div class="w3-panel w3-leftbar w3-border-red w3-pale-red w3-padding">';
            $content .= ($user['denied'] ? $text->get_text('regdenied') : $text->get_text('pending')) . ' '       
                     . $text->get_text('noauth');                                                                 
            $content .= '</div></div>';                                                                           
            $this->set('noop', true);                                                                             
        }                                                                                                         
        elseif($user['level'] > LVL_EDITOR) {                                                                     
            echo '<div class="w3-content"><div class="w3-panel w3-leftbar w3-border-red w3-pale-red w3-padding">';
            echo $text->get_text('noauth');                                                                       
            echo '</div></div>';                                                                                  
            $this->set('noop', true);                                                                             
        }                                                                                                         
        elseif($sess->sessionIsSet('success')) {                                                                  
            $this->set('success', $sess->sessionGet('success'));                                                  
            $sess->sessionRemove('success');                                                                      
        }                                                                                                         
        elseif($sess->sessionIsSet('error')) {                                                                    
            $this->set('error', $sess->sessionGet('error'));                                                      
            $sess->sessionRemove('error');                                                                        
        }                                                                                                         

        $model->selectAll('tbl_page')
              ->_end();
        $model->prepare();
        $model->execute();

        $pages = $model->getAll();
        $menupages = array_filter($pages, function($data) {
                                              return ($data['page_route'] == '/' && !empty($data['page_order']));
                                          }
        );
        $otherpages = array_filter($pages, function($data) {
                                               return (
                                                        $data['page_route'] != '/'
                                                     && strpos($data['page_route'], 'members') === FALSE
                                                     && strpos($data['page_route'], 'errors')  === FALSE
                                                    );
                                           }
        );
        $routes = null;
        foreach($pages as $page) {
            if(strpos($page['page_route'], 'members') === FALSE
            && strpos($page['page_route'], 'error')   === FALSE) {
                $routes[] = $page['page_route'];
            }
        }

        usort($menupages, function($a, $b) {
                              if($a['page_order'] == $b['page_order']) {
                                  return 0;
                              }
                              return ($a['page_order'] < $b['page_order']) ? -1 : 1;
                          }
        );

        $uroutes = array_unique($routes);

        $this->set('menuitems', $menupages);
	$this->set('otherpages', $uroutes);
   } 
}
