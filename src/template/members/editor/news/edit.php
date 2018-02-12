<div class="w3-content">
    <div class="w3-container">
        <a href="<?php echo PROTOCOL . BASE_URI; ?>/members">Go back to Dashboard</a>
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
    <h2>Editing News</h2>
    
        <div class="w3-container w3-card-4">
            <form method="POST" action="<?php echo PROTOCOL . BASE_URI; ?>/action/editnews/<?php echo $article['news_id']; ?>">
                <div class="w3-row w3-section">
                    <div class="w3-col" style="width:100px"><b>Title</b></div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border w3-round-large" name="title" type="text" value="<?php echo $article['news_title']; ?>">
                    </div>
                </div>
                <div class="w3-row w3-section">
                    <div class="w3-col" style="width:100px"><b>Summary</b></div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border w3-round-large" name="summary" type="text" value="<?php echo $article['news_summary']; ?>">
                    </div>
                </div>
                <div class="w3-row w3-section">
                    <b>Content</b>
                </div>
                <div class="w3-row w3-section">
                    <textarea class="w3-input w3-border w3-round-large" name="content"><?php echo $article['news_content']; ?></textarea>
                </div>
                <div class="w3-row w3-section">
                    <input class="w3-btn w3-round green" type="submit" value="Publish Changes" <?php echo (isset($error)?'disabled':''); ?> />
                </div>
            </form>
        </div>
    </div>
</div>
