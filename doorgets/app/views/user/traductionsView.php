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


class TraductionsView extends doorGetsUserView{
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);
        
    }
    
    public function getContent() {
        
        $out = '';
        $User               = $this->doorGets->user;
        $lgActuel           = $this->doorGets->getLangueTradution();
        $isVersionActive    = false;
        $version_id         = 0;
        
        // Check if is content modo
        (in_array('traduction', $User['liste_module_interne'])) ? $is_modo = true : $is_modo = false;

        // Check if is module modo
        (
            in_array('traduction', $User['liste_module_interne'])  
            && in_array('traduction_modo',  $User['liste_module_interne'])

        ) ? $is_modules_modo = true : $is_modules_modo = false;
        
        $Rubriques = array(
            
            'index'         => $this->doorGets->__('Traductions'),
            
        );
        
        $fileTempTraductions = LANGUE.'temp.lg.php';
        if (!is_file($fileTempTraductions)) { return $fileTempTraductions.' not found.'; }
            
        include $fileTempTraductions;
        $cFields = count($wTranslate);
        
        $_toLanguage  = $this->doorGets->getLangueTradutionForTraduction();
        $allLanguages = $this->doorGets->getAllLanguages();
        
        $fileToTraductions = LANGUE.$_toLanguage.'.lg.php';
        
        include $fileToTraductions;
        $cFieldsTo = count($_w);
        
        if (array_key_exists($this->Action,$Rubriques) )
        {
            switch($this->Action) {
                
                case 'index':
                    
                    // to do
                    
                    break;
                
            }
            
            $ActionFile = 'user/traductions/user_traductions_'.$this->Action;
            
            $tpl = Template::getView($ActionFile);
            ob_start();
            if (is_file($tpl)) { include $tpl; }
            
            $out .= ob_get_clean();
            
        }
        
        return $out;
        
    }
    
}
