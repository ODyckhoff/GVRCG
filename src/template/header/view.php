<!doctype html>
<html>
    <head>
        <title><?php echo $title; ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src='https://www.google.com/recaptcha/api.js'></script>

        <!-- include libraries(jQuery, bootstrap) -->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">

        <!-- include summernote css/js-->
        <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet"> 
        <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>

        <link rel="stylesheet" href="https://<?php echo BASE_URI; ?>/pub/css/style.css">
        <script>
            function getItems() {
                var myitems = $( "#sortable > tr").not(':first');
            }
            $( function() {
                $( "#sortable" ).sortable({ disabled: true });
                $( "#sortable" ).disableSelection();
            } );
        </script>
    </head>
    <body>
<style>
/* customizable snowflake styling */
.snowflake {
  color: #fff;
  font-size: 1em;
  font-family: Arial;
  text-shadow: 0 0 1px #000;
}

@-webkit-keyframes snowflakes-fall{0%{top:-10%}100%{top:100%}}@-webkit-keyframes snowflakes-shake{0%{-webkit-transform:translateX(0px);transform:translateX(0px)}50%{-webkit-transform:translateX(80px);transform:translateX(80px)}100%{-webkit-transform:translateX(0px);transform:translateX(0px)}}@keyframes snowflakes-fall{0%{top:-10%}100%{top:100%}}@keyframes snowflakes-shake{0%{transform:translateX(0px)}50%{transform:translateX(80px)}100%{transform:translateX(0px)}}.snowflake{position:fixed;top:-10%;z-index:9999;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;cursor:default;-webkit-animation-name:snowflakes-fall,snowflakes-shake;-webkit-animation-duration:10s,3s;-webkit-animation-timing-function:linear,ease-in-out;-webkit-animation-iteration-count:infinite,infinite;-webkit-animation-play-state:running,running;animation-name:snowflakes-fall,snowflakes-shake;animation-duration:10s,3s;animation-timing-function:linear,ease-in-out;animation-iteration-count:infinite,infinite;animation-play-state:running,running}.snowflake:nth-of-type(0){left:1%;-webkit-animation-delay:0s,0s;animation-delay:0s,0s}.snowflake:nth-of-type(1){left:10%;-webkit-animation-delay:1s,1s;animation-delay:1s,1s}.snowflake:nth-of-type(2){left:20%;-webkit-animation-delay:6s,.5s;animation-delay:6s,.5s}.snowflake:nth-of-type(3){left:30%;-webkit-animation-delay:4s,2s;animation-delay:4s,2s}.snowflake:nth-of-type(4){left:40%;-webkit-animation-delay:2s,2s;animation-delay:2s,2s}.snowflake:nth-of-type(5){left:50%;-webkit-animation-delay:8s,3s;animation-delay:8s,3s}.snowflake:nth-of-type(6){left:60%;-webkit-animation-delay:6s,2s;animation-delay:6s,2s}.snowflake:nth-of-type(7){left:70%;-webkit-animation-delay:2.5s,1s;animation-delay:2.5s,1s}.snowflake:nth-of-type(8){left:80%;-webkit-animation-delay:1s,0s;animation-delay:1s,0s}.snowflake:nth-of-type(9){left:90%;-webkit-animation-delay:3s,1.5s;animation-delay:3s,1.5s}
</style>
<!--
<div class="snowflakes" aria-hidden="true">
  <div class="snowflake">
  ❄
  </div>
  <div class="snowflake">
  ❅
  </div>
  <div class="snowflake">
  ❆
  </div>
  <div class="snowflake">
  ❄
  </div>
  <div class="snowflake">
  ❅
  </div>
  <div class="snowflake">
  ❆
  </div>
  <div class="snowflake">
  ❄
  </div>
  <div class="snowflake">
  ❅
  </div>
  <div class="snowflake">
  ❆
  </div>
  <div class="snowflake">
  ❄
  </div>
