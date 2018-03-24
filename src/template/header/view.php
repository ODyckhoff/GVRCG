<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title; ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src='https://www.google.com/recaptcha/api.js'></script>

        <!-- include libraries(jQuery, bootstrap) -->
        <!--<link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet"> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
        <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 

        <!-- include summernote css/js
        <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
        <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script> -->

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>

        <link rel="stylesheet" href="<?php echo PROTOCOL . BASE_URI; ?>/pub/css/style.css">
        <script>
            function getItems() {
                var myitems = $( "#sortable > tr").not(':first');
            }
            $( function() {
                $( "#sortable" ).sortable({ disabled: true });
                $( "#sortable" ).disableSelection();
            } );
        </script>

        <!-- Favicon stuff -->

        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo PROTOCOL . BASE_URI; ?>/pub/favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?php echo PROTOCOL . BASE_URI; ?>/pub/favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo PROTOCOL . BASE_URI; ?>/pub/favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo PROTOCOL . BASE_URI; ?>/pub/favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo PROTOCOL . BASE_URI; ?>/pub/favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo PROTOCOL . BASE_URI; ?>/pub/favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo PROTOCOL . BASE_URI; ?>/pub/favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo PROTOCOL . BASE_URI; ?>/pub/favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo PROTOCOL . BASE_URI; ?>/pub/favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo PROTOCOL . BASE_URI; ?>/pub/favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo PROTOCOL . BASE_URI; ?>/pub/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo PROTOCOL . BASE_URI; ?>/pub/favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo PROTOCOL . BASE_URI; ?>/pub/favicon/favicon-16x16.png">
        <link rel="manifest" href="<?php echo PROTOCOL . BASE_URI; ?>/pub/favicon/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="<?php echo PROTOCOL . BASE_URI; ?>/pub/favicon/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">    
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
                    echo '<span class="w3-right w3-padding"><a href="' . PROTOCOL . BASE_URI . '/action/setlang/cy"><img src="' . PROTOCOL . BASE_URI . '/pub/img/wales_icon.png" height="20px" width="auto" /> Dewis iaith i Cymraeg</a>&nbsp;</span>';
                }
                else {
                    echo '<span class="w3-right w3-padding"><a href="' . PROTOCOL . BASE_URI . '/action/setlang/en"><img src="' . PROTOCOL . BASE_URI . '/pub/img/england_icon.png" height="20px" width="auto" /> Change language to English</a>&nbsp;</span>';
                }
                */
                $sess = new Session();
                if($sess->sessionIsSet('loggedin')) {
                    echo '<a class="w3-right w3-btn w3-red w3-hover-opacity w3-round" href="' . PROTOCOL . BASE_URI . '/action/logout">' . $text->get_text('logout') . '</a>';
                }
                else {
                    echo '<a class="w3-right w3-btn w3-blue w3-hover-opacity w3-round w3-margin-left" href="' . PROTOCOL . BASE_URI . '/members/register">' . $text->get_text('register') . '</a>';
                    echo '<a class="w3-right w3-btn w3-green w3-hover-opacity w3-round" href="' . PROTOCOL . BASE_URI . '/members/auth">' . $text->get_text('login') . '</a>';
                }
            ?>
            </div>
            <div class="w3-container green w3-text-white w3-center middle" style="width:100%;">
                <a class="w3-text-white" href="<?php echo PROTOCOL . BASE_URI; ?>">
                <div id="wrapper" class="middle">
                <div class="w3-container w3-cell w3-cell-middle">
                    <h1>Garw Valley Railway</h1>
                </div>
                <div class="w3-container w3-cell">
                    <!--<img src="<?php echo PROTOCOL . BASE_URI; ?>/pub/img/logo.png" />-->
                    <img src="<?php echo PROTOCOL . BASE_URI; ?>/pub/img/gvrcirclelogo.png" width="150px" />
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
                       . '<a class="w3-text-black" href="' . PROTOCOL . BASE_URI . '/' . ($page['page_name'] != 'home' ? $page['page_name'] : '') . '">'
                       . $page['page_title_' . $lang]
                       . '</a>'
                       . '</li>' . "\n";
                }
                else {
                    echo '<li class="w3-hide-medium w3-hide-small w3-large w3-green w3-border w3-text-white w3-hover-opacity w3-hover-green">'
                       . '<a class="w3-text-white" href="' . PROTOCOL . BASE_URI . '/' . ($page['page_name'] != 'home' ? $page['page_name'] : '') . '">'
                       . $page['page_title_' . $lang]
                       . '</a>'
                       . '</li>' . "\n";
                }
            } ?>
                </ul>
            </div>
        </header>

        <header class="green w3-hide-large w3-top w3-bottombar w3-text-white w3-border-white">
            <a class="w3-text-white" href="<?php echo PROTOCOL . BASE_URI; ?>">
            <span class="w3-left">
	    <img class="w3-padding-left w3-padding-right" src="<?php echo PROTOCOL . BASE_URI; ?>/pub/img/gvrcirclelogo.png" height="45px" />
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
                                           '<a class="w3-bar-item w3-button" href="' . PROTOCOL . BASE_URI . '/' . ($page['page_name'] != 'home' ? $page['page_name'] : '') . '">'
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
                                        echo '<a class="w3-right w3-bar-item w3-btn w3-red w3-round" href="' . PROTOCOL . BASE_URI . '/action/logout">' . $text->get_text('logout') . '</a>';
                                    }
                                    else {
                                        echo '<a class="w3-right w3-bar-item w3-btn w3-blue w3-round w3-margin-left" href="' . PROTOCOL . BASE_URI . '/members/register">' . $text->get_text('register') . '</a>';
                                        echo '<a class="w3-right w3-bar-item w3-btn w3-green w3-round" href="' . PROTOCOL . BASE_URI . '/members/auth">' . $text->get_text('login') . '</a>';
                                    }
                                   /* if($lang == 'en') {
                                        echo '<a class="w3-bar-item w3-button" href="' . PROTOCOL . BASE_URI . '/action/setlang/cy"><img src="' . PROTOCOL . BASE_URI . '/pub/img/wales_icon.png" height="20px" width="auto" /> Dewis iaith i Cymraeg</a>';
                                    }
                                    else {
                                        echo '<a class="w3-bar-item w3-button" href="' . PROTOCOL . BASE_URI . '/action/setlang/en"><img src="' . PROTOCOL . BASE_URI . '/pub/img/england_icon.png" height="20px" width="auto" /> Change language to English</a>';
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

