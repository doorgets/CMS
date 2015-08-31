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


class SendMailNotification {
    
    public $header;

    public $from;

    public $email;

    public $subject;

    public $messageHtml;

    public $isSended = false;

    protected $doorGets = null;

    public function __construct($uriEmailNotification, $email, &$doorGets, $variables = array()) {
        
        $this->doorGets = $doorGets;

        $emailNotification = $doorGets->getEmailNotificationByUri(
            $uriEmailNotification,
            $variables
        );

        if (!empty($emailNotification)) {

            $this->email = $email;
        	$this->subject = html_entity_decode($emailNotification['subject'],ENT_QUOTES);

        	$this->messageHtml = $emailNotification['message'];
        	
        	$this->sendMailByPHPMailer();
            if ($this->isSended) {
                //die("Message sent");
            }
        }   
    }

    private function sendMailByPHPMailer() {

        $mail = PHPMailerService::init($this->doorGets);
        
        $mail->addAddress($this->email);  

        $mail->WordWrap = 50;
        $mail->isHTML(true);

        $mail->Subject = $this->subject;
        $mail->Body    = $this->messageHtml;
        //$mail->AltBody = '';

        if($mail->send()) {
            $this->isSended = true;
        }

    }
    
}
