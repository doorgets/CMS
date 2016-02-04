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


class themeView extends doorGetsUserView{
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);
        
    }
    
    public function getContent() {
        
        $out = '';
        $nameController = $this->doorGets->controllerNameNow();
        $params = $this->doorGets->Params();
        $Rubriques = array(
            
            'index'         => $this->doorGets->__('Index de la page'),
            'add'           => $this->doorGets->__('Ajouter'),
            'import'        => $this->doorGets->__('Importer'),
            'edit'          => $this->doorGets->__('Modifier'),
            'delete'        => $this->doorGets->__('Supprimer'),
            
        );
        
        $isAllTheme = $this->doorGets->getAllThemesName();
        $nameTheme  = $this->doorGets->configWeb['theme'];
        $countTheme = count($isAllTheme);
        
        if (array_key_exists($this->Action,$Rubriques) )
        {
            switch($this->Action) {
                
                case 'index':
                    
                    
                    
                    break;
                
                case 'add':
                    
                    
                    $allTheme = array();
                    if (!empty($isAllTheme)) {
                        foreach($isAllTheme as $v) {
                            $allTheme[$v] = $v;
                        }                        
                    }
                    
                    break;
                
                
                case 'edit':
                    
                    $theme = $params['GET']['name'];
                    $fileSelected = $theme.'/css/doorgets.css';

                    if (array_key_exists('file',$params['GET'])) {
                        
                        $fileSelected = $params['GET']['file'];
                    }

                    $themeListe = $this->doorGets->listThemeFiles($theme);
                    
                    $fileContent = '';
                    if (array_key_exists($fileSelected,$themeListe['js'])) {
                
                        $fileContent = file_get_contents(THEME.$fileSelected);

                    } elseif (array_key_exists($fileSelected,$themeListe['css'])) {
                        
                        $fileContent = file_get_contents(THEME.$fileSelected);

                    } elseif (array_key_exists($fileSelected,$themeListe['tpl'])) {
                        
                        $fileContent = file_get_contents(THEME.$fileSelected);
                    }
                    
                    break;
                
                case 'delete':
                    
                    $theme = $params['GET']['name'];
                    break;
            }

            $ActionFile = 'user/'.$nameController.'/user_'.$nameController.'_'.$this->Action;
            
            $tpl = Template::getView($ActionFile);
            ob_start(); if (is_file($tpl)) { include $tpl; } $out .= ob_get_clean();
            
        }
        
        return $out;
        
    }
    
}