<?php
namespace LocalbrandingDe\ExtendedProductDetailBundle\EventListener;
use Contao\FrontendUser;
class FrontendTemplateListener// Klassenname = Dateiname (ohne .php)
{
    public function __construct() {} // eventuell nicht nötig, probieren
   
    public function myCustomClassMethod($intId, $arrData) // Methodenname so wie in config angegeben, Parameterdefinitionen aus dem Entwicklerhandbuch entnehmen
    {
        print_r($intId);     // Print the ID of the new User
        print_r($arrData); // Print out the user's data, which should include the fields you need.
        file_put_contents("test43","ysdas");
    }
    public function myOutputFrontendTemplate($strContent, $strTemplate)
    {
        if ($strTemplate == 'fe_page')
        {
            if(strpos($strContent,'id="variable"')!== false)
            {
                $start=strpos($strContent,'variant-selector');
                $substr=substr($strContent,$start,2000);
                file_put_contents("Frontendtest2",$substr);
                $end=strpos($substr,'<!-- indexer::continue -->');
                $priceBoxHtml=substr($strContent,$start,$end);
                
                $strContent=str_replace("replaceAnchor","replaceAnchor2313123",$strContent);
               // $strContent=str_replace($priceBoxHtml,"",$strContent);
                //$strContent=str_replace('<div id="replaceAnchor"></div>',$priceBoxHtml,$strContent);
                //$strContent=substr_replace($strContent,$priceBoxHtml,strrpos(substr($strContent,0,strpos($strContent,'id="ajax-reload-by-put')),"<div"),0);
                //$strContent=str_replace('<div class="lsfwk-fullwidth variant-selector"',$priceBoxHtml.'<div class="lsfwk-fullwidth variant-selector"',$strContent);
                $strContent=substr_replace($strContent,$priceBoxHtml,strrpos(substr($strContent,0,strpos($strContent,'col-left')),"<div"),0);
                
                file_put_contents("Frontendtest1", strrpos(substr($strContent,0,strpos($strContent,'replaceAnchor')),"<div"));
               
                file_put_contents("Frontendtest",substr($strContent,strrpos(substr($strContent,0,strpos($strContent,'replaceAnchor')),"<div"),400));
            }
            
           
            
        }
         
        return $strContent;
    }
    
