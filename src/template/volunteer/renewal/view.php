<?php
    $sess = new Session();
?>

<div class="w3-content">
    <h1>Renew your Membership</h1>

    <div class="w3-container">
        <form method="POST" action="<?php echo PROTOCOL . BASE_URI; ?>/action/payseparate">
        <?php
            if($sess->sessionIsSet('loggedin')) {
                echo '<div class="w3-panel w3-padding w3-leftbar w3-border-blue w3-pale-blue">If your address, telephone number or email address has changed, please update them on your member dashboard first.</div>';
                echo '<p>Since you\'re logged in, you can renew your membership simply by clicking the button below.</p>';
                echo '<input type="submit" class="w3-btn w3-green w3-round-large" value="Proceed to Payment" />';
            } 
            else {
                echo '<div class="w3-panel w3-padding w3-leftbar w3-border-blue w3-pale-blue">If you have a members account on this site, log in now to simplify the process.</div>';
        ?>       
            <p>Please give us your full name and date of birth so that we can verify you as the payee when we look at your form.</p>
            <p>Full Name: <input class="w3-input w3-border w3-round-large" type="text" name="fullname" /></p>
            <p>Date of Birth: <input class="w3-input w3-border w3-round-large" type="text" name="addr1" /></p>

            <input type="submit" class="w3-btn w3-round-large w3-green" value="Continue to Payment" />
        <?php
            }
        ?> 
        </form>
    </div>
</div>