</div>
-->
    <div class="notfooter">
        <header class="green w3-text-white w3-display-container w3-padding w3-hide-medium w3-hide-small">
            <div class="w3-container w3-text-white">
            <?php
                /*
                if($lang == 'en') {
                    echo '<span class="w3-right w3-padding"><a href="' . BASE_URI . '/action/setlang/cy"><img src="' . BASE_URI . '/pub/img/wales_icon.png" height="20px" width="auto" /> Dewis iaith i Cymraeg</a>&nbsp;</span>';
                }
                else {
                    echo '<span class="w3-right w3-padding"><a href="' . BASE_URI . '/action/setlang/en"><img src="' . BASE_URI . '/pub/img/england_icon.png" height="20px" width="auto" /> Change language to English</a>&nbsp;</span>';
                }
                */
                $sess = new Session();
                if($sess->sessionIsSet('loggedin')) {
                    echo '<a class="w3-right w3-btn w3-red w3-hover-opacity w3-round" href="' . BASE_URI . '/action/logout">' . $text->get_text('logout') . '</a>';
                }
                else {
                    echo '<a class="w3-right w3-btn w3-blue w3-hover-opacity w3-round w3-margin-left" href="' . BASE_URI . '/members/register">' . $text->get_text('register') . '</a>';
                    echo '<a class="w3-right w3-btn w3-green w3-hover-opacity w3-round" href="' . BASE_URI . '/members/auth">' . $text->get_text('login') . '</a>';
                }
            ?>
            </div>
            <div class="w3-container green w3-text-white w3-center middle" style="width:100%;">
                <a class="w3-text-white" href="<?php echo BASE_URI; ?>">
                <div id="wrapper" class="middle">
                <div class="w3-container w3-cell w3-cell-middle">
                    <h1>Garw Valley Railway</h1>
                </div>
                <div class="w3-container w3-cell">
                    <!--<img src="<?php echo BASE_URI; ?>/pub/img/logo.png" />-->
                    <img src="<?php echo BASE_URI; ?>/pub/img/gvrcirclelogo.png" width="150px" />
                </div>
                <div class="w3-container w3-cell w3-cell-middle">
                    <h1>Rheilffordd Cwm Garw</h1>
                </div>
                </div>
                </a>
            </div>
            <div class="w3-container">
                <span class="w3-padding"></span>
            </div>
            <div class="w3-display-container w3-center green">
                <ul class="w3-navbar largenav">

	    <?php foreach( $pages as $page ) {
                if($title == $page['page_title_'. $lang]) {
                    echo '<li class="w3-hide-medium w3-hide-small w3-large w3-border w3-text-black w3-white">'
                       . '<a class="w3-text-black" href="' . BASE_URI . '/' . ($page['page_name'] != 'home' ? $page['page_name'] : '') . '">'
                       . $page['page_title_' . $lang]
                       . '</a>'
                       . '</li>' . "\n";
                }
                else {
                    echo '<li class="w3-hide-medium w3-hide-small w3-large w3-green w3-border w3-text-white w3-hover-opacity w3-hover-green">'
                       . '<a class="w3-text-white" href="' . BASE_URI . '/' . ($page['page_name'] != 'home' ? $page['page_name'] : '') . '">'
                       . $page['page_title_' . $lang]
                       . '</a>'
                       . '</li>' . "\n";
                }
            } ?>
                </ul>
            </div>
        </header>

        <header class="green w3-hide-large w3-top w3-bottombar w3-text-white w3-border-white">
            <a class="w3-text-white" href="<?php echo BASE_URI; ?>">
            <span class="w3-left">
	    <img class="w3-padding-left w3-padding-right" src="<?php echo BASE_URI; ?>/pub/img/gvrcirclelogo.png" height="45px" />
            </span>
            <span class="w3-left">Garw Valley Railway<br />Rheilffordd Cwm Garw</span>
            </a>
            <div class="w3-right">
                <ul class="w3-navbar">
                    <li class="w3-hide-large w3-opennav w3-right">
                        <div class="w3-bar">
                            <a class="w3-padding-large w3-hover-white w3-text-white w3-large green" href="javascript:void(0);" onclick="myFunction('smallnavigation')" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
                            <div id="smallnavigation" class="w3-dropdown-content w3-border w3-right" style="right:0">
                            <?php foreach( $pages as $page ) {
                                    if($page['page_name'] != 'home') {
                                        echo
                                           '<a class="w3-bar-item w3-button" href="' . BASE_URI . '/' . ($page['page_name'] != 'home' ? $page['page_name'] : '') . '">'
                                           . $page['page_title_' . $lang]
                                           . '</a>'
                                           . '<br /><br />';
                                    }
                                } ?>
                            </div>
                        </div>
                    </li>
                    <li class="w3-hide-large w3-opennav w3-right">
                        <div class="w3-bar">
                            <a class="w3-padding-large w3-hover-white w3-large w3-text-white green" href="javascript:void(0);" onclick="myFunction('smalltools')" title="Toggle Tools"><i class="fa fa-wrench"></i></a>
                            <div id="smalltools" class="w3-dropdown-content w3-border w3-right" style="right:0">
                                   <?php
                                    $sess = new Session();
                                    if($sess->sessionIsSet('loggedin')) {
                                        echo '<a class="w3-right w3-bar-item w3-btn w3-red w3-round" href="' . BASE_URI . '/action/logout">' . $text->get_text('logout') . '</a>';
                                    }
                                    else {
                                        echo '<a class="w3-right w3-bar-item w3-btn w3-blue w3-round w3-margin-left" href="' . BASE_URI . '/members/register">' . $text->get_text('register') . '</a>';
                                        echo '<a class="w3-right w3-bar-item w3-btn w3-green w3-round" href="' . BASE_URI . '/members/auth">' . $text->get_text('login') . '</a>';
                                    }
                                   /* if($lang == 'en') {
                                        echo '<a class="w3-bar-item w3-button" href="' . BASE_URI . '/action/setlang/cy"><img src="' . BASE_URI . '/pub/img/wales_icon.png" height="20px" width="auto" /> Dewis iaith i Cymraeg</a>';
                                    }
                                    else {
                                        echo '<a class="w3-bar-item w3-button" href="' . BASE_URI . '/action/setlang/en"><img src="' . BASE_URI . '/pub/img/england_icon.png" height="20px" width="auto" /> Change language to English</a>';
                                    }*/
                                    ?>
                            </div>
                        </div>
                    </li>
               </ul>
            </div>
        </header>

       <div class="w3-navbar w3-large w3-padding w3-hide-large"><span class="w3-text-white">&nbsp;</span></div> 
       <div class="w3-navbar w3-large w3-padding w3-margin-bottom w3-hide-large w3-hide-medium w3-hide-small"><span class="w3-text-white">&nbsp;</span></div> 
       <div class="w3-navbar w3-large w3-padding w3-margin-bottom w3-hide-large w3-hide-medium w3-hide-small"><span class="w3-text-white">&nbsp;</span></div> 
       <div class="w3-container w3-padding w3-margin"></div>

