<?php
/**
 * Table tl_lb_gameAccountDetail
 */



$GLOBALS['TL_DCA']['tl_lb_gameAccountDetail'] = array
(
    
    // Config
    'config' => array
    (
        'dataContainer'               => 'Table',
        'sql' => array
        (
            'keys' => array
            (
                'id' => 'primary'
                
            )
        )
    ),
    // Palettes
    'palettes' => array
    (
        
        'default'                     => '{gameAccount_legend},shop_product,usernameLabel,username,email,password,optionalSecurity,firstname,lastname,dateOfBirth,country,sold,note;'
        
    ),
    // Fields
    'fields' => array
    (
        
        'id' => array
        (
            'sql'       => "int(10) unsigned NOT NULL auto_increment",
        ),
        'username' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_lb_gameAccountDetail']['username'],
            'exclude'                 => true,
            'search'                  => true,
            'sorting'                 => true,
            'flag'                    => 1,
            'inputType'               => 'text',
            'eval'                    => array('unique'=>true, 'rgxp'=>'extnd', 'nospace'=>true, 'maxlength'=>64, 'feEditable'=>true, 'feViewable'=>true, 'tl_class'=>'w50'),
            'sql'                     => "varchar(64) COLLATE utf8_bin NULL"
        ),
        'usernameLabel' => array
        (
            'label'     => &$GLOBALS['TL_LANG']['tl_lb_gameAccountDetail']['usernameLabel'],
            'inputType' => 'text',
            'eval'      => array('tl_class'=>'w50'),
            'sql'       => "varchar(256) NOT NULL default ''"
        ),
        'shop_product' => array
        (
            'label'     => &$GLOBALS['TL_LANG']['tl_lb_gameAccountDetail']['shop_product'],
            'exclude'   => true,
            'inputType' => 'select',
            'eval'      => array('submitOnChange'=>true,'feEditable'=>true, 'feViewable'=>true),
            'foreignKey'=> 'tl_ls_shop_products.id',
            'options_callback'  => array('GameAcc_Class', 'myOptionsCallback'),
            'sql'       => "int(10) unsigned NOT NULL default '0'"
        ),
        'email' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['MSC']['email'],
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
            'inputType'               => 'text',
            'eval'                    => array('mandatory'=>true, 'preserveTags'=>true,'feEditable'=>true, 'tl_class'=>'clr'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'optionalSecurity' => array
        (
            'label'     => &$GLOBALS['TL_LANG']['tl_lb_gameAccountDetail']['optionalSecurity'],
            'inputType' => 'text',
            'eval'      => array('tl_class'=>'clr'),
            'sql'       => "varchar(256) NOT NULL default ''"
        ),
        'securityQuestion' => array
        (
            'label'     => &$GLOBALS['TL_LANG']['tl_lb_gameAccountDetail']['securityQuestion'],
            'inputType' => 'text',
            'sql'       => "varchar(256) NOT NULL default ''"
        ),
        'securityQuestionAnswer' => array
        (
            'label'     => &$GLOBALS['TL_LANG']['tl_lb_gameAccountDetail']['securityQuestionAnswer'],
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
            'eval'                    => array('maxlength'=>255, 'feEditable'=>true, 'feViewable'=>true,  'tl_class'=>'w50'),
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
            'eval'                    => array('maxlength'=>255, 'feEditable'=>true, 'feViewable'=>true, 'tl_class'=>'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'dateOfBirth' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_lb_gameAccountDetail']['dateOfBirth'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval'                    => array('rgxp'=>'date', 'datepicker'=>true, 'feEditable'=>true, 'feViewable'=>true, 'tl_class'=>'w50 wizard'),
            'sql'                     => "varchar(11) NOT NULL default ''"
        ),
        'country' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_lb_gameAccountDetail']['country'],
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
        'label'     => &$GLOBALS['TL_LANG']['tl_lb_gameAccountDetail']['dateOfBirth'],
        'inputType' => 'checkbox',
        'eval'      => array('tl_class'=>'clr'),
        'sql'                     => "char(1) NOT NULL default ''"
    ),
    'note' => array
    (
        'label'                   => &$GLOBALS['TL_LANG']['tl_member']['note'],
        'exclude'                 => true,
        'search'                  => true,
        'sorting'                 => true,
        'flag'                    => 1,
        'inputType'               => 'textarea',
        'eval'                    => array('rte'=>'tinyMCE', 'tl_class'=>'clr'),
        'sql'                     => "text NOT NULL"
    ),
    'cid' => array
    (
        'label'              => &$GLOBALS['TL_LANG']['tl_lb_gameAccountDetail']['lb_cid'],
        'sql'                => "varchar(64) COLLATE utf8_bin NULL",
        'eval'               => array('feEditable'=>true, 'feViewable'=>true),
        'inputType'          => 'text'
    ),
    'cdate' => array
    (
        'label'              => &$GLOBALS['TL_LANG']['tl_lb_gameAccountDetail']['lb_cdate'],
        'sql'                => "int(10) unsigned NOT NULL default '0'",
        'eval'               => array('feEditable'=>true, 'feViewable'=>true),
        'inputType'          => 'text'
    ),
    'uid' => array
    (
        'label'              => &$GLOBALS['TL_LANG']['tl_lb_gameAccountDetail']['lb_uid'],
        'sql'                => "varchar(64) COLLATE utf8_bin NULL",
        'eval'               => array('feEditable'=>true, 'feViewable'=>true),
        'inputType'          => 'text'
    ),
    'udate' => array
    (
        'label'              => &$GLOBALS['TL_LANG']['tl_lb_gameAccountDetail']['lb_udate'],
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
        
        'fields'                  => array('shop_product','sold')
    ),
    'label' => array
    (
        'fields'                  => array('shop_product','username','email','password','sold'),
        'showColumns'             => true
        
    ),
    'operations' => array
    (
        'edit' => array
        (
            'label'               => &$GLOBALS['TL_LANG']['tl_lb_gameAccountDetail']['edit'],
            'href'                => 'act=edit',
            'icon'                => 'edit.svg'
        ),
        
        'copy' => array
        (
            'label'               => &$GLOBALS['TL_LANG']['tl_news']['copy'],
            'href'                => 'act=copy',
            'icon'                => 'copy.gif'
        ),
        
        'delete' => array
        (
            'label'               => &$GLOBALS['TL_LANG']['tl_news']['delete'],
            'href'                => 'act=delete',
            'icon'                => 'delete.gif',
            'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
        ),
    )
)



);

class GameAcc_Class extends \Backend
{
    public function myOptionsCallback(DataContainer $dc)
    {
        $values = array();
        $products = $this->Database->prepare("SELECT id,title FROM tl_ls_shop_product WHERE  lb_productIsGameAccount = ? ORDER BY title ASC")->execute(1);
        //Array erzeugen
        while($products->next())
        {
            $values[$products->id] = "<b>".$products->title."</b> ";
        }
        return $values;
    }
    
    
}