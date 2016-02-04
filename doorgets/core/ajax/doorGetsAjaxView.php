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


class doorGetsAjaxView{

    public $doorGets = null;
    
    public function __construct(&$doorGets) {

        $this->doorGets         = $doorGets;
        $this->Action           = $doorGets->Action();

        $this->user             = $doorGets->user;
        $this->Controller       = $doorGets->Controller();
        
        $doorGets->setView($this);

        $this->doorGets = $doorGets;
        
    }
    
    
    public function getResponse() {
        
        $response = array(
            'code' => 404,
            'data' => array()
        );

        $arrayAction = array(
            
            'index'         => $this->doorGets->__('Home'),
            
        );
        
        if (array_key_exists($this->Action,$arrayAction) )
        {
            switch($this->Action) {
            
                case 'index':
                    
                    break;

            }
        }

        return json_encode($response);;
    }
}
