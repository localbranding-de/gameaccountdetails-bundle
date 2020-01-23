<?php
/**
 * Table tl_ls_shop_product
 */


//Legenden hinzuf�gen
$GLOBALS['TL_DCA']['tl_ls_shop_product']['palettes']['default']=str_replace('{lsShopPrice_legend},','{lsShopMemberlevel},lb_memberpointvalue;{lsShopPrice_legend},',$GLOBALS['TL_DCA']['tl_ls_shop_product']['palettes']['default'] );

// Hinzuf�gen der Feld-Konfiguration
$GLOBALS['TL_DCA']['tl_ls_shop_product']['fields']['lb_memberpointvalue'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_ls_shop_product']['lb_memberpointvalue'],
    'inputType' => 'text',
    'eval'      => array('mandatory'=>true, 'tl_class'=>'w50'),
    'sql'       => "int(10) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_ls_shop_product']['palettes']['default']=str_replace('title,','title,productgroups,',$GLOBALS['TL_DCA']['tl_ls_shop_product']['palettes']['default'] );

// Hinzuf�gen der Feld-Konfiguration
$GLOBALS['TL_DCA']['tl_ls_shop_product']['fields']['productgroups'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_ls_shop_product']['productgroups'],
    'exclude'                 => true,
    'filter'                  => true,
    'inputType'               => 'checkbox',
    'foreignKey'              => 'tl_member_group.name',
    'eval'                    => array('multiple'=>true, 'feEditable'=>true, 'feGroup'=>'login'),
    'sql'                     => "blob NULL",
    'relation'                => array('type'=>'belongsToMany', 'load'=>'lazy')
);

 