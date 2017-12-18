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
        <h1>Edit Account</h1>
        <?php $sess = new Session();
            $user = $sess->sessionGet('loggedin');
            $levels = array('Developer', 'Administrator', 'Board', 'Editor', 'Volunteer', 'Visitor');
        ?>
        <div class="w3-container w3-card-4">
            <form method="POST" action="<?php echo BASE_URI; ?>/action/selfedit">
                <div class="w3-row w3-section">
                    <div class="w3-col" style="width:100px;"><b>Username: </b></div> 
                    <div class="w3-rest">
                        <input class="w3-input w3-border w3-round-large" name="username" type="text" value="<?php echo $user['user']; ?>" />
                    </div>
                    <span class="w3-text-red">You can change this if you really must, but try to avoid confusing members with strange names or frequent changes.</span>
                </div>

                <div class="w3-row w3-section">
                    <div class="w3-col" style="width:100px;">
                        <b>Name: </b>
                    </div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border w3-round-large" name="realname" type="text" value="<?php echo $user['name']; ?>" />
                    </div>
                </div>
                <div class="w3-row w3-section">
                    <div class="w3-col" style="width:100px;">
                        <b>Email: </b>
                    </div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border w3-round-large" name="email" type="text" value="<?php echo $user['email']; ?>" />
                    </div>
                </div>
                <div class="w3-row w3-section">
                    <input class="w3-btn w3-round green" type="submit" value="Save Changes" />
                </div>

            </form>
        </div>
    </div>
</div>
