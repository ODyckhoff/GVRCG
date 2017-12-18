<div class="w3-content">
    <div class="w3-container">
        <a href="<?php echo BASE_URI; ?>/members">Go back to Dashboard.</a>
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
        <h2>Adding Event</h2>
        <div class="w3-container w3-card-4">
            <form method="POST" action="<?php echo BASE_URI; ?>/action/addevent">
                <div class="w3-row w3-section">
                    <div class="w3-col" style="width:170px;"><b>Event Name</b></div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border w3-round-large" name="evname" type="text" />
                    </div>
                </div>

                <div class="w3-row w3-section">
                    <div class="w3-col" style="width:170px;"><b>Event Location</b></div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border w3-round-large" name="evlocation" type="text" />
                    </div>
                </div>

                <div class="w3-row w3-section">
                    <div class="w3-col" style="width:170px;"><b>Start Date</b></div>
                    <div class="w3-rest">
                        <script>$( function() { $( '#datestart' ).datepicker({ dateFormat: 'dd/mm/yy'}); } ); </script>
                        <input class="w3-input w3-border w3-round-large" name="evstartdate" type="text" id="datestart" />
                    </div>
                </div>

                <div class="w3-row w3-section">
                    <div class="w3-col" style="width:170px;"><b>End Date</b></div>
                    <div class="w3-rest">
                        <script>$( function() { $( '#dateend' ).datepicker({ dateFormat: 'dd/mm/yy'}); } ); </script>
                        <input class="w3-input w3-border w3-round-large" name="evenddate" type="text" id="dateend" />
                    </div>
                </div>

                <div class="w3-row w3-section">
                    <div class="w3-col" style="width:170px;"><b>Start Time</b></div>
                    <div class="w3-rest">
                        <select name="evstarthour" class="w3-round-large">
                            <?php
                                for($i = 0; $i < 24; $i++) {
                                    echo sprintf('<option value="%02d">%02d</option>', $i, $i);
                                }
                            ?>
                        </select> : 
                        <select name="evstartmin" class="w3-round-large">
                            <?php
                                for($i = 0; $i < 60; $i++) {
                                    echo sprintf('<option value="%02d">%02d</option>', $i, $i);
                                }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="w3-row w3-section">
                    <div class="w3-col" style="width:170px;"><b>End Time</b></div>
                    <div class="w3-rest">
                        <select name="evendhour" class="w3-round-large">
                            <?php
                                for($i = 0; $i < 24; $i++) {
                                    echo sprintf('<option value="%02d">%02d</option>', $i, $i);
                                }
                            ?>
                        </select> : 
                        <select name="evendmin" class="w3-round-large">
                            <?php
                                for($i = 0; $i < 60; $i++) {
                                    echo sprintf('<option value="%02d">%02d</option>', $i, $i);
                                }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="w3-row w3-section">
                    <div class="w3-col" style="width:170px;"><b>Event Organisers</b></div>
                    <div class="w3-rest">
                        <select name="evorg" class="w3-round-large">
                            <?php
                                foreach($orgs as $org) {
                                    echo '<option value="' . $org['org_id'] . '">' . $org['org_name'] . '</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="w3-row w3-section">
                    <div class="w3-col" style="width:170px;"><b>Event Description</b></div>
                    <div class="w3-rest">
                        <textarea name="evdesc" class="w3-input w3-border w3-round-large"></textarea>
                    </div>
                </div>

                <div class="w3-row w3-section">
                    <input class="w3-btn w3-round-large green" type="submit" value="Add Event" />
                </div>
            </form>
        </div>
    </div>
</div>
