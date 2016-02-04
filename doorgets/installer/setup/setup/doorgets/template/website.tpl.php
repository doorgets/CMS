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

$yDateNow = date("Y"); $dateCreation = array();
for($i = $yDateNow;$i> ( $yDateNow - 100);$i--) { $dateCreation[(string)$i] = (int)$i; }

$nFace = 'http://www.facebook.com/';
$nTwitter = 'http://www.twitter.com/';
$nYoutube = 'http://www.youtube.com/user/';
$nGoogle = 'https://plus.google.com/u/0/';
$nPinterest = 'https://www.pinterest.com/';
$nLinkedin = 'http://www.linkedin.com/in/';
$nMyspace = 'http://www.myspace.com/';

?>
<div class="doorGets-content-wrapper">
    <div class="doorGets-top-title-content">
        <img src="[{!BASE_IMG!}]doorgets.png">
    </div>
    <div class="doorGets-title-content">
        4/5 - [{!$doorgets->l("Configurer votre site internet")!}]
    </div>
    [{!$doorgets->form['doorgets_website']->open('post','','')!}]
        <div class="separateur-tb"></div>
        [{!$doorgets->form['doorgets_website']->input($doorgets->l('Titre').' * ','title','text',$this->info['title'])!}]
        <div class="separateur-tb"></div>
        [{!$doorgets->form['doorgets_website']->input($doorgets->l('Slogan').' * ','slogan','text',$this->info['slogan'])!}]
        <div class="separateur-tb"></div>
        [{!$doorgets->form['doorgets_website']->input($doorgets->l('Description').' * ','description','text',$this->info['description'])!}]
        <div class="separateur-tb"></div>
        [{!$doorgets->form['doorgets_website']->input($doorgets->l('Mots clés').' * ','keywords','text',$this->info['keywords'])!}]
        <div class="separateur-tb"></div>
        [{!$doorgets->form['doorgets_website']->input($doorgets->l('Copyright'),'copyright','text',$this->info['copyright'])!}]
        <div class="separateur-tb"></div>
        [{!$doorgets->form['doorgets_website']->select($doorgets->l('Année de création'),'year',$dateCreation,$this->info['year'])!}]
        <div class="separateur-tb"></div>
        [{!$doorgets->form['doorgets_website']->submit($doorgets->l('Etape suivante'),'','submit-next')!}]
    [{!$doorgets->form['doorgets_website']->close()!}]
    [{!$doorgets->getHtmlGoBack()!}]
</div>