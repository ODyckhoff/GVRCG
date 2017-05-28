<!doctype html>
<html>
    <head>
        <title><?php echo $title; ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo BASE_URI; ?>/pub/css/style.css">
    </head>
    <body>
    <div class="notfooter">
        <header class="green w3-text-white w3-display-container w3-padding w3-hide-medium w3-hide-small">
            <div class="w3-container">
            <?php
                if($lang == 'en') {
                    echo '<span class="w3-right w3-padding"><a href="' . BASE_URI . '/action/setlang/cy"><img src="' . BASE_URI . '/pub/img/wales_icon.png" height="20px" width="auto" /> Dewis iaith i Cymraeg</a>&nbsp;</span>';
                }
                else {
                    echo '<span class="w3-right w3-padding"><a href="' . BASE_URI . '/action/setlang/en"><img src="' . BASE_URI . '/pub/img/england_icon.png" height="20px" width="auto" /> Change language to English</a>&nbsp;</span>';
                }

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
            <div class="w3-container green w3-center middle" style="width:100%;">
                <a href="<?php echo BASE_URI; ?>">
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
                       . '<a href="' . BASE_URI . '/' . ($page['page_name'] != 'home' ? $page['page_name'] : '') . '">'
                       . $page['page_title_' . $lang]
                       . '</a>'
                       . '</li>' . "\n";
                }
                else {
                    echo '<li class="w3-hide-medium w3-hide-small w3-large w3-green w3-border w3-text-white w3-hover-opacity w3-hover-green">'
                       . '<a href="' . BASE_URI . '/' . ($page['page_name'] != 'home' ? $page['page_name'] : '') . '">'
                       . $page['page_title_' . $lang]
                       . '</a>'
                       . '</li>' . "\n";
                }
            } ?>
                </ul>
            </div>
        </header>

        <header class="green w3-hide-large w3-top w3-bottombar w3-text-white w3-border-white">
            <a href="<?php echo BASE_URI; ?>">
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
                                    if($lang == 'en') {
                                        echo '<a class="w3-bar-item w3-button" href="' . BASE_URI . '/action/setlang/cy"><img src="' . BASE_URI . '/pub/img/wales_icon.png" height="20px" width="auto" /> Dewis iaith i Cymraeg</a>';
                                    }
                                    else {
                                        echo '<a class="w3-bar-item w3-button" href="' . BASE_URI . '/action/setlang/en"><img src="' . BASE_URI . '/pub/img/england_icon.png" height="20px" width="auto" /> Change language to English</a>';
                                    }
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

