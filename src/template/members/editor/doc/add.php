<div class="w3-content">
    <a href="<?php echo BASE_URI; ?>/members">Go back to Dashboard</a>
    <h2>Add File</h2>
<?php
    if(isset($noop) && $noop) {
        exit;
    }
    if(isset($success)) {
        echo '<div class="w3-panel w3-padding w3-leftbar w3-border-green w3-pale-green">' . $success . '</div>';
    }
    elseif(isset($error)) {
        echo '<div class="w3-panel w3-padding w3-leftbar w3-border-red w3-pale-red">' . $error . '</div>';
    }
?>

    <div class="w3-container w3-padding">
        <form action="<?php echo BASE_URI; ?>/action/addfile" method="POST" enctype="multipart/form-data">
            <!-- <input type="hidden" name="MAX_FILE_SIZE" value="300000" /> -->
	    <div class="w3-section w3-row">
                <div class="w3-col" style="width:150px;">
                    <label for="file-upload" class="custom-file-upload w3-round-large">
                        <i class="fa fa-file-o"></i> Choose File
                    </label>
                </div>
                <div class="w3-rest">
                    <span id="file-selected" class="w3-input w3-border w3-round-large">&nbsp;</span>
                    <input id="file-upload" type="file" class="w3-border w3-round-large" name="userfile">
                    <script>
                        $('#file-upload').bind('change', function() {
                                                             var fileName = '';
                                                             fileName = $(this).val();
                                                             $('#file-selected').html(fileName);
                                                         }
                                              );
                    </script>
                </div>
            </div>
            <div class="w3-section w3-row">
                <input class="w3-check" type="checkbox" name="visible">
                <label>Make visible on Dashboard?</label>
            </div>
            <div class="w3-section w3-row">
                <div class="w3-col" style="width:150px">
                    <b>Rename File</b> <i>(optional)</i>
                </div>
                <div class="w3-rest">
                    <input type="text" class="w3-input w3-border w3-round-large" name="filename" />
                </div>
            </div>
            <div class="w3-section w3-row">
                <div class="w3-col" style="width:150px">
                    <b>File Notes</b> <i>(optional)</i>
                </div>
                <div class="w3-rest">
                    <textarea class="w3-input w3-border w3-round-large" name="filenotes" /></textarea>
                </div>
            </div>

            <div class="w3-section w3-row">
                <input class="w3-btn w3-round-large green" type="submit" value="Upload File" />
            </div>
        </form>
    </div>
</div>
