<div class="w3-container">
    <div class="w3-content w3-padding">
        <a href="<?php echo PROTOCOL . BASE_URI; ?>/members">&laquo; Go back to Dashboard.</a>
<?php
    if(isset($noop) && $noop == true) {
        exit;
    }
    if(isset($success)) {
        echo '<div class="w3-panel w3-padding w3-leftbar w3-border-green w3-pale-green">' . $success . '</div>';
    }
    elseif(isset($error)) {
        echo '<div class="w3-panel w3-padding w3-leftbar w3-border-red w3-pale-red">'  . $error . '</div>';
    }
?>

        <h2>Editing User</h2>

        <p>You can change someone's username if it is deemed to be offensive, or you can take actions against the account. It is up to the individual to ensure that their name and email address are correct. You can only set a user's level to an equal or lesser status to your own.</p>

        <div class="w3-container w3-card-4">
            <form method="POST" action="<?php echo PROTOCOL . BASE_URI; ?>/action/editmember/<?php echo $result['member_id']; ?>">
                <div class="w3-row w3-section">
                    <div class="w3-col" style="width:150px;">
                        <b>Username</b>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="username" class="w3-input w3-round-large w3-border" value="<?php echo $result['member_user']; ?>" />
                    </div>
                </div>
                <div class="w3-row w3-section">
                    <div class="w3-col" style="width:150px;">
                        <b>Approved?</b>
                    </div>
                    <div class="w3-rest">
                        <?php //echo "<pre>" . print_r($result, 1) . "</pre>"; die; ?>
                        <input class="w3-check" type="checkbox" name="userapproved" <?php if($result['member_approved']) { echo 'checked'; } ?> />
                    </div>
                </div>
                <div class="w3-row w3-section">
                    <div class="w3-col" style="width:150px;">
		        <b>Banned?</b>
	            </div>
	            <div class="w3-rest">
		        <input class="w3-check" type="checkbox" name="userban" <?php if($result['member_denied']) { echo 'checked'; } ?> />
	            </div>
	        </div>
	        <div class="w3-row w3-section">
	            <div class="w3-col" style="width:150px;">
		        <b>Member Level</b>
	            </div>
	            <div class="w3-rest">
		        <select name="userlevel" class="w3-select w3-border w3-round-large">
	                <?php
                            $levels = array('Developer', 'Administrator', 'Board', 'Editor', 'Volunteer', 'Visitor');
                            for($i = $user['level']; $i < count($levels); $i++) {
                            echo '<option value="' . $i . '"' . ($i == $result['member_level'] ? 'selected' : '' ) . '>' . $levels[$i] . '</option>';
                            }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="w3-row w3-section">
                    <input class="w3-btn w3-round-large green" type="submit" value="Save User Changes" />
                </div>
            </form>
        </div>
