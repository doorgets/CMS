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


class ChangelangueRequest extends doorGetsUserRequest{
    
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);
        
    }
    
    public function doAction() {
        
        $out = '';
        $allLanguages = $this->doorGets->allLanguagesSession;
        
        switch($this->Action) {
            
            case 'index':
                
                $params = $this->doorGets->Params();
                if (array_key_exists('to_langue',$params['GET'])) {
                    
                    if (array_key_exists( $params['GET']['to_langue'], $allLanguages )) {
                        
                        $_SESSION['doorgets_user']['langue'] = $params['GET']['to_langue'];
                        
                    }
                    
                }
                
                header("Location:./");exit();
                break;
            
            
        }
        
        return $out;
        
    }
    
}

