<?php

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorGets it's free PHP Open Source CMS PHP & MySQL
    Copyright (C) 2012 - 2015 By Mounir R'Quiba -> Crazy PHP Lover
    
/*******************************************************************************

    Website : http://www.doorgets.com
    Contact : moonair@doorgets.com
    
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

class adminRequest extends doorgetsRequest{
    
    public function __construct(&$doorgets) {
        
        parent::__construct($doorgets);
        
    }
    
    public function indexAction() {
        
        $actionName = $this->doorgets->getStep();
        
        $form = $this->doorgets->form['doorgets_'.$actionName]  = new Formulaire('doorgets_'.$actionName);
        
        if (!empty($form->i) && empty($form->e) )
        {
            
            $StepsList = $this->doorgets->getStepsList();
            $iPos = 1; $pos = array_keys($StepsList,$actionName);
            
            if (!empty($pos)) { $pos = (int)$pos[0]; }
            
            // if (empty($form->i['login']) )
            // {
            //     $form->e['doorgets_admin_login'] = "ok";
            // }
            
            if (empty($form->i['password']) )
            {
                $form->e['doorgets_admin_password'] = "ok";
            }
            
            $var = $form->i['email'];
            $isEmail = filter_var($var, FILTER_VALIDATE_EMAIL);
            if (empty($isEmail)) {
                
                $form->e['doorgets_admin_email'] = 'ok';
                
            }
            
            if (empty($form->e)) {
                
                if ($pos <= count($StepsList)) {
                    
                    $nexPos = $pos + 1;
                    $this->doorgets->setStep($StepsList[$nexPos]);
                    
                    $fileTemp = BASE.'temp/admin.php';
                    $isAdminInfos = serialize($form->i);
                    @file_put_contents($fileTemp,$isAdminInfos);
                    
                    header("Location:".$_SERVER['REQUEST_URI']); exit();
                    
                }
                
            }
        }
    }
    
}