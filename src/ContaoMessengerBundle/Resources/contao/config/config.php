<?php

#echo 45453;
    /**
     * Back end modules
     */
    $GLOBALS['BE_MOD']['content']['pm'] = array
    (
        'tables'			=> array('tl_messages'),
        'icon'				=> 'system/modules/pm/html/icon.gif',
    );

    $GLOBALS['FE_MOD']['user']['cmessenger'] = 'ContaoMessengerBundle\MessengerModule';

?>