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


class PrintErrorException
{
    
    public function __construct($e) {
        
        $this->e = $e;
        echo $this->getRepport();
    }
    
    public function getRepport() {
        
        $out = '';
        $out .= '<div style="width:100%;border-top:solid 2px #ff0000;font-weight:bold;">';
        $out .= '<div style="padding:6px;background:#f1f1f1;">!! doorgets Exception !!</div>';
        $out .= '</div>';
        $out .= '<div style="width:100%;border:solid 2px #ff0000;">';
        $out .= '<div style="padding:5px;border-bottom:solid 1px #ff0000;background:#f1f1f1;">Error number : <b>'.$this->e->getCode().'</b></div>';
        $out .= '<div style="padding:5px;border-bottom:solid 1px #ff0000;background:#f1f1f1;">Message : <b>'.$this->e->getMessage().'</b></div>';
        $out .= '<div style="padding:5px;border-bottom:solid 1px #ff0000;">Line : <b>'.$this->e->getLine().'</b></div>';
        $out .= '<div style="padding:5px;">File : <b>'.$this->e->getFile().'</b></div>';
        $out .= '</div>';
        
        return $out;
    }
    
    
}

