<div class="w3-content">
    <div class="w3-container">
        <a href="<?php echo BASE_URI; ?>/members">Go back to Dashboard</a>
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
    <h2>News Editor</h2>
        <p>
            <a class="w3-btn w3-green w3-round-large" href="<?php echo BASE_URI; ?>/members/editor/news/add"><i class="fa fa-plus" aria-hidden="true"></i> Add News Item</a>
        </p>
        <?php
            foreach($content as $article) {
        ?>
        <div class="w3-container w3-padding w3-card-2">
            <h3><?php echo $article['news_title']; ?></h3>
            <p><i><?php
                if($article['news_update'] != '0000-00-00 00:00:00') {
                    echo 'Last Updated: ' . $article['news_update'];
                }
                else {
                    echo 'Published: ' . $article['news_pubdate'];
                }
                echo ' by ' . $article['news_author'];
                ?></i></p>
            <h3><?php echo $article['news_summary']; ?></h3>
            <a class="w3-btn w3-round-large green" href="<?php echo BASE_URI; ?>/members/editor/news/edit/<?php echo $article['news_id']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
            <a class="w3-btn w3-round-large w3-red w3-text-white" href="<?php echo BASE_URI; ?>/members/editor/news/delete/<?php echo $article['news_id']; ?>"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
        </div>
    <?php
        }
    ?>
    </div>
</div>
