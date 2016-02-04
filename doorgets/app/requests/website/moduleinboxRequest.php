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


class moduleInboxRequest extends doorgetsWebsiteRequest{
    
    public $isSend;
    
    public function __construct(&$doorGetsWebsite) {
        
        $doorGetsWebsite->form['contact_inbox'] = new Formulaire('contact_inbox');
        parent::__construct($doorGetsWebsite);
        $this->doAction();
    }
    
    public function doAction() {
        
        $out = '';
        
        $idForm = uniqid();

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

            if (empty($this->Website->form['contact_inbox']->i['nom'])) {
                
                $this->Website->form['contact_inbox']->e['contact_inbox_nom'] = "ok";
            }

            if (empty($this->Website->form['contact_inbox']->i['sujet'])) {
                
                $this->Website->form['contact_inbox']->e['contact_inbox_sujet'] = "ok";
            }

            if (empty($this->Website->form['contact_inbox']->i['message'])) {
                
                $this->Website->form['contact_inbox']->e['contact_inbox_message'] = "ok";
            }
            
            if (empty($this->Website->form['contact_inbox']->e)) {
                
                $_SESSION['idForm']     = $idForm;
                $data['uri_module']     = $this->Website->getModule();
                $data['lu']             = 2;
                $data['sujet']          = $this->Website->form['contact_inbox']->i['sujet'];
                $data['nom']            = $this->Website->form['contact_inbox']->i['nom'];
                $data['email']          = $this->Website->form['contact_inbox']->i['email'];
                $data['message']        = $this->Website->form['contact_inbox']->i['message'];
                $data['telephone']      = $this->Website->form['contact_inbox']->i['telephone'];
                $data['date_creation']  = time();
                
                $idContactez = $this->Website->dbQI($data,'_dg_inbox');
                $this->Website->form['contact_inbox']->isSended = true;
                
                // Mail Sender Notification
                $moduleInfo = $this->Website->dbQS($this->Website->getModule(),'_modules','uri');
                if (!empty($moduleInfo) && !empty($moduleInfo['notification_mail'])) {
                    
                    $_email     = $this->Website->configWeb['email'];
                    $_lg        = $this->Website->configWeb['langue'];
                    $_sujet     = '['.$this->Website->getModule().'] '.$this->Website->l("Vous avez reçu un nouveau message").' - '.$idContactez;
                    $_message   = "<br /> \n\r <br /> \n\r <b>".$data['sujet']."</b><br /> \n\r <br /> \n\r ".$data['message']."<br /> \n\r <br /> \n\r <b>".$data['email'].' - '.$data['telephone'].'</b>';
                    
                    new SendMailAlert($_email,$_sujet,$_message,$this->Website);
                }   
            }   
        }   
    }    
}
