<?php if (!defined(DOORGETS)) { header('Location:../'); exit(); }

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorGets it's free PHP Open Source CMS PHP & MySQL
    Copyright (C) 2012 - 2013 By Mounir R'Quiba -> Crazy PHP Lover
    
/*******************************************************************************

    Website : http://www.doorgets.com
    Contact : http://www.doorgets.com/t/en/?contact
    
/*******************************************************************************
    -= One life for One code =-
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



    // Init $menu from Action Controller
    $menu = $this->doorGets->Action();
?>
<div class="doorGets-sub-rubrique doorGets-rubrique-left">
    <ul>
        <li class="active" ><a href="?controller=emailing"><?php echo $this->doorGets->__('Contacts'); ?></a></li>
        <li><a href="?controller=emailingcampagne"><?php echo $this->doorGets->__('Campagnes'); ?></a></li>
        <li><a href="?controller=emailinggroupe"><?php echo $this->doorGets->__('Groupes'); ?></a></li>
        <li><a href="?controller=emailingmodele"><?php echo $this->doorGets->__('Modèles'); ?></a></li>
    </ul>
</div>