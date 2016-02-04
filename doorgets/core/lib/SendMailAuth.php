<?php

/*******************************************************************************
/*******************************************************************************
    doorgets 5.0 #!#!#
    doorgets it's free PHP Open Source CMS PHP & MySQL
    Copyright (C) 2012 - 2013 By Mounir R'Quiba -> Crazy PHP Lover
    
/*******************************************************************************

    Website : http://www.doorgets.com
    Contact : http://www.doorgets.com/t/en/?contact
    
/*******************************************************************************
    -= One life, One code =-
/*******************************************************************************
    
    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
    
******************************************************************************
******************************************************************************/


class SendMailAuth {
    
    public $header;

    public $from;

    public $email;

    public $Subject;

    public $messageHtml;

    public $isSended = false;

    protected $doorGets = null;

    public function __construct($email,$type,$url, &$doorGets) {
        
        $this->doorGets = $doorGets;

        $this->email = $email;
        $this->Subject = $this->getSubject($type);
        
        $this->messageHtml .= $this->getContentHtml($type,$url);
        $this->messageTxt = $this->getContentTxt($type,$url);

        $this->sendMailByPHPMailer();
        if ($this->isSended) {
            //die("Message sent");
        }

    }

    private function sendMailByPHPMailer() {

        $mail = PHPMailerService::init($this->doorGets);
        
        $mail->addAddress($this->email);  

        $mail->WordWrap = 50;
        $mail->isHTML(true);

        $mail->Subject = $this->Subject;
        $mail->Body    = Template::get('mail/wrapper',array(
            'title' => $this->Subject,
            'message' => $this->messageHtml,
            'doorGets' => $this->doorGets
        ));
        
        //$mail->AltBody = $this->messageTxt;
        //$mail->addAttachment(BASE_IMG.'logo_mail.png','logo_mail.png');

        if($mail->send()) {
            $this->isSended = true;
        }

    }

    private function getSubject($type) {
        
        $out = 'Info';
        
        switch($type) {
            
            case 'subscribe':
                $out = $this->doorGets->__("Activer votre compte");
                break;
            
            case 'forget':
                $out = $this->doorGets->__("Mot de passe oublié");
                break;

            case 'support':
                $out = $this->doorGets->__("Support");
                break;
        
            case 'new_email':
                $out = $this->doorGets->__("Confirmer votre adresse email");
                break;
            
        }
        
        return $out;
    }
    
    private function getContentHtml($type,$url) {
        
        $out = 'Info';
        
        $msgHtmlSubscribe    = $this->doorGets->__("Salut").',<br /><br />';
        $msgHtmlSubscribe   .= $this->doorGets->__("Veuillez cliquer sur le lien suivant pour confirmer votre inscription")." : <br /><br />";
        $msgHtmlSubscribe   .= "<a href=\"$url\">$url</a>";
        
        
        $msgHtmlForget       = $this->doorGets->__("Salut").',<br /><br />';
        $msgHtmlForget      .= $this->doorGets->__("Veuillez cliquer sur le lien suivant pour redéfinir votre mot de passe")." : <br /><br />";
        $msgHtmlForget      .= "<a href=\"$url\">$url</a>";
    
        $msgHtmlNewemail     = $this->doorGets->__("Salut").',<br /><br />';
        $msgHtmlNewemail    .= $this->doorGets->__("Voici votre code pour changer votre adresse email ")." : <br /><br />";
        $msgHtmlNewemail    .= "<a href=\"$url\">$url</a>";

        $msgHtmlSupport     = $this->doorGets->__("Salut").',<br /><br />';
        $msgHtmlSupport    .= $this->doorGets->__("Une réponse du support est en ligne")." : <br /><br />";
        $msgHtmlSupport    .= '<a href="'.URL.'dg-user/">'.URL.'dg-user/</a>';
        
        switch($type) {
            
            case 'subscribe':
                $out = $msgHtmlSubscribe;
                break;
            
            case 'forget':
                $out = $msgHtmlForget;
                break;

            case 'support':
                $out = $msgHtmlSupport;
                break;
        
            case 'new_email':
                $out = $msgHtmlNewemail;
                break;
            
        }
        
        return $out;
    }
    
    private function getContentTxt($type,$url) {
        
        $out = 'Info';
        
        $msgTxtSubscribe    = $this->doorGets->__("Salut").','."\r\n";
        $msgTxtSubscribe   .= $this->doorGets->__("Veuillez cliquer sur le lien suivant pour confirmer votre inscription")." : "."\r\n\r\n";
        $msgTxtSubscribe   .= $url."\r\n";
        
        
        $msgTxtForget       = $this->doorGets->__("Salut").','."\r\n";
        $msgTxtForget      .= $this->doorGets->__("Veuillez cliquer sur le lien suivant pour redéfinir votre mot de passe")." : "."\r\n\r\n";
        $msgTxtForget      .= $url."\r\n";
    
        $msgTxtForget       = $this->doorGets->__("Salut").','."\r\n";
        $msgTxtForget      .= $this->doorGets->__("Veuillez cliquer sur le lien suivant pour redéfinir votre mot de passe")." : "."\r\n\r\n";
        $msgTxtForget      .= $url."\r\n";
    
        $msgTxtNewemail     = $this->doorGets->__("Salut").','."\r\n";
        $msgTxtNewemail    .= $this->doorGets->__("Voici votre code pour changer votre adresse email")." : $url "."\r\n\r\n";
        
        $msgTxtSupport     = $this->doorGets->__("Salut").','."\r\n";
        $msgTxtSupport    .= $this->doorGets->__("Une réponse du support est en ligne")." : ";
        $msgTxtSupport    .= '<a href="'.URL.'dg-user/">'.URL.'dg-user/</a>';
        $msgTxtSupport    .= "\r\n\r\n";
        
        switch($type) {
            
            case 'subscribe':
                $out = $msgTxtSubscribe;
                break;
            
            case 'forget':
                $out = $msgTxtForget;
                break;
        
            case 'support':
                $out = $msgTxtSupport;
                break;

            case 'new_email':
                $out = $msgTxtNewemail;
                break;
            
        }
        
        return $out;
    }
    
}