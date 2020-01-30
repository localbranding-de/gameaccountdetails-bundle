<?php
/**
 * Table tl_ls_shop_product
 */


//Legenden hinzuf�gen
$GLOBALS['TL_DCA']['tl_ls_shop_product']['palettes']['default']=str_replace('{lsShopPublishAndState_legend},','{gameaccount_legend},lb_productIsGameAccount;{lsShopPublishAndState_legend},',$GLOBALS['TL_DCA']['tl_ls_shop_product']['palettes']['default'] );

// Hinzuf�gen der Feld-Konfiguration
$GLOBALS['TL_DCA']['tl_ls_shop_product']['fields']['lb_productIsGameAccount'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_ls_shop_product']['lb_productIsGameAccount'],
    'inputType' => 'checkbox',
    'sql'                     => "char(1) NOT NULL default ''"
); 