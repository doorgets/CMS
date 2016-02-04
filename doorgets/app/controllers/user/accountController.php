<?php

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorGets it's free PHP Open Source CMS PHP & MySQL
    Copyright (C) 2012 - 2013 By Mounir R'Quiba -> Crazy PHP Lover
    
/*******************************************************************************

    Website : http://www.doorgets.com
    Contact : http://www.doorgets.com/t/en/?contact
    
/*******************************************************************************
    -= One life for One code =-
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


class AccountController extends doorGetsUserController {
    
    
    public function __construct(&$doorGets) {
        
        $this->doorGets = $doorGets;
        parent::__construct($doorGets);
        
        if (empty($doorGets->user)) {

            header('Location:./?controller=authentification&error-login=true&back='.urlencode($_SERVER['REQUEST_URI'])); exit();
        }

    }
    
    public function indexAction()
    {
        
        $this->doorGets->Form = new Formulaire('account_index');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
        
    }
    
    public function notificationsAction()
    {
        $this->doorGets->Form = new Formulaire('account_notifications');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
        
    }
    
    public function passwordAction()
    {
        $this->doorGets->Form = new Formulaire('account_password');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
        
    }

    public function closeAction()
    {
        $this->doorGets->Form = new Formulaire('account_close');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
        
    }

    public function apiAction()
    {
        $this->doorGets->Form = new Formulaire('account_api');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
        
    }

    public function oauthAction()
    {
        $this->doorGets->Form['google'] = new Formulaire('account_oauth_google');
        $this->doorGets->Form['facebook'] = new Formulaire('account_oauth_facebook');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
        
    }
    
    public function emailAction()
    {
        $this->doorGets->Form['email'] = new Formulaire('account_email');
        $this->doorGets->Form['email_confirmation'] = new Formulaire('account_email_confirmation');
        $this->doorGets->Form['email_confirmation_delete'] = new Formulaire('account_email_confirmation_delete');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
        
    }
    
}