    public function myParseFrontendTemplate($objTemplate)
    {
        
        
        if ($objTemplate->getName() == 'template_productIncludes_price_01' )
        {
            
            $table="tl_ls_shop_product";
            if($objTemplate->objProduct->ls_currentVariantID !=0)
            {
                
                $prodId = $objTemplate->objProduct->ls_currentVariantID;
                $table = "tl_ls_shop_variant";
                
            }
            else
            {
                
                $prodId = $objTemplate->objProduct->ls_ID;
            }
            $results  = \Database::getinstance()->prepare('SELECT lb_priceComment FROM '.$table.' WHERE id = ?')->execute($prodId);
            $objTemplate->objProduct->lb_priceComment = $results->lb_priceComment;

        }
    
    
        if ($objTemplate->getName() == 'template_productDetails_02_leistung' OR $objTemplate->getName() == 'template_productDetails_01')
        {
            $c=file_get_contents("../files/theme_lb_demoshop/css/lb-modules.css");
            if(file_put_contents("../files/test43fess.css",$c) !== false)
            {
                file_put_contents("error","error");
                
            }
            
            //file_put_contents("test43fess",print_r( $objTemplate->objProduct,True));
            //
            //file_put_contents("test43fess",ampersand(\Environment::get('request')));
            $objUser = FrontendUser::getInstance();
            $table="tl_ls_shop_product";
            if($objTemplate->objProduct->ls_currentVariantID !=0)
            {
                
                $prodId = $objTemplate->objProduct->ls_currentVariantID;
                $table = "tl_ls_shop_variant";
                
            }
            else
            {
                
                $prodId = $objTemplate->objProduct->ls_ID;
            }
            file_put_contents("id",$objTemplate->objProduct->ls_currentVariantID);
            $buyButton = '<div id="variable" class="pre-select quantityInput lsfwk-alignCenter lsfwk-mgt-l">
            <form action="" method="post" enctype="application/x-www-form-urlencoded">
            <div>
            <input type="hidden" name="REQUEST_TOKEN" value="{{request_token}}">
            <input type="hidden" name="FORM_SUBMIT" value="product_form_">
            <input type="hidden" name="productVariantID" value="">
            <div class="inputQuantity">
            <div class="quantityWrapper lsfwk-sameLine"><div class="flexWidget flexWidget_default">
            
            <label for="quantity_">Menge</label>
            <input name="quantity_" id="quantity_" type="number" min="1" value="1">
            
            </div></div>
            <button type="submit" class="submit lsfwk-submit lsfwk-sameLine" disabled><i class="lsfwk-txs-l-all lsfwk-txc-inverted-all lsfwk-fi lsfwk-fi-cart lsfwk-mgr-10"></i>In den Warenkorbs</button>
            </div>
            </div>
            </form>
            </div>';
            $objTemplate->objProduct->buyButtonDisabled=$buyButton;
            $results  = \Database::getinstance()->prepare('SELECT lb_inPriceHeader1,lb_inPriceText1,lb_inPriceHeader2,lb_inPriceText2,lb_inPriceHeader3,lb_inPriceText3,lb_productTab1,lb_productTab1_text,lb_productTab1_accordList,lb_productTab2,lb_productTab2_text,lb_productTab2_accordList,lb_productTab3,lb_productTab3_text,lb_productTab3_accordList,lb_priceComment,lb_sellingUnit FROM '.$table.' WHERE id = ?')->execute($prodId);
            $accordeons= array();
            $accordeons1=unserialize($results->lb_productTab1_accordList);
            $accordeons2=unserialize($results->lb_productTab2_accordList);
            $accordeons3=unserialize($results->lb_productTab3_accordList);
            $objTemplate->lb_inPriceHeader1 = $results->lb_inPriceHeader1;
            $objTemplate->lb_inPriceHeader2 = $results->lb_inPriceHeader2;
            $objTemplate->lb_inPriceHeader3 = $results->lb_inPriceHeader3;
            $objTemplate->lb_inPriceText1 = $results->lb_inPriceText1;
            $objTemplate->lb_inPriceText2 = $results->lb_inPriceText2;
            $objTemplate->lb_inPriceText3 = $results->lb_inPriceText3;
            $objTemplate->lb_productTab1 = $results->lb_productTab1;
            $objTemplate->lb_productTab2 = $results->lb_productTab2;
            $objTemplate->lb_productTab3 = $results->lb_productTab3;
            $objTemplate->lb_productTab1_text = $results->lb_productTab1_text;
            $objTemplate->lb_productTab2_text = $results->lb_productTab2_text;
            $objTemplate->lb_productTab3_text = $results->lb_productTab3_text;
            $objTemplate->lb_priceComment = $results->lb_priceComment;
            $objTemplate->objProduct->lb_priceCommentMoin=$results->lb_priceComment;
            $objTemplate->lb_sellingUnit = $results->lb_sellingUnit;
            $objTemplate->objProduct->lb_priceComment = $results->lb_priceComment;
            $accordeons[]=$accordeons1;
            $accordeons[]=$accordeons2;
            $accordeons[]=$accordeons3;
            $holder=1;
            foreach($accordeons as $accordeonlist)
            {
                 $accords = array();
                 $counter=0;
                foreach($accordeonlist as $accordeon)
                {
                    
                    $title =$accordeon['lb_productTab'.$holder.'_accordHeader'];
                    $content = $accordeon['lb_productTab'.$holder.'_accordContent'];
                    if($title =="" OR $content=="")
                    {
                        continue;
                    }
                    $accords[]='<!-- Accordion -->
			<section data-lsjs-component="elementFolder" data-lsjs-elementFolderOptions="
                        {
                           str_initialCookieStatus: \'closed\'
                        }
                        " id="description-tab-'.$holder.'_'.$counter.'_'.$objTemplate->objProduct->_id.'" class="lsfwk-mgb-10">
				<div data-lsjs-element="elementFolderToggler" class="lsfwk-mgb-5 lsfwk-bdb lsfwk-pointer product-accordion-header">
					<span class="lsfwk-txs-m-all"><h4>'.$title.'</h4></span>
				</div>
				<div data-lsjs-element="elementFolderContent" class="product-accordion-content">
					<p>'.$content.'</p>
				</div>
			</section>';
                    
                    $counter++;
                   
                    
                    
                }
                $atrName="accordsTab".$holder;
                $objTemplate->{$atrName}=$accords;
                $holder=$holder+1;
                
                
                
            }
            
            
            
            if (FE_USER_LOGGED_IN === true) {
                
                foreach($groups as $group)
                {
                }

                //$user_name = $this->User->username; 
                // es gibt einen authentifizierten Frontend-Benutzer
            } else {

                // es gibt keinen authentifizierten Frontend-Benutzer
               
            }
           


           // file_put_contents("username",  $userfn);
        }
    }

}  

?>
