<?php

/**
 * Hooks.
 */
$GLOBALS['MERCONIS_HOOKS']['afterCheckout'][] = array(\LocalbrandingDe\gameAccountDetailsBundle\Classes\AccountMail::class, 'AccountMail');


array_insert($GLOBALS['BE_MOD'], 1,
    array(
        
        'GameAccounts' => array
        (
            'gameAccountDetails' => array
            (
                'tables'        => array('tl_lb_gameAccountDetails')
            )
        )
    )
    )
    ;
