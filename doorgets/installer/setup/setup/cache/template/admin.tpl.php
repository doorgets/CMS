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
?>
<div class="doorGets-content-wrapper">
    <div class="doorGets-top-title-content">
        <img src="<?php echo BASE_IMG; ?>doorgets.png">
    </div>
    <div class="doorGets-title-content">
        5/5 - <?php echo $doorgets->l("Administrateur"); ?>
    </div>
    <?php echo $doorgets->form['doorgets_admin']->open('post','',''); ?>
        <div class="separateur-tb"></div>
        <?php echo $doorgets->form['doorgets_admin']->input($doorgets->l('Adresse e-mail'),'email','text',$this->info['email']); ?>
        <div class="separateur-tb"></div>
        <?php echo $doorgets->form['doorgets_admin']->input($doorgets->l('Mot de passe'),'password','password'); ?>
        <div class="separateur-tb"></div>
        <?php echo $doorgets->form['doorgets_admin']->submit($doorgets->l('Etape suivante'),'','submit-next');  echo $doorgets->form['doorgets_admin']->close();  echo $doorgets->getHtmlGoBack(); ?>
</div>