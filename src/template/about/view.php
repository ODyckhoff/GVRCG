<div class="w3-container">
    <h1><?php echo $text->get_text('aboutus'); ?></h1>
        <div class="w3-row">
            <div class="w3-half w3-padding">
        <?php $textarr = explode('<br />', nl2br($text->get_text('hometext')));
        foreach($textarr as $textblob) {
            echo '<p>' . $textblob . '</p>';
        }
        ?>
            </div>
            <div class="w3-half w3-padding">
                <img src="<?php echo BASE_URI; ?>/pub/img/9660-blaengarw.jpg" class="contentimg w3-card-8 w3-image" />
            </div>
        </div>
    <a class="w3-btn green w3-text-white w3-large w3-round" href="<?php echo BASE_URI; ?>/about/railway">
        <?php echo $text->get_text('learnrailway'); ?> &raquo;
    </a>
</div>
