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

class doorgetsController{
    
    public $model;
    
    public $view;
    
    public $doorgets;
    
    public function __construct(&$doorgets) {
        
        $this->doorgets = $doorgets;
        
        $this->getModel();
        $this->getView();
        
        $fileTempAdmin = BASE.'temp/admin.php';
        $fileTempDatabase = BASE.'temp/database.php';
        $fileTempWebsite = BASE.'temp/website.php';
        
        if (    
            array_key_exists('doorgetsStep',$_SESSION) 
            && $_SESSION['doorgetsStep'] === 'polymorphic' 
            && !is_file($fileTempAdmin) && !is_file($fileTempDatabase) && !is_file($fileTempWebsite)
        ) {
            
            $_SESSION = array();
            header("Location:".$_SERVER['REQUEST_URI']); exit();
        }
    }
    
    // return the model of te current controller
    public function getModel()
    {
        
        $nameModel = $this->doorgets->getStep().'Request';
        $fileNameModel = REQUESTS.'/'.$nameModel.'.php';
        
        if (!is_file($fileNameModel)) return null;
        require_once $fileNameModel;
        
        if (!class_exists ($nameModel)) return null;
        $this->model = new $nameModel($this->doorgets);
        
        
    }
    
    // return the view of the current controller
    public function getView()
    {
        
        $nameView = $this->doorgets->getStep().'View';
        $fileNameView = VIEWS.'/'.$nameView.'.php';
        
        if (!is_file($fileNameView)) return null;
        require_once $fileNameView;
        
        if (!class_exists ($nameView)) return null;
        $this->view = new $nameView($this->doorgets);
        
    }
    
}
