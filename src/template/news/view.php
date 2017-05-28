<div class="w3-container">
    <h1><?php echo $title; ?></h1>

    <?php
        foreach($newslist as $item) {
    ?>
        <div class="w3-container w3-padding w3-card-2">
            <h3><?php echo $item['news_title']; ?></h3>
            <p><i><?php
                if($item['news_update'] != '0000-00-00 00:00:00') {
                    echo 'Last Updated: ' . $item['news_update'];
                }
                else {
                    echo 'Published: ' . $item['news_pubdate'];
                }
                echo ' by ' . $item['news_author'];
                ?></i></p>
            <h3><?php echo $item['news_summary']; ?></h3>
            <a class="w3-btn green" href="<?php echo BASE_URI; ?>/news/read/<?php echo $item['news_id']; ?>">&raquo; Read More...</a>
        </div>
    <?php
        }
    ?>
</div>
