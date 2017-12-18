<div class="w3-content">
    <a href="<?php echo BASE_URI; ?>/members">Go back to Dashboard</a>
    <h2>Edit File Details</h2>
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
        <form action="<?php echo BASE_URI; ?>/action/editfile/<?php echo $doc['file_id']; ?>" method="POST">
            <div class="w3-section w3-row">
                <div class="w3-col" style="width:150px">
                    <b>File Name</b>
                </div>
                <div class="w3-rest">
                    <input type="hidden" name="originalname" value="<?php echo $doc['file_name']; ?>" />
                    <?php echo $doc['file_name']; ?>
                </div>
            </div>
            <div class="w3-section w3-row">
                <input class="w3-check" type="checkbox" name="visible" <?php echo ($doc['file_visible'] ? 'checked' : ''); ?>>
                <label>Make visible on Dashboard?</label>
            </div>
            <div class="w3-section w3-row">
                <div class="w3-col" style="width:150px">
                    <b>Rename File</b> <i>(optional)</i>
                </div>
                <div class="w3-rest">
                    <?php $ext = pathinfo($doc['file_name'], PATHINFO_EXTENSION); ?>
                    <input type="text" class="w3-input w3-border w3-round-large" id="renamer" name="filename" value="<?php echo '.' . $ext; ?>" />
                    <script>
                        function moveCaretToStart(el) {
                            if (typeof el.selectionStart == "number") {
                                el.selectionStart = el.selectionEnd = 0;
                            } else if (typeof el.createTextRange != "undefined") {
                                el.focus();
                                var range = el.createTextRange();
                                range.collapse(true);
                                range.select();
                            }
                        }
                        
                        var textBox = document.getElementById("renamer");
                        
                        textBox.onfocus = function() {
                            moveCaretToStart(textBox);
                        
                            // Work around Chrome's little problem
                            window.setTimeout(function() {
                                moveCaretToStart(textBox);
                            }, 1);
                        };
                    </script>
                </div>
            </div>
            <div class="w3-section w3-row">
                <div class="w3-col" style="width:150px">
                    <b>File Notes</b> <i>(optional)</i>
                </div>
                <div class="w3-rest">
                    <textarea class="w3-input w3-border w3-round-large" name="filenotes" /><?php echo $doc['file_notes']; ?></textarea>
                </div>
            </div>

            <div class="w3-section w3-row">
                <input class="w3-btn w3-round-large green" type="submit" value="Update File" />
            </div>
        </form>
    </div>
</div>
