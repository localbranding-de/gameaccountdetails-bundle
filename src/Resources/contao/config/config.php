<?php

/**
 * Hooks.
 */
$GLOBALS['TL_HOOKS']['outputBackendTemplate'][] = array('LocalbrandingDe\GameAccountDetailsBundle\honischClass', 'myOutputBackendTemplate');
// Frontend modules
$GLOBALS['FE_MOD']['miscellaneous']['helloWorld'] = 'LocalbrandingDe\GameAccountDetailsBundle\Classes\HelloWorldModule';