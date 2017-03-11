<!doctype html>
<html>
    <head>
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo BASE_URI; ?>/pub/css/style.css">
    </head>
    <body>
        <header class="green w3-text-white w3-container">
        <?php $lang = new Lang();
              if($lang->getLang() == 'en') {
                  echo '<a class="w3-right" href="' . BASE_URI . '/action/setlang/cy">Dewis iaith i Cymraeg</a>';
              }
              else {
                  echo '<a class="w3-right" href="' . BASE_URI . '/action/setlang/en">Change language to English</a>';
              }
        ?><br />
            <div class="green w3-center w3-half" style="margin-left:30%">
                <div class="w3-container w3-cell">
                    <img src="<?php echo BASE_URI; ?>/pub/img/logo.png" />
                </div>
                <div class="w3-container w3-cell w3-cell-middle w3-center">
                    <h1>Garw Valley Railway</h1>
                    <h1>Rheilffordd Cwm Garw</h1>
                </div>
            </div>
        <div id="navigation" class="w3-cell-row w3-center" style="width=30%">
            <?php foreach( $pages as $page ) {
                echo '<div class="w3-cell">' . $page . '</div>' . "\n";
            } ?>
        </div>
        </header>
