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

class websiteRequest extends doorgetsRequest{
    
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
            
            if (empty($form->i['title']) )
            {
                $form->e['doorgets_website_title'] = "ok";
            }
            if (empty($form->i['slogan']) )
            {
                $form->e['doorgets_website_slogan'] = "ok";
            }
            if (empty($form->i['description']) )
            {
                $form->e['doorgets_website_description'] = "ok";
            }
            if (empty($form->i['keywords']) )
            {
                $form->e['doorgets_website_keywords'] = "ok";
            }
            if (empty($form->i['copyright']) )
            {
                $form->e['doorgets_website_copyright'] = "ok";
            }
            
            if (empty($form->e)) {
                
                if ($pos <= count($StepsList)) {
                    
                    $nexPos = $pos + 1;
                    $this->doorgets->setStep($StepsList[$nexPos]);
                    
                    $fileTemp = BASE.'temp/website.php';
                    $isWebsiteInfos = serialize($form->i);
                    @file_put_contents($fileTemp,$isWebsiteInfos);
                    
                    header("Location:".$_SERVER['REQUEST_URI']); exit(); 
                    
                }
                
            }

        }
    }
    
}