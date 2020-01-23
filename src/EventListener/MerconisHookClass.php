<?php 

namespace LocalbrandingDe\ExtendedProductDetailBundle\EventListener;
class MerconisHookClass// Klassenname = Dateiname (ohne .php)
{
    public function __construct() {} // eventuell nicht nötig, probieren
    
    public function myBeforeAddToCart($arrItemInfoToAddToCart, $objProductOrVariant) {
        
        /*
        
        * Example: Add the product code to the cart item information. This
        
        * could be used in the hook "getScalePriceQuantity" to change the way
        
        * the scale price quantity is calculated. For example, all cart items
        
        * with the same product code prefix could be grouped.
        
        */
        //file_put_contents("ItemInfo",print_r($arrItemInfoToAddToCart,true));
        $prodId = $objProductOrVariant->ls_ID;

            $results  = \Database::getinstance()->prepare('SELECT lb_sellingUnit FROM tl_ls_shop_product WHERE id = ?')->execute($prodId);
            
        
            $arrItemInfoToAddToCart['quantity'] =  $results->lb_sellingUnit-1;
           
        return $arrItemInfoToAddToCart;
         
    }
    
    
    
}






?>