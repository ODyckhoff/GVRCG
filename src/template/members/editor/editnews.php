<div class="w3-container">

        <h2>Edit News Item</h2>
        <h4>Pick news article to edit.</h4>

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
            <a class="w3-btn green" href="<?php echo BASE_URI; ?>/members/editor/editnews/<?php echo $article['news_id']; ?>">Edit</a>
        </div>
    <?php
        }
    ?>
</div>
