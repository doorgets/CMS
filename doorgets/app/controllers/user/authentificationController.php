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


class AuthentificationController extends doorGetsUserController {
    
    
    public function __construct(&$doorGets) {
        
        $this->doorGets = $doorGets;
        parent::__construct($doorGets);
    }
    
    public function indexAction()
    {
        
        // If is logged set authentification controller 
        if (!empty($this->doorGets->user))
        {
            header('Location:./');exit();
        }
            

        $this->doorGets->Form = new Formulaire('authentification');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
        
    }
    
    public function registerAction()
    {
        
        if (isset($_GET['controller'])) {
           
            if (!empty($this->doorGets->user))
            {
                header('Location:./');exit();
            }
        }
        
        $groupes = $this->doorGets->loadGroupesSubscriber();
        if (empty($groupes)) {
            header('Location:./?controller=authentification');exit();
        }

        $this->doorGets->Form['doorgets'] = new Formulaire('subscribe');
        $this->doorGets->Form['google']   = new Formulaire('subscribe_google');
        $this->doorGets->Form['facebook']   = new Formulaire('subscribe_facebook');

        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
        
    }
    
    public function forgetAction()
    {
        
        
        if (isset($_GET['controller'])) {
           
            if (!empty($this->doorGets->user))
            {
                header('Location:./');exit();
            }
        }
        
        $this->doorGets->Form = new Formulaire('forget');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
        
    }
    
    public function resetAction()
    {
        
        if (isset($_GET['controller'])) {
           
            if (!empty($this->doorGets->user))
            {
                header('Location:./');exit();
            }
        }
        
        $this->doorGets->Form = new Formulaire('reset');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
        
    }
    
    public function activationAction()
    {
        
        
        if (isset($_GET['controller'])) {
           
            if (!empty($this->doorGets->user))
            {
                header('Location:./');exit();
            }
        }
        
        $this->doorGets->Form = new Formulaire('activation');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
        
    }
    
    public function logoutAction() {
        
        $this->getRequest();
        
    }
}
