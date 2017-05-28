<div class="w3-container">
    <h1><?php echo $content['news_title']; ?></h1>
        <div> 
            <h4><i><?php
                if($content['news_update'] != '0000-00-00 00:00:00') {
                    echo 'Last Updated: ' . $content['news_update'];
                }
                else {
                    echo 'Published: ' . $content['news_pubdate'];
                }
                echo ' by ' . $content['news_author'];
                ?></i></h4>
            <h2><?php echo $content['news_summary']; ?></h2>
            <p><?php echo $content['news_content']; ?></p>
        </div>
</div>
