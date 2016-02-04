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
        <img src="[{!BASE_IMG!}]doorgets.png">
    </div>
    <div class="doorGets-title-content">
        3/5 - [{!$doorgets->l("Connecter votre base de données")!}]
    </div>
    [{?(!empty($doorgets->form['doorgets_database']->i)):}]
    <div id="info-no-ok" class="info-no-ok">
        [{!$doorgets->l("La connexion n'est pas établie !")!}]
    </div>
    [?]
    <div id="show-after-click" style="display: none;text-align: center;">
        <img src="[{!BASE_IMG!}]loader.gif" style="margin: 10px;" ><br /><br /> 
        [{!$doorgets->l("Installation en cours")!}]... 
    </div>
    <div id="hide-after-click">
    [{!$doorgets->form['doorgets_database']->open('post','','')!}]
        <div class="separateur-tb"></div>
        [{!$doorgets->form['doorgets_database']->input($doorgets->l('Hôte'),'hote','text',$this->info['hote'])!}]
        <div class="separateur-tb"></div>
        [{!$doorgets->form['doorgets_database']->input($doorgets->l('Nom de la base'),'name','text',$this->info['name'])!}]
        <div class="separateur-tb"></div>
        [{!$doorgets->form['doorgets_database']->input($doorgets->l('Login'),'login','text',$this->info['login'])!}]
        <div class="separateur-tb"></div>
        [{!$doorgets->form['doorgets_database']->input($doorgets->l('Mot de passe'),'password','text')!}]
        <div class="separateur-tb"></div>
        [{!$doorgets->form['doorgets_database']->submit($doorgets->l('Etape suivante'),'','submit-next')!}]
    [{!$doorgets->form['doorgets_database']->close()!}]
    [{!$doorgets->getHtmlGoBack()!}]
    </div>
</div>
<script type="text/javascript">
    document.getElementById('doorgets_database_submit').addEventListener('click',function(e){
        document.getElementById('doorgets_database_submit').style.display = 'none';
        document.getElementById('doorgets_goback_submit').style.display = 'none';
        document.getElementById('show-after-click').style.display = 'block';
        document.getElementById('hide-after-click').style.display = 'none';
        if(document.getElementById('info-no-ok') !== null) {
            document.getElementById('info-no-ok').style.display = 'none';
        }
    });
</script>