<div class="w3-container">
    <div class="w3-content w3-padding">
<?php
    if(isset($noop) && $noop == true) {
        exit;
    }
    if(isset($success)) {
        echo '<div class="w3-panel w3-padding w3-leftbar w3-border-green w3-pale-green">' . $success . '</div>';
    }
?>


