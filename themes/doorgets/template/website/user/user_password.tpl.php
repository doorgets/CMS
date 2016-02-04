<?php if (!defined(DOORGETS)) { header('Location:../'); exit(); }

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorGets it's free PHP Open Source CMS PHP & MySQL
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


?>
<!-- doorGets:start:user/user_password -->
<div class="password-user row">
    <div class="col-md-6 col-md-offset-3">
        <h4>
            <b class="glyphicon glyphicon-lock"></b>
            [{!$this->Website->__('Cette page est sécurisée par un mot de passe')!}]
        </h4>
        <div class="alert alert-danger ">
            [{!$formPassword->open('post','')!}]
            [{!$formPassword->inputAddon($this->Website->__('Mot de passe'),'password');}]
             
        </div>
        <div class="text-center">
            [{!$formPassword->submit($this->Website->__('Vérifier le mot de passe'));}]
        </div>
        [{!$formPassword->close()!}] 
    </div>

</div>
<!-- doorGets:end:user/user_password -->
