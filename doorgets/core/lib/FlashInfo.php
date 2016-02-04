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


class FlashInfo{
    
    static function set( $message="Mise à jour ok",$type="success") {
        
        $_SESSION['flashInfo']['message'] = $message;
        $_SESSION['flashInfo']['type'] = $type;
        
    }
    
    static function get() {
        
        $out = '';
        
        if (isset($_SESSION['flashInfo']) && $_SESSION['flashInfo']['message'] && $_SESSION['flashInfo']['type']) {
            
            $out .= '<div id="flash"  ><div class=" text-center" style="padding:8px;" ';
            switch($_SESSION['flashInfo']['type']) {
                case 'success':
                    $out .= ' id="flashOk" > ';
                    break;
                case 'error':
                    $out .= ' id="flashNoOk" > ';
                    break;
                case 'info':
                    $out .= ' id="flashInfo" > ';
                    break;
            }
            $out .= '<b class="glyphicon glyphicon-warning-sign"></b> ';
            $out .= $_SESSION['flashInfo']['message'];
            $out .= ' <span id="closeFlash" style="cursor:pointer;float:right;" ><b class="glyphicon glyphicon-remove"></b></span></div></div>';
            
            unset( $_SESSION['flashInfo'] );
            
        }
        
        return $out;
        
    }
    
}