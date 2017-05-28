<div class="w3-content">
    <h1><?php echo $text->get_text('login'); ?></h1>
    <?php
        if(isset($success)) {
            echo '<div class="w3-panel w3-padding w3-leftbar w3-border-green w3-pale-green">' . $success . '</div>';
        }
        if(isset($error)) {
            echo '<div class="w3-panel w3-padding w3-leftbar w3-border-red w3-pale-red">' . $error . '</div>';
        }
    ?>
    <div class="w3-container w3-card-4">
    <form action="<?php echo BASE_URI; ?>/action/auth" method="POST">
        <div class="w3-row w3-section">
            <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
            <div class="w3-rest">
                <input class="w3-input w3-border w3-round-large" name="name" type="text" placeholder="<?php echo $text->get_text('useremail'); ?>">
            </div>
        </div>
        <div class="w3-row w3-section">
            <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-lock"></i></div>
            <div class="w3-rest">
                <input class="w3-input w3-border w3-round-large" name="password" type="password" placeholder="<?php echo $text->get_text('password'); ?>">
            </div>
        </div>
        <div class="w3-row w3-section">
            <div class="w3-col">&nbsp;</div>
            <div class="w3-col">
                <input class="w3-btn w3-round green" type="submit" value="<?php echo $text->get_text('submit'); ?>" />
            </div>
        </div>
    </form>
    </div>
</div>
