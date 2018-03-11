<div class="w3-content">
    <h1>Pay for your Membership</h1>

    <div class="w3-container">
        <form method="POST" action="<?php echo PROTOCOL . BASE_URI; ?>/action/payseparate">
            <p>Please give us your full name and date of birth so that we can verify you as the payee when we look at your form.</p>
            <p>Full Name: <input class="w3-input w3-border w3-round-large" type="text" name="fullname" /></p>
            <p>Date of Birth: <input class="w3-input w3-border w3-round-large" type="text" name="addr1" /></p>

            <input type="submit" class="w3-btn w3-round-large w3-green" value="Continue to Payment" />
            
        </form>
    </div>
</div>
