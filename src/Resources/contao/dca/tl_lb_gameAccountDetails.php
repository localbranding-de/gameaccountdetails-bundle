<?php
/**
 * Table tl_lb_gameAccountDetails
 */



$GLOBALS['TL_DCA']['tl_lb_gameAccountDetails'] = array
(
    
    // Config
    'config' => array
    (
        'dataContainer'               => 'Table',
        'sql' => array
        (
            'keys' => array
            (
                'id' => 'primary',
                'i' => 'index'
            )
        )
    ),
    // Palettes
    'palettes' => array
    (

        'default'                     => '{primary_legend},spotcolor1,spotcolor2;{greytone_legend},black,midgrey,lightgrey,white,bodybackground;{ui_legend},error,success,info,signal,warning,inactive;'
        
    ),
    // Fields
    'fields' => array
    (


        'username' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_lb_gameAccountDetails']['username'],
            'exclude'                 => true,
            'search'                  => true,
            'sorting'                 => true,
            'flag'                    => 1,
            'inputType'               => 'text',
            'eval'                    => array('mandatory'=>true, 'unique'=>true, 'rgxp'=>'extnd', 'nospace'=>true, 'maxlength'=>64, 'feEditable'=>true, 'feViewable'=>true, 'tl_class'=>'w50'),
            'sql'                     => "varchar(64) COLLATE utf8_bin NULL"
        ),
        'usernameLabel' => array
        (
            'label'     => &$GLOBALS['TL_LANG']['tl_lb_gameAccountDetails']['usernameLabel'],
            'inputType' => 'text',
            'sql'       => "varchar(256) NOT NULL default ''"
        ),
        'email' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_lb_gameAccountDetails']['email'],
            'exclude'                 => true,
            'search'                  => true,
            'inputType'               => 'text',
            'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'rgxp'=>'email', 'unique'=>true, 'decodeEntities'=>true, 'feEditable'=>true, 'feViewable'=>true, 'feGroup'=>'contact', 'tl_class'=>'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'password' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['MSC']['password'],
            'exclude'                 => true,
            'inputType'               => 'password',
            'eval'                    => array('mandatory'=>true, 'preserveTags'=>true,'feEditable'=>true, 'tl_class'=>'clr'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'optionalSecurity' => array
        (
            'label'     => &$GLOBALS['TL_LANG']['tl_lb_gameAccountDetails']['optionalSecurity'],
            'inputType' => 'text',
            'sql'       => "varchar(256) NOT NULL default ''"
        ),
        'securityQuestion' => array
        (
            'label'     => &$GLOBALS['TL_LANG']['tl_lb_gameAccountDetails']['securityQuestion'],
            'inputType' => 'text',
            'sql'       => "varchar(256) NOT NULL default ''"
        ),
        'securityQuestionAnswer' => array
        (
            'label'     => &$GLOBALS['TL_LANG']['tl_lb_gameAccountDetails']['securityQuestionAnswer'],
            'inputType' => 'text',
            'sql'       => "varchar(255) NOT NULL default ''"
        ),
        'firstname' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_member']['firstname'],
            'exclude'                 => true,
            'search'                  => true,
            'sorting'                 => true,
            'flag'                    => 1,
            'inputType'               => 'text',
            'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'feEditable'=>true, 'feViewable'=>true,  'tl_class'=>'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'lastname' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_member']['lastname'],
            'exclude'                 => true,
            'search'                  => true,
            'sorting'                 => true,
            'flag'                    => 1,
            'inputType'               => 'text',
            'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'feEditable'=>true, 'feViewable'=>true, 'tl_class'=>'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'dateOfBirth' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_lb_gameAccountDetails']['dateOfBirth'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval'                    => array('rgxp'=>'date', 'datepicker'=>true, 'feEditable'=>true, 'feViewable'=>true, 'tl_class'=>'w50 wizard'),
            'sql'                     => "varchar(11) NOT NULL default ''"
        ),
        'country' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_lb_gameAccountDetails']['country'],
            'exclude'                 => true,
            'filter'                  => true,
            'sorting'                 => true,
            'inputType'               => 'select',
            'eval'                    => array('includeBlankOption'=>true, 'chosen'=>true, 'feEditable'=>true, 'feViewable'=>true,'tl_class'=>'w50'),
            'options_callback' => function ()
            {
                return System::getCountries();
},
'sql'                     => "varchar(2) NOT NULL default ''"
    ),
    
        'sold' => array
        (
            'label'     => &$GLOBALS['TL_LANG']['tl_lb_gameAccountDetails']['dateOfBirth'],
            'inputType' => 'checkbox',
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'cid' => array
        (
            'label'              => &$GLOBALS['TL_LANG']['tl_lb_gameAccountDetails']['lb_cid'],
            'sql'                => "varchar(64) COLLATE utf8_bin NULL",
            'eval'               => array('feEditable'=>true, 'feViewable'=>true),
            'inputType'          => 'text'
        ),
        'cdate' => array
        (
            'label'              => &$GLOBALS['TL_LANG']['tl_lb_gameAccountDetails']['lb_cdate'],
            'sql'                => "int(10) unsigned NOT NULL default '0'",
            'eval'               => array('feEditable'=>true, 'feViewable'=>true),
            'inputType'          => 'text'
        ),
        'uid' => array
        (
            'label'              => &$GLOBALS['TL_LANG']['tl_lb_gameAccountDetails']['lb_uid'],
            'sql'                => "varchar(64) COLLATE utf8_bin NULL",
            'eval'               => array('feEditable'=>true, 'feViewable'=>true),
            'inputType'          => 'text'
        ),
        'udate' => array
        (
            'label'              => &$GLOBALS['TL_LANG']['tl_lb_gameAccountDetails']['lb_udate'],
            'sql'                => "int(10) unsigned NOT NULL default '0'",
            'eval'               => array('feEditable'=>true, 'feViewable'=>true),
            'inputType'          => 'text'
        ),
        'tstamp' => array
        (
            'sql'                     => "int(10) unsigned NOT NULL default '0'"
        )
    ),
    // List
    'list' => array
    (
        'sorting' => array
        (
           
            'fields'                  => array('spotcolor1')
        ),
        'label' => array
        (
            'fields'                  => array('spotcolor1'),
            'showColumns'             => true
            
        ),
        'operations' => array
        (
            'edit' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_lb_gameAccountDetails']['edit'],
                'href'                => 'act=edit',
                'icon'                => 'edit.svg'
            )
        )
    )
    

    
);

class Branding_class
{
    
 
}