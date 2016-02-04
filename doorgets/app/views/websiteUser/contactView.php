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


class contactView extends doorgetsWebsiteUserView{
    
    public function __construct(&$doorGetsWebsiteUser) {
        
        parent::__construct($doorGetsWebsiteUser);
    }
    
    public function getContent() {
        
        $out = $q = $qN = '';
        $Website = $this->Website;

        $user = ($Website->isUser)  ? $Website->_User : array() ;

        $_name = ($Website->isUser) ? ucfirst($user['first_name']).' '.ucfirst($user['last_name']) : '';
        $_phone = ($Website->isUser) ? $user['tel_fix'] : '';
        if ($Website->isUser && !empty($_phone) && !empty($user['tel_mobil'])) {
            $_phone .= '/'.$user['tel_mobil'];
        }
        $_email = ($Website->isUser) ? $user['login'] : '';

        $tplModulePage = Template::getWebsiteUserView('contact/contact',$Website->getTheme());
        ob_start(); if (is_file($tplModulePage)) { include $tplModulePage; }  $out = ob_get_clean();

        return $out;
        
    }
    
}