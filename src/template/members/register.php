<div class="w3-content">
    <h1><?php echo $text->get_text('register'); ?></h1>
    <?php
        if(isset($success)) {
            echo '<div class="w3-panel w3-padding w3-leftbar w3-border-green w3-pale-green">' . $success . '</div>';
        }
        if(isset($error)) {
            echo '<div class="w3-panel w3-padding w3-leftbar w3-border-red w3-pale-red">' . $error . '</div>';
        }
    ?>
    <div class="w3-panel w3-leftbar w3-border-yellow w3-pale-yellow"><h4>Please note, this creates an account on the website. It does not make you a member of the GVR.</h4>
    <h4>If you would like to become a volunteer on the GVR, please visit the <a href="<?php echo PROTOCOL . BASE_URI . '/volunteer'; ?>">Volunteer with Us</a> page.</h4>
    </div>
    <script>
        function regSubmit(token) {
            document.getElementById('reg-form').submit();
        }
    </script>
    <form id="reg-form" action="<?php echo PROTOCOL . BASE_URI; ?>/action/register" method="POST">
        <div class="w3-row w3-section">
            <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
            <div class="w3-rest">
                <input class="w3-input w3-border w3-round-large" name="username" type="text" placeholder="<?php echo $text->get_text('username'); ?>">
            </div>
        </div>
        <div class="w3-row w3-section">
            <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-tag"></i></div>
            <div class="w3-rest">
                <input class="w3-input w3-border w3-round-large" name="name" type="text" placeholder="<?php echo $text->get_text('name'); ?>">
            </div>
        </div>
        <div class="w3-row w3-section">
            <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-envelope"></i></div>
            <div class="w3-rest">
                <input class="w3-input w3-border w3-round-large" name="email" type="text" placeholder="<?php echo $text->get_text('email'); ?>">
            </div>
        </div>
        <div class="w3-row w3-section">
            <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-lock"></i></div>
            <div class="w3-rest">
                <input class="w3-input w3-border w3-round-large" name="password" type="password" placeholder="<?php echo $text->get_text('password'); ?>">
            </div>
        </div>
        <div class="w3-row w3-section">
            <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-repeat"></i></div>
            <div class="w3-rest">
                <input class="w3-input w3-border w3-round-large" name="confirmpassword" type="password" placeholder="<?php echo $text->get_text('confirm') . ' ' . $text->get_text('password'); ?>">
            </div>
        </div>
        <div class="w3-row w3-section">
            <div class="w3-col">&nbsp;</div>
            <div class="w3-col">
                <button class="w3-btn w3-round green g-recaptcha" data-sitekey="6LfQeT0UAAAAAFeW4PTkCOya5oRYtW5pMgBzBNjj" data-callback="regSubmit"> <?php echo $text->get_text('submit'); ?> </button>
            </div>
        </div>
    </form>
</div>
