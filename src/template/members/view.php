<div class="w3-container w3-padding w3-margin-top">
    <div class="w3-content w3-margin">
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

        <?php if($level == 'admin' && $numberUnapproved > 0) { ?>
            <div class="w3-panel w3-padding w3-leftbar w3-pale-blue w3-border-blue">
                <?php printf($text->get_text('waitapprove'), $numberUnapproved); ?>
            </div>
        <?php } ?>

        <h2>Your Account</h2>
            <?php $sess = new Session();
                  $user = $sess->sessionGet('loggedin');
                  $levels = array('Developer', 'Administrator', 'Board', 'User', 'Visitor');
            ?>
            <b>ID: </b><?php echo $user['id']; ?><br />
            <b>Username: </b><?php echo $user['user']; ?><br />
            <b>Name: </b><?php echo $user['name']; ?><br />
            <b>Email: </b><?php echo $user['email']; ?><br />
            <b>Level: </b><?php echo $levels[$user['level']]; ?>

        <h2>Documents</h2>
            <a class="w3-btn green w3-text-white" href="pub/doc/SMS_Version11_2016.docx">Safety Management System (docx)</a><br />
    </div>
</div>
