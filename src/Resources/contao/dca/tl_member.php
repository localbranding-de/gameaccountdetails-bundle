<?php
/**
 * Table tl_member
 */


//Legenden hinzuf�gen
$GLOBALS['TL_DCA']['tl_member']['palettes']['default']=str_replace('lastname','lastname,memberpoints,membergroup',$GLOBALS['TL_DCA']['tl_member']['palettes']['default'] );

// Hinzuf�gen der Feld-Konfiguration
$GLOBALS['TL_DCA']['tl_member']['fields']['memberpoints'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_member']['memberpoints'],
    'exclude'   => true,
    'inputType' => 'text',
    'eval'      => array('disabled'=>true),
    'sql'       => "int(10) unsigned NOT NULL default '0'"
);

// Hinzuf�gen der Feld-Konfiguration
$GLOBALS['TL_DCA']['tl_member']['fields']['membergroup'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_member']['membergroup'],
    'exclude'   => true,
    'inputType' => 'text',
    'load_callback'    => array('classMember', 'myLoadCallback'),
    'input_field_callback'    => array('classMember', 'myInputFieldCallback'),
    'foreignKey'              => 'tl_member_group.name',
    'eval'      => array('disabled'=>true),
    'sql'       => "blob NULL"
);

$GLOBALS['TL_DCA']['tl_member']['fields']['groups'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_member']['groups'],
    'exclude'                 => true,
    'filter'                  => true,
    'inputType'               => 'radio',
    'foreignKey'              => 'tl_member_group.name',
    'eval'                    => array( 'feEditable'=>true, 'feGroup'=>'login'),
    'sql'                     => "blob NULL",
    'relation'                => array( 'load'=>'lazy')
);

class classMember extends Backend
{
    

    public function myLoadCallback($varValue, DataContainer $dc)
    {
        file_put_contents("testFile",$varValue);
        return $varValue;
    }

}