<?php

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
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


class contactRequest extends doorgetsWebsiteUserRequest{
    
    public $isSend;
    
    public function __construct(&$doorGetsWebsiteUser) {
        
        $doorGetsWebsiteUser->form['contact_inbox'] = new Formulaire('contact_inbox');
        parent::__construct($doorGetsWebsiteUser);
        $this->doAction();
    }
    
    public function doAction() {
        
        $out = '';
        $idForm = uniqid();
        $user = array();
        $profile = $this->Website->profile;

        if ($this->Website->isUser) {
            $user = $this->Website->_User;
        }
        
        if (!array_key_exists('idForm',$_SESSION)) {
            
            $_SESSION['idForm'] = $idForm;
        }
        
        if (
           !empty($this->Website->form['contact_inbox']->i)
           && $_SESSION['idForm'] !== $this->Website->form['contact_inbox']->i['secureFormulaire']
        ) {
            
            header("Location:".$_SERVER['REQUEST_URI']);
        }
        
        if (
           !empty($this->Website->form['contact_inbox']->i)
           && $_SESSION['idForm'] === $this->Website->form['contact_inbox']->i['secureFormulaire']
        ) {
            
            $this->Website->checkMode(false);

            $var = $this->Website->form['contact_inbox']->i['email'];
            $isEmail = filter_var($var, FILTER_VALIDATE_EMAIL);
            if (empty($isEmail)) {
                
                $this->Website->form['contact_inbox']->e['contact_inbox_email'] = 'ok';
            }

            if (empty($this->Website->form['contact_inbox']->i['name'])) {
                
                $this->Website->form['contact_inbox']->e['contact_inbox_name'] = "ok";
            }

            if (empty($this->Website->form['contact_inbox']->i['subject'])) {
                
                $this->Website->form['contact_inbox']->e['contact_inbox_subject'] = "ok";
            }

            if (empty($this->Website->form['contact_inbox']->i['message'])) {
                
                $this->Website->form['contact_inbox']->e['contact_inbox_message'] = "ok";
            }
            
            if (empty($this->Website->form['contact_inbox']->e)) {
                
                $_SESSION['idForm']     = $idForm;

                $data['id_user']        = $profile['id'];
                $data['id_user_sent']   = (!empty($user)) ? $user['id'] : 0 ;
                $data['readed']         = 2;
                $data['name']           = $this->Website->form['contact_inbox']->i['name'];
                $data['email']          = $this->Website->form['contact_inbox']->i['email'];
                $data['phone']          = $this->Website->form['contact_inbox']->i['phone'];
                $data['subject']        = $this->Website->form['contact_inbox']->i['subject'];
                $data['message']        = $this->Website->form['contact_inbox']->i['message'];
                $data['date_creation']  = time();
                
                $idContact = $this->Website->dbQI($data,'_users_inbox');
                $this->Website->form['contact_inbox']->isSended = true;

                // Mail Sender Notification
                if (!empty($this->Website->profile['notification_mail'])) {

                    $_email     = $this->Website->profile['login'];
                    $_lg        = $this->Website->profile['langue'];
                    $_subject   = $this->Website->__("Vous avez reçu un nouveau message");
                    $_message   = "<br /> \n\r <br /> \n\r <b>".$data['subject']."</b><br /> \n\r <br /> \n\r ".$data['message']."<br /> \n\r";
                    
                    new SendMailAlert($_email,$_subject,$_message,$this->Website);
                }   
            }   
        }   
    }
}
