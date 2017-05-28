<?php
class Auth {
    static function chk_auth($value = LVL_VISITOR) {
        $s = new Session();
        if(!$s->sessionIsSet('loggedin')
        || !$s->sessionGet('loggedin')['approved'] 
        || $s->sessionGet('loggedin')['level'] > $value)
        {
            return false;
        }
        return true;
    }

    static function access_denied($text) {
        echo '<div class="w3-content"><div class="w3-panel w3-leftbar w3-border-red w3-pale-red w3-padding">';
        echo '<h1>' . $text->get_text('denied') . '</h1>';
        echo '<p>' . $text->get_text('noauth') . '</p>';
        echo '</div></div>';
    }
}
