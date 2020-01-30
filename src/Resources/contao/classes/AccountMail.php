<?php 

namespace LocalbrandingDe\ExtendedProductDetailBundle\Classes;
use Contao\Email;

class AccountMail  // Klassenname = Dateiname (ohne .php)
{

    
    protected function compile() {
        
        

    } 
    public function AccountMail($orderID, $order) {
        $email=new Email();
        $email->from                = 'shop@localbranding.de';
        $email->fromName            = 'Test Absender';
        $email->subject                = 'Test-Nachricht';
        $email->text                 = 'Lorem ipsum...... usw.';
        $email->sendTo('mh@localbranding.de');
    }

           

    
    
    
}






?>