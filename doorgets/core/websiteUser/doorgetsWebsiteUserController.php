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


class doorgetsWebsiteUserController {
    
    public $Website;
    
    public function __construct(&$doorGetsWebsiteUser) {
        
        if (!is_object($doorGetsWebsiteUser)) { return null; }
        $this->Website = $doorGetsWebsiteUser;
        $this->setContent();
        $this->getRequest();
        $this->getView();
        
    }
    
    public function setContent() {
        
    }
    
    public function getRequest() {
        
        $type = $this->Website->getType();

        if (empty($type)) { return null; }

        $controller = $this->Website->getController();
        if (empty($controller)) { return null; }

        $nameRequest = $controller.'Request';
        $fileNameRequest = REQUESTS.'websiteUser/'.$nameRequest.'.php';
        
        if (!is_file($fileNameRequest))
        { echo 'Request not found : ' . $fileNameRequest; exit();  }
        require_once $fileNameRequest;
        
        if (!class_exists ($nameRequest))
        { echo 'Class  not found : ' . $nameRequest.' : '; exit(); }
        
        return new $nameRequest($this->Website);
        
    }
    
    public function getView() {
        
        $type = $this->Website->getType();
        if (empty($type)) { return null; }
        
        $controller = $this->Website->getController();
        if (empty($controller)) { return null; }

        $nameView = $controller.'View';
        $fileNameView = VIEWS.'websiteUser/'.$nameView.'.php';
        
        if (!is_file($fileNameView))
        { echo 'View not found : ' . $fileNameView; exit();  }
        require_once $fileNameView;
        
        if (!class_exists ($nameView))
        { echo 'Class  not found : ' . $nameView.' : '; exit(); }

        $view = new $nameView($this->Website);
        $this->Website->setContentView($view->getContent());
    
    }
    
}
