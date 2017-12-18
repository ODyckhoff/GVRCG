<?php

    /* define user levels */
    define( 'LVL_DEVELOPER', 0 );
    define( 'LVL_ADMIN',     1 );
    define( 'LVL_BOARD',     2 );
    define( 'LVL_EDITOR',    3 );
    define( 'LVL_USER',      4 );
    define( 'LVL_VISITOR',   5 );

    require_once(CFG . 'config.php');
    require_once(LIB . 'shared.php');
