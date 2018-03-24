<div class="w3-content">
<?php
    $sess = new Session();
    if($sess->sessionIsSet('success')) {
        echo '<div class="w3-panel w3-padding w3-leftbar w3-border-green w3-pale-green">' . $sess->sessionGet('success') . '</div>';
        $sess->sessionRemove('success');
    }
    if($sess->sessionIsSet('error')) {
        echo '<div class="w3-panel w3-padding w3-leftbar w3-border-red w3-pale-red">' . $sess->sessionGet('error') . '</div>';
        $sess->sessionRemove('error');
    }
?>
    <h1>Pay for your Membership</h1>

    <div class="w3-container">
        <form method="POST" action="<?php echo PROTOCOL . BASE_URI; ?>/action/payseparate">
            <p>Please give us your full name and date of birth so that we can verify you as the payee when we look at your form.</p>
            <p>Full Name: <input class="w3-input w3-border w3-round-large" type="text" name="fullname" /></p>
            <p>Date of Birth: <input class="w3-input w3-border w3-round-large" id="dateofbirth" type="text" name="dob" />
                <script>$( function() { $( '#dateofbirth' ).datepicker({ dateFormat: 'dd/mm/yy', changeMonth: true, changeYear: true, yearRange: "118:+0" }); } ); </script>
            </p>

            <input type="submit" class="w3-btn w3-round-large w3-green" value="Continue to Payment" />
            
        </form>
    </div>
</div>
