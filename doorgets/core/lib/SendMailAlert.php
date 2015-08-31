<?php

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 31, August 2015
    doorgets it's free PHP Open Source CMS PHP & MySQL
    Copyright (C) 2012 - 2015 By Mounir R'Quiba -> Crazy PHP Lover
    
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


class SendMailAlert {
    
    public $header;

    public $from;

    public $email;

    public $Subject;

    public $messageHtml;

    public $isSended = false;

    protected $doorGets = null;

    public function __construct($email,$subject,$content, &$doorGets) {

        $this->doorGets = $doorGets;

        $this->email = $email;
        $this->Subject = $subject;
        
        $this->messageHtml = $this->getContentHtml($content);

        $this->sendMailByPHPMailer();
        if ($this->isSended) {
            
        }

    }

    private function sendMailByPHPMailer() {

        $mail = PHPMailerService::init($this->doorGets);
        
        $mail->addAddress($this->email);  

        $mail->WordWrap = 50;
        $mail->isHTML(true);

        $mail->Subject = $this->Subject;
        $mail->Body    = $this->messageHtml;
        //$mail->AltBody = $this->messageTxt;

        if($mail->send()) {
            $this->isSended = true;
        }

    }

    private function getContentHtml($content) {
        
        $msHtml = '<br /><br /><b>'.$this->doorGets->__('Connexion').' :</b> <br />';
        $msHtml .= '<ul><li><a href="'.URL.'dg-admin/">'.URL.'dg-admin/</a></li></ul>';
        
        if (!empty($content)) {
            $msHtml .= '<br />------------------------------------';
        
            if (!empty($content)) {
                $msHtml .= $content;
                $msHtml .= '<br /> <br />------------------------------------';
                $msHtml .= '----------------------------------------------------------------------<br /><br />';
            }            
        }

        return $msHtml;
    }
    
}
