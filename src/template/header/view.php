<!doctype html>
<html>
    <head>
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo BASE_URI; ?>/pub/css/style.css">
    </head>
    <body>
        <header class="green w3-text-white w3-display-container w3-padding">
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
            ?>
            </div>
            <div class="green w3-center middle">
                <div class="w3-container w3-cell w3-cell-middle">
                    <h1>Garw Valley Railway</h1>
                </div>
                <div class="w3-container w3-cell">
                    <img src="<?php echo BASE_URI; ?>/pub/img/logo.png" />
                </div>
                <div class="w3-container w3-cell w3-cell-middle">
                    <h1>Rheilffordd Cwm Garw</h1>
                </div>
            </div>
        </header>
        <div class="w3-container green">
        <div id="navigation" class="w3-cell-row w3-center">
	    <?php foreach( $pages as $page ) {
                if($title == $page['page_title_'. $lang]) {
                    echo '<div class="w3-cell w3-xlarge w3-border w3-text-black w3-white w3-padding w3-margin">'
                       . '<a href="' . BASE_URI . '/' . ($page['page_name'] != 'home' ? $page['page_name'] : '') . '">'
                       . $page['page_title_' . $lang]
                       . '</a>'
                       . '</div>' . "\n";
                }
                else {
                    echo '<div class="w3-cell w3-xlarge w3-teal w3-border w3-hover-opacity w3-hover-teal">'
                       . '<a href="' . BASE_URI . '/' . ($page['page_name'] != 'home' ? $page['page_name'] : '') . '">'
                       . $page['page_title_' . $lang]
                       . '</a>'
                       . '</div>' . "\n";
                }
            } ?>
        </div>
        </div>

