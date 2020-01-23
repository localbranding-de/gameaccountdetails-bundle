<?php
/**
 * Table tl_member_group
 */
    
    
//Legenden hinzuf�gen
$GLOBALS['TL_DCA']['tl_member_group']['palettes']['default']=str_replace('{title_legend},name','{title_legend},name,isSpecial,memberpoints',$GLOBALS['TL_DCA']['tl_member_group']['palettes']['default'] );

// Hinzuf�gen der Feld-Konfiguration
$GLOBALS['TL_DCA']['tl_member_group']['fields']['isSpecial'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_member_group']['isSpecial'],
    'exclude'   => true,
    'inputType' => 'checkbox',
    'eval'      => array('feEditable'=>true, 'feViewable'=>true,'tl_class'=>'clr'),
    'sql'       => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_member_group']['fields']['memberpoints'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_member_group']['memberpoints'],
    'exclude'                 => true,
    'eval'                    => array('submitOnChange'=>true,'tl_class'=>'clr'),
    'filter'                  => true,
    'inputType'               => 'text',
    'sql'                     => "int(10) unsigned NOT NULL default '0'"
);
