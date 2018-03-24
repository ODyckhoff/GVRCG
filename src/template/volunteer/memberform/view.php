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
    <h1>Become a Member</h1>

    <div class="w3-container">
        <form method="POST" action="<?php echo PROTOCOL . BASE_URI; ?>/action/memberform">
            <p>Full Name: <input class="w3-input w3-border w3-round-large" type="text" name="fullname" /></p>
            <p>Date of Birth: <input class="w3-input w3-border w3-round-large" id="dateofbirth" type="text" name="dob" />
                <script>$( function() { $( '#dateofbirth' ).datepicker({ dateFormat: 'dd/mm/yy', changeMonth: true, changeYear: true, yearRange: "118:+0" }); } ); </script>
            </p>
            <p>Address: <textarea class="w3-input w3-border w3-round-large" rows="5" name="address"></textarea></p>
            <p>Postcode: <input class="w3-input w3-border w3-round-large" name="postcode" /></p>
            <p>Telephone: <input class="w3-input w3-border w3-round-large" name="telephone" /></p>
            <p>E-Mail: <input class="w3-input w3-border w3-round-large" name="email" /></p>
            <p>Gift Aid:
                <select class="w3-select w3-border w3-round-large" name="giftaid">
                    <option value="never">No Gift Aid</option>
                    <option value="today">Today</option>
                    <option value="past4">Past 4 Years</option>
                    <option value="future">Future</option>
                </select>
            </p>

            <input type="submit" class="w3-btn w3-round-large w3-green" value="Continue to Payment" />
            
        </form>
    </div>
</div>
