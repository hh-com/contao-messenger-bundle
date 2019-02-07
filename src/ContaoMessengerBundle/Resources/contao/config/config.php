<?php


    /**
     * Back end modules
     */
    $GLOBALS['BE_MOD']['content']['pm'] = array
    (
        'tables'			=> array('tl_messenger'),
        'icon'				=> 'system/modules/pm/html/icon.gif',
    );

    $GLOBALS['FE_MOD']['user']['cmessenger'] = 'ContaoMessengerBundle\MessengerModule';

?>