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

class chmodView extends doorgetsView{
    
    public function __construct(&$doorgets) {
        parent::__construct($doorgets);
    }
    
    public function isChmod777() {
        
        try{

            $file = 'setup/temp/data.txt';
            $fileRoot = 'data.txt';
            if (!(is_file($file))) {
                file_put_contents($file,'data');
            }

            if (!(is_file($fileRoot))) {
                file_put_contents($fileRoot,'data');
            }

            $folder = getcwd();
            if (@is_writable($folder) && file_exists($file) && file_exists($fileRoot)) {
                return true;
            }
            
            return false;
            
        }catch(Exception $e) {  }
        
    }  
}