<div class="w3-container w3-row-padding w3-margin">
    <div class="w3-container w3-quarter">
        <a href="<?php echo BASE_URI; ?>/events">
        <div class="w3-card-12 w3-text-white green w3-large w3-center w3-padding">
            <p><?php echo $text->get_text('whatson'); ?></p>
            <p><i class="w3-jumbo fa fa-calendar"></i></p>
            <p><?php echo $text->get_text('checkdate'); ?></p>
        </div>
        </a>
        <br />
        <a href="<?php echo BASE_URI; ?>/member/register">
        <div class="w3-card-12 w3-text-white green w3-large w3-center w3-padding w3-margin-bottom">
            <p><?php echo $text->get_text('weneedyou'); ?></p>
            <p><i class="w3-jumbo fa fa-handshake-o"></i></p>
            <p><?php echo $text->get_text('volunteerwith'); ?></p>
        </div>
        </a>
    </div>
    <div class="w3-container w3-half w3-center w3-padding">
    <?php $textarr = explode('<br />', nl2br($text->get_text('hometext'))); echo $textarr[0]; ?><br /><br />
    <img class="w3-card-12 w3-image" src="<?php echo BASE_URI; ?>/pub/img/workers.jpg" />
    <br /><br /><a href="http://facebook.com/garwvalleyrailway"><i class="fa fa-facebook-square w3-jumbo w3-text-blue"></i></a> <a href="http://twitter.com/GarwValleyRail"><i class="fa fa-twitter-square w3-jumbo w3-text-light-blue"></i></a>
    </div>
    <div class="w3-container w3-quarter">
        <a href="<?php echo BASE_URI; ?>/funding">
        <div class="w3-card-12 w3-text-white green w3-large w3-center w3-padding">
            <p><?php echo $text->get_text('donatetous'); ?></p>
            <p><i class="w3-jumbo fa fa-gift"></i></p>
            <p><?php echo $text->get_text('helphistory'); ?></p>
        </div>
        </a>
        <br />
        <a href="<?php echo BASE_URI; ?>/contact">
        <div class="w3-card-12 w3-text-white green w3-large w3-center w3-padding">
            <p><?php echo $text->get_text('updatecontact'); ?></p>
            <p><!--<i class="w3-jumbo fa fa-feed"></i>
               &nbsp;-->
               <i class="w3-jumbo fa fa-envelope"></i>
               &nbsp;
               <!--<i class="w3-jumbo fa fa-phone"></i>
               &nbsp;
               <i class="w3-jumbo fa fa-mobile-phone"></i>-->
            </p>
            <p><?php echo $text->get_text('stayintouch'); ?></p>
        </div>
        </a>
    </div>
</div>
<!--<div class="w3-margin w3-row-padding">
    <div class="w3-container w3-quarter">&nbsp;</div>
    <div class="w3-container green w3-text-white w3-center w3-half w3-padding">
            <img src="<?php echo BASE_URI; ?>/pub/img/9660-brynmenyn.png" width="60%" class="w3-round w3-center" />
            <p><?php echo $desc['text_' . $lang]; ?></p>
    </div>
    <div class="w3-container w3-quarter">&nbsp;</div>
</div>
-->
