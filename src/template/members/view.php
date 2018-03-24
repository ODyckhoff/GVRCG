<div class="w3-container w3-padding w3-margin">
<?php
    if(isset($noop) && $noop == true) {
        echo $content;
        echo '</div></div>';
        return;
    }
    if(isset($success)) {
        echo '<div class="w3-panel w3-padding w3-leftbar w3-border-green w3-pale-green">' . $success . '</div>';
    }
    elseif(isset($error)) {
        echo '<div class="w3-panel w3-padding w3-leftbar w3-border-red w3-pale-red">' . $error . '</div>';
    }
?>
        <h1><?php echo $text->get_text('dashboard'); ?></h1>
<div class="w3-section w3-row">
        <?php if($user['level'] <= LVL_ADMIN && $numberUnapproved > 0) { ?>
            <div class="w3-panel w3-padding w3-leftbar w3-pale-blue w3-border-blue">
                <?php printf($text->get_text('waitapprove'), $numberUnapproved); ?>
            </div>
        <?php } ?>

    <div class="w3-col w3-third">
        <h2>Your Account</h2>
            <?php $sess = new Session();
                  $levels = array('Developer', 'Administrator', 'Board', 'Editor', 'Volunteer', 'Visitor');
            ?>
            <b>ID: </b><?php echo $user['id']; ?><br />
            <b>Username: </b><?php echo $user['user']; ?><br />
            <b>Name: </b><?php echo $user['name']; ?><br />
            <b>Email: </b><?php echo $user['email']; ?><br />
            <b>Level: </b><?php echo $levels[$user['level']]; ?><br />
            <a class="w3-btn green w3-text-white" href="<?php echo PROTOCOL . BASE_URI; ?>/members/selfedit">Edit Account Details</a><br />

        <h2>Documents</h2>
            <?php foreach ($files as $file) {
                echo '<p><a class="w3-btn green w3-text-white w3-round-large" href="' . PROTOCOL . BASE_URI . '/pub/doc/' . $file['file_name'] . '">'
                   . $file['file_name'] . '</a></p>';
            } ?>
    </div>
    <?php if($user['level'] <= LVL_EDITOR) { ?>
    <div class="w3-col w3-third">
        <h2>Site Editing</h2>
        <h3>News</h3> 
        <a class="w3-btn w3-border w3-round-large green w3-text-white" href="<?php echo PROTOCOL . BASE_URI; ?>/members/editor/news/add">Add News</a>
        <a class="w3-btn w3-border w3-round-large w3-amber" href="<?php echo PROTOCOL . BASE_URI; ?>/members/editor/news">Manage News</a>
      
        <h3>Events</h3>
        <a class="w3-btn w3-border w3-round-large green w3-text-white" href="<?php echo PROTOCOL . BASE_URI; ?>/members/editor/event/add">Add Event</a>
        <a class="w3-btn w3-border w3-round-large w3-amber" href="<?php echo PROTOCOL . BASE_URI; ?>/members/editor/event">Manage Events</a>

<!--        <h3>Pages</h3>
        <a class="w3-btn w3-border w3-round-large green w3-text-white" href="<?php echo PROTOCOL . BASE_URI; ?>/members/editor/page/add">Add Page</a>
        <a class="w3-btn w3-border w3-round-large w3-amber" href="<?php echo PROTOCOL . BASE_URI; ?>/members/editor/page">Manage Pages</a>
-->
        <h3>Documents</h3>
        <a class="w3-btn w3-border w3-round-large green w3-text-white" href="<?php echo PROTOCOL . BASE_URI; ?>/members/editor/doc/add">Add File</a>
        <a class="w3-btn w3-border w3-round-large w3-amber" href="<?php echo PROTOCOL . BASE_URI; ?>/members/editor/doc">Manage Files</a>

        <h3>Pages</h3>
        <a class="w3-btn w3-border w3-round-large green w3-text-white" href="<?php echo PROTOCOL . BASE_URI; ?>/members/editor/page/add">Add Page</a>
        <a class="w3-btn w3-border w3-round-large w3-amber" href="<?php echo PROTOCOL . BASE_URI; ?>/members/editor/page">Manage Pages</a>
        
    </div>
    <?php } ?>

    <?php if($user['level'] <= LVL_EDITOR) { ?>
    <div class="w3-col w3-third">
        <h2>Website Associates</h2>
        <?php if($user['level'] <= LVL_BOARD) { ?>
        <h3>Members</h3>
        <a class="w3-btn w3-border w3-round-large w3-amber" href="<?php echo PROTOCOL . BASE_URI; ?>/members/show">Manage Members</a>
        <?php } ?>
<!--
        <h3>Organisations</h3>
        <a class="w3-btn w3-border w3-round-large green" href="<?php echo PROTOCOL . BASE_URI; ?>/members/orgs/add">Add Organisation</a>
        <a class="w3-btn w3-border w3-round-large w3-amber" href="<?php echo PROTOCOL . BASE_URI; ?>/members/orgs/show">Manage Organisations</a>
-->    </div>
    <?php } ?>
</div>
