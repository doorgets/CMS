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


class ModuleOnepageController extends doorgetsWebsiteController{
    
    public function __construct(&$WebsiteObect) {
        
        parent::__construct($WebsiteObect);
        $this->setContent();
    }
    
    public function setContent() {
        
        
        $module  = $this->Website->getModule();
        
        $isContent = $this->Website->dbQS($module,'_dg_onepage','uri');
        if (!empty($isContent)) {
            
            $lgTraductionIds = @unserialize($isContent['groupe_traduction']);
            $idTraduction = $lgTraductionIds[$this->Website->myLanguage()];
            
            $isContentTraduction = $this->Website->dbQS($idTraduction,'_dg_onepage_traduction');
            if (!empty($isContentTraduction)) {
                
                $this->Website->setContent($isContent + $isContentTraduction);
                
            }
            
        }
        
    }
    
    
}