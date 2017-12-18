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
                    'user'     => $result['member_user'],
                    'name'     => $result['member_name'],
                    'email'    => $result['member_email'],
                    'level'    => $result['member_level'],
                    'approved' => $result['member_approved'],
                    'denied'   => $result['member_denied']
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

    function editmember($args = null) {
        $sess = new Session();
        $text = new Text($this->_lang->getLang());

        if($args == null || empty($args)) {
            $sess->sessionAdd('error', 'No parameters provided for User ID');
            header('Location:' . BASE_URI . '/members/show');
        }

        if(empty($_POST)
        || empty($_POST['username'])
        || empty($_POST['userlevel'])
        ){
            $sess->sessionAdd('error', $text->get_text('missingfield'));
            header('Location:' . BASE_URI . '/members/edit/' . $args);
        }

        $user = $_POST['username'];
        $approved = (isset($_POST['userapproved']) ? 1 : 0);
        $banned = (isset($_POST['userbanned']) ? 1 : 0);
        $level = $_POST['userlevel'];

        $model = $this->Action;
        $model->selectAll('tbl_member')
              ->where('member_user = :user')
              ->_end();
        $model->prepare();
        $model->bindParam(':user', $user);
        $model->execute();
        $result = $model->getAll();
        if(empty($result) || (count($result) == 1 && $result[0]['member_id'] == $args)) {
            $model->update('tbl_member')
                  ->set('member_user = :user, member_approved = :app, member_denied = :ban, member_level = :lvl')
                  ->where('member_id = :id')
                  ->_end();
            $model->prepare();
            $model->bindParam(':user', $user);
            $model->bindParam(':app',  $approved);
            $model->bindParam(':ban',  $banned);
            $model->bindParam(':lvl',  $level);
            $model->bindParam(':id',   $args);
            if($model->execute()) {
                $sess->sessionAdd('success', 'User successfully updated.');
            }
            else {
                $sess->sessionAdd('error', $model->getErr());
            }
        }
        else {
            $sess->sessionAdd('error', 'Username is taken');
        }
        header('Location:' . BASE_URI . '/members/edit/' . $args);
    }

    function register() {
        $sess = new Session();
        $text = new Text($this->_lang->getLang());

        if(empty($_POST)
        || empty($_POST['username'])
        || empty($_POST['name'])
        || empty($_POST['email'])
        || empty($_POST['password'])
        || empty($_POST['confirmpassword'])
        ) {
            $sess->sessionAdd('error', $text->get_text('missingfield'));
            header('Location:' . BASE_URI . '/members/register');
        }

        if($_POST['password'] != $_POST['confirmpassword']) {
            $sess->sessionAdd('error', $text->get_text('nopassmatch'));
            header('Location:' . BASE_URI . '/members/register');
        }

        $user  = $_POST['username'];
        $name  = $_POST['name'];
        $email = $_POST['email'];
        $pass  = $_POST['password'];

        $model = $this->Action;
        $model->selectAll('tbl_member')
              ->where('member_user = :user')
              ->_or('member_user = :email')
              ->_or('member_email = :user')
              ->_or('member_email = :email')
              ->_end();
        $model->prepare();
        $model->bindParam(':user', $user);
        $model->bindParam(':email', $email);
        $model->execute();
        $result = $model->getAll();

        if(!empty($result)) {
            $sess->sessionAdd('error', $text->get_text('userexists'));
            header('Location:' . BASE_URI . '/members/register');
        }

        $model->insert('tbl_member', array('default', "'$user'", "'$email'", "'$name'", "'".password_hash($pass, PASSWORD_BCRYPT)."'", 'default', 'default', 'default'))
              ->_end();
        $model->prepare();
        if($model->execute()) {
            $sess->sessionAdd('loggedin',
                array(
                    'id'       => $model->handle()->lastInsertId(),
                    'user'     => $user,
                    'level'    => 4,
                    'approved' => 0,
                    'denied'   => 0
                )
            );
            $sess->sessionAdd('registered', true);
            header('Location:' . BASE_URI . '/members/success');
        }
        else {
            $sess->sessionAdd('error', $model->getErr());
            header('Location:' . BASE_URI . '/members/register');
        }
    }

    function approve($args) {
        $sess = new Session();
        $model = $this->Action;
        $model->update('tbl_member')
              ->set('member_approved = 1')
              ->where('member_id = :id')
              ->_end();
        $model->prepare();
        $model->bindParam(':id', $args);
        if($model->execute()) {
            $sess->sessionAdd('success', 'Member ID ' . $args . ' approved.');
        }
        else {
            $sess->sessionAdd('error', $model->getErr());
        }
        header('Location:' . BASE_URI . '/members/approve');
    }

    function deny($args) {
        $sess = new Session();
        $model = $this->Action;
        $model->update('tbl_member')
              ->set('member_denied = 1')
              ->where('member_id = :id')
              ->_end();
        $model->prepare();
        $model->bindParam(':id', $args);
        if($model->execute()) {
            $sess->sessionAdd('success', 'Member ID ' . $args . ' denied all access.');
        }
        else {
            $sess->sessionAdd('error', $model->getErr());
        }
        header('Location:' . BASE_URI . '/members');
    }

    function selfedit() {
        $sess = new Session();
        $model = $this->Action;
        $text = new Text($this->_lang->getLang());
        $user = $sess->sessionGet('loggedin');

        if(empty($_POST)) {
            $sess->sessionAdd('error', $text->get_text('missingfield'));
        }
        else {
            $model->update('tbl_member')
                  ->set('member_name = :name, member_email = :email,member_user = :user')
                  ->where('member_id = :id')
                  ->_end();
            $model->prepare();
            $model->bindParam(':name', $_POST['realname']);
            $model->bindParam(':email', $_POST['email']);
            $model->bindParam(':user', $_POST['username']);
            $model->bindParam(':id', $user['id']);
            if($model->execute()) {
                $sess->sessionAdd('success', 'Changes saved successfully');
            }
            else {
                $sess->sessionAdd('error', $model->getErr());
            }
                $model->selectAll('tbl_member')       
                      ->where('member_user = :handle')
                      ->_or('member_email = :email')  
                      ->_end();                       
                $model->prepare();                    
                $model->bindParam(':handle', $_POST['username']);  
                $model->bindParam(':email', $_POST['email']);  
                $model->execute();                    
                $result = $model->getResult();        

                $sess->sessionAdd('loggedin',                    
                    array(                                       
                        'id'       => $result['member_id'],      
                        'user'     => $result['member_user'],    
                        'name'     => $result['member_name'],    
                        'email'    => $result['member_email'],   
                        'level'    => $result['member_level'],   
                        'approved' => $result['member_approved'],
                        'denied'   => $result['member_denied']   
                    )                                            
                );
        } 
        header('Location:' . BASE_URI . '/members/selfedit');
    }

    function addnews() {
        $sess = new Session();
        $model = $this->Action;
        $text = new Text($this->_lang->getLang());
        $user = $sess->sessionGet('loggedin');

        if(empty($_POST)
        || empty($_POST['title'])
        || empty($_POST['content'])) {
            $sess->sessionAdd('error', $text->get_text('missingfield'));
        }
        else {
            $author = $user['name'];
            $pubtime = date("Y-m-d H:i:s");
            $title = $_POST['title'];
            $summary = (empty($_POST['summary']) ? "" : $_POST['summary']);
            $content = $_POST['content'];

            $model->insert('tbl_news', array('default', "'$author'", "'$pubtime'", "'0000-00-00 00:00:00'", ":title", ":summary", ":content", "''"))
                  ->_end();
            $model->prepare();
            $model->bindParam(':title', $title);
            $model->bindParam(':summary', $summary);
            $model->bindParam(':content', $content);
            if($model->execute()) {
                $sess->sessionAdd('success', 'News article published successfully');
            }
            else {
                $sess->sessionAdd('error', $model->getErr());
            }       
        }
        header('Location:' . BASE_URI . '/members/editor/news');
    }

    function editnews($args) {
        $sess = new Session();
        $text = new Text($this->_lang->getLang());
        $user = $sess->sessionGet('loggedin');

        if(empty($_POST)
        || empty($_POST['title'])) {
            $session->sessionAdd('error', $text->get_text('missingfield'));
        }
        else {
            $title   = $_POST['title'];
            $summary = $_POST['summary'];
            $content = $_POST['content'];
            $update  = date("Y-m-d H:i:s");
            $author  = $user['name'];

            $model = $this->Action;

            $model->update('tbl_news')
                  ->set('news_title = :title, news_summary = :summary, news_content = :content, news_update = :update, news_updateauthor = :author')
                  ->where('news_id = :id')
                  ->_end();
            $model->prepare();
            $model->bindParam(':title', $title);
            $model->bindParam(':summary', $summary);
            $model->bindParam(':content', $content);
            $model->bindParam(':update', $update);
            $model->bindParam(':author', $author);
            $model->bindParam(':id', $args);

            if($model->execute()) {
                $sess->sessionAdd('success', 'Changes published successfully!');
            }
            else {
                $sess->sessionAdd('error', 'There was an error publishing your changes');
            }
        }
        header('Location:' . BASE_URI . '/members/editor/news/edit/' . $args);
    }

    function deletenews($args) {
        $sess = new Session;
        $text = new Text($this->_lang->getLang());

        if(empty($args)) {
            $sess->sessionAdd('error', 'Invalid parameters provided');
        }
        else {
            $model = $this->Action;
            $model->deleteFrom('tbl_news')
                  ->where('news_id = :id')
                  ->_end();
            $model->prepare();
            $model->bindParam(':id', $args);
            if($model->execute()) {
                $sess->sessionAdd('success', 'News article was successfully removed.');
            }
            else {
                $sess->sessionAdd('error', $model->getErr());
            }
        }
        header('Location:' . BASE_URI . '/members/editor/news');
    }

    function addevent() {
        $sess = new Session();
        $text = new Text($this->_lang->getLang());

        if(empty($_POST)
        || empty($_POST['evname'])
        || empty($_POST['evlocation'])
        || empty($_POST['evstartdate'])
        || empty($_POST['evenddate'])
        || empty($_POST['evstarthour'])
        || empty($_POST['evendhour'])
        || empty($_POST['evstartmin'])
        || empty($_POST['evendmin'])
        || empty($_POST['evorg'])
        || empty($_POST['evdesc'])) {
            $sess->sessionAdd('error', $text->get_text('missingfield'));
        }
        else {
            $startdate = date_format(date_create_from_format('d/m/Y', $_POST['evstartdate']), 'Y-m-d');
            $enddate = date_format(date_create_from_format('d/m/Y', $_POST['evenddate']), 'Y-m-d');
            if($enddate < $startdate) {
                $sess->sessionAdd('error', 'End date cannot be before start date.');
            }
            else {
                $starthour = $_POST['evstarthour'];
                $startmin  = $_POST['evstartmin'];
                $endhour   = $_POST['evendhour'];
                $endmin    = $_POST['evendmin'];

                if($starthour < 0 || $starthour > 23
                || $startmin  < 0 || $startmin  > 59
                || $endhour   < 0 || $endhour   > 23
                || $endmin    < 0 || $endmin    > 59) {
                    $sess->sessionAdd('error', 'One of the time field values is invalid.');
                }
                else {
                    $name = $_POST['evname'];
                    $loc  = $_POST['evlocation'];
                    $starttime = $starthour . ':' . $startmin . ':00';
                    $endtime   = $endhour   . ':' . $endmin   . ':00';
                    if($startdate == $enddate && $endtime < $starttime) {
                        $sess->sessionAdd('error', 'Event finish time is before start time');
                    }
                    else {
                        $org = $_POST['evorg'];
                        $desc = $_POST['evdesc'];
    
                        $model = $this->Action;
                        $model->insert('tbl_events',
                                       array(
                                           'default',
                                           ':evname',
                                           ':startdate',
                                           ':enddate',
                                           ':starttime',
                                           ':endtime',
                                           ':location',
                                           ':description',
                                           ':organiser'
                                       )
                                      )
                              ->_end();
                        $model->prepare();
                        $model->bindParam(':evname', $name);
                        $model->bindParam(':startdate', $startdate);
                        $model->bindParam(':enddate', $enddate);
                        $model->bindParam(':starttime', $starttime);
                        $model->bindParam(':endtime', $endtime);
                        $model->bindParam(':location', $loc);
                        $model->bindParam(':description', $desc);
                        $model->bindParam(':organiser', $org);
    
                        if($model->execute()) {
                            $sess->sessionAdd('success', 'Event created successfully');
                        }
                        else {
                            $sess->sessionAdd('error', $model->getErr());
                        }
                    }
                }
            }
        }
        header('Location:' . BASE_URI . '/members/editor/event/add');
    }

    function editevent($args) {
        $sess = new Session();
        $text = new Text($this->_lang->getLang());

        if(empty($_POST)
        || empty($_POST['evname'])
        || empty($_POST['evlocation'])
        || empty($_POST['evstartdate'])
        || empty($_POST['evenddate'])
        || empty($_POST['evstarthour'])
        || empty($_POST['evendhour'])
        || empty($_POST['evstartmin'])
        || empty($_POST['evendmin'])
        || empty($_POST['evorg'])
        || empty($_POST['evdesc'])) {
            $sess->sessionAdd('error', $text->get_text('missingfield'));
        }
        else {
            $startdate = date_format(date_create_from_format('d/m/Y', $_POST['evstartdate']), 'Y-m-d');
            $enddate = date_format(date_create_from_format('d/m/Y', $_POST['evenddate']), 'Y-m-d');
            if($enddate < $startdate) {
                $sess->sessionAdd('error', 'End date cannot be before start date.');
            }
            else {
                $starthour = $_POST['evstarthour'];
                $startmin  = $_POST['evstartmin'];
                $endhour   = $_POST['evendhour'];
                $endmin    = $_POST['evendmin'];

                if($starthour < 0 || $starthour > 23
                || $startmin  < 0 || $startmin  > 59
                || $endhour   < 0 || $endhour   > 23
                || $endmin    < 0 || $endmin    > 59) {
                    $sess->sessionAdd('error', 'One of the time field values is invalid.');
                }
                else {
                    $name = $_POST['evname'];
                    $loc  = $_POST['evlocation'];
                    $starttime = $starthour . ':' . $startmin . ':00';
                    $endtime   = $endhour   . ':' . $endmin   . ':00';
                    if($startdate == $enddate && $endtime < $starttime) {
                        $sess->sessionAdd('error', 'Event finish time is before start time');
                    }
                    else {
                        $org = $_POST['evorg'];
                        $desc = $_POST['evdesc'];
    
                        $model = $this->Action;
                        $model->update('tbl_events')
                              ->set('event_name = :evname,'
                                  . 'event_datestart = :startdate,'
                                  . 'event_dateend = :enddate,'
                                  . 'event_timestart = :starttime,'
                                  . 'event_timeend = :endtime,'
                                  . 'event_location = :location,'
                                  . 'event_desc = :description,'
                                  . 'event_organiser = :organiser')
                              ->where('event_id = :id')
                              ->_end();
                        $model->prepare();
                        $model->bindParam(':evname', $name);
                        $model->bindParam(':startdate', $startdate);
                        $model->bindParam(':enddate', $enddate);
                        $model->bindParam(':starttime', $starttime);
                        $model->bindParam(':endtime', $endtime);
                        $model->bindParam(':location', $loc);
                        $model->bindParam(':description', $desc);
                        $model->bindParam(':organiser', $org);
                        $model->bindParam(':id', $args);
    
                        if($model->execute()) {
                            $sess->sessionAdd('success', 'Event updated successfully');
                        }
                        else {
                            $sess->sessionAdd('error', $model->getErr());
                        }
                    }
                }
            }
        }
        header('Location:' . BASE_URI . '/members/editor/event');
    }

    function deleteevent($args) {
        $sess = new Session;
        $text = new Text($this->_lang->getLang());

        if(empty($args)) {
            $sess->sessionAdd('error', 'Invalid parameters provided');
        }
        else {
            $model = $this->Action;
            $model->deleteFrom('tbl_events')
                  ->where('event_id = :id')
                  ->_end();
            $model->prepare();
            $model->bindParam(':id', $args);
            if($model->execute()) {
                $sess->sessionAdd('success', 'Event was successfully removed.');
            }
            else {
                $sess->sessionAdd('error', $model->getErr());
            }
        }
        header('Location:' . BASE_URI . '/members/editor/event');

    }

    function addfile() {
        $sess = new Session();
        $uploaddir = PUB . 'doc/';
        $filename = basename($_FILES['userfile']['name']);
        $uploadfile = $uploaddir . $filename;
   
        if(!empty($_POST) && ! empty($_POST['filename'])) {
            $filename = $_POST['filename'];
            $uploadfile = $uploaddir . $_POST['filename'];
        }

        if(move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
            $sess->sessionAdd('success', 'File was successfully uploaded.');
            $model = $this->Action;
            $visible = ( $_POST['visible'] == 'on' ? 1 : 0 );
            $notes = $_POST['filenotes'];

            $model->insert('tbl_files', array('default', ':name', ':notes', ':visible'))
                  ->_end();

            $model->prepare();
            $model->bindParam(':name', $filename);
            $model->bindParam(':notes', $notes);
            $model->bindParam(':visible', $visible);

            $model->execute();
        }
        else {
            $sess->sessionAdd('error', print_r(error_get_last(), 1));
        }
        header('Location:' . BASE_URI . '/members/editor/doc/add');
    }

    function deletefile($fileid) {
        $sess = new Session();
        $model = $this->Action;
        $model->selectAll('tbl_files')
              ->where('file_id = :id')
              ->_end();
        $model->prepare();
        $model->bindParam(':id', $fileid);
        $model->execute();
        $file = $model->getResult();

        if(unlink(realpath(PUB . '/doc/' . $file['file_name']))) {
            $sess->sessionAdd('success', 'File deleted.');
            $model->deleteFrom('tbl_files')
                  ->where('file_id = :id')
                  ->_end();
            $model->prepare();
            $model->bindParam(':id', $fileid);
            $model->execute();
        }
        else {
            $sess->sessionDel('error', 'There was a problem removing this file.');
        }
        header('Location:' . BASE_URI . '/members/editor/doc');
    }

    function editfile($file) {
        $sess = new Session();
        $model = $this->Action;

        $name = $_POST['originalname'];
        $ext = '.' . pathinfo($name, PATHINFO_EXTENSION);
        $visible = ($_POST['visible'] == 'on' ? 1 : 0);
        if(!empty($_POST['filename']) && strlen($_POST['filename']) > 0) {
            $name = $_POST['filename'];
        }
        if(!endswith($name, $ext)) {
            $name .= $ext;
        }
        $notes = $_POST['filenotes'];

        $model->update('tbl_files')
              ->set('file_name = :name, file_notes = :notes, file_visible = :visible')
              ->where('file_id = :id')
              ->_end();
        $model->prepare();
        $model->bindParam(':name', $name);
        $model->bindParam(':notes', $notes);
        $model->bindParam(':visible', $visible);
        $model->bindParam(':id', $file);

        if($model->execute()) {
            rename(PUB . '/doc/' . $_POST['originalname'], PUB . '/doc/' . $name);
            $sess->sessionAdd('success', 'File was updated successfully!');
        }
        else {
            $sess->sessionAdd('error', 'There was an issue updating the file:' . $model->getErr());
        }

        header('Location:' . BASE_URI . '/members/editor/doc/view');
    }

    function editpage($args = null) {
        $sess = new Session();
        $model = $this->Action;

        if(empty($_POST) || empty($_POST['contents'])) {
            $sess->sessionAdd('error', 'Missing inputs');
        }
        else {

            $model->update('tbl_content')
                  ->set('content_en = :contents')
                  ->where('page_id = :id')
                  ->_end();

            $model->prepare();
            $model->bindParam(':contents', $_POST['contents']);
            $model->bindParam(':id', $args);

            if($model->execute()) {
                $sess->sessionAdd('success', 'Page was changed successfully!');
            }
            else {
                $sess->sessionAdd('error', $model->getErr());
            }
        }
        header('Location:' . BASE_URI . '/members/editor/page/edit/' . $args);
    }

    function addpage() {
        $sess = new Session();
        $model = $this->Action;

        if(empty($_POST) || empty($_POST['pagename']) || empty($_POST['contents'])) {
            $sess->sessionAdd('error', 'Name or contents fields are empty.');
            header('Location:' . BASE_URI . '/members/editor/page/add');
        }
        else {
            $givenname = $_POST['page name'];
            $actualname = str_replace(' ', '', strtolower($name));
            /*
                0. Ensure Menu Position is an integer.
                1. Parent Page: root or other page.
                2. Insert into tbl_page and then tbl_content, setting Welsh values to empty string.
                3. Create any directories that are needed.
                4. Create Model class.
                5. Create Controller class with 'view' function.
                6. Create Template under <controllername>/view.php with <?php echo $content; ?>
            */
                 
        }
        header('Location:' . BASE_URI . '/members/editor/page/add');
    }
}
