<div class="w3-container">
    <div class="w3-content w3-padding">
<?php
    if(isset($noop) && $noop == true) {
        exit;
    }
    if(isset($success)) {
        echo '<div class="w3-panel w3-padding w3-leftbar w3-border-green w3-pale-green">' . $success . '</div>';
    }
?>
        <h1><?php echo $text->get_text('dashboard'); ?></h1>

        <?php if($level == 'admin' && $numberUnapproved > 0) { ?>
            <div class="w3-panel w3-leftbar w3-pale-blue w3-border-blue">
                <?php printf($text->get_text('waitapprove'), $numberUnapproved); ?>
            </div>
        <?php } ?>
    </div>
</div>
