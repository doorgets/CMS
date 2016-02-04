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


 /*
  * Variables :
  * 
        $navigation[$uri_module]['label']
        $navigation[$uri_module]['type']
 */
        
$currentUrl = './';
// $Cart = new Cart($this->doorGets);
// $countCart = $Cart->getCount();
$i = 0;
$BASE_URL = BASE_URL.'t/'.$toLangue;

$hasUser = (empty($user))?false:true;
$hasProducts = (empty($products))?false:true;

$paramsNavbar = array(
    'hasUser' => $hasUser,
    'hasProducts' => $hasProducts,
    'user' => $user,
    'products' => $products
);

?><!-- doorGets:start:widgets/navigation -->
<div class="navbar navbar-default navbar-static-top " >
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="[{!$BASE_URL!}]" class="navbar-brand" title="[{!'cool'!}]"><img class="ico-logo-checkout" src="[{!URL!}]skin/img/logo_backoffice.png"/></a>  
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                [{/($navigation as $uri_module => $value_module):}]
                    [{
                        $moduleUrl = $BASE_URL;
                        if ($value_module['all']['is_first'] !== '1') {
                            $moduleUrl .= '?'.$uri_module;
                        }
                    }]
                    <li class="[{?(!empty($rubriques[$uri_module]['categories'])):}]dropdown[?] ">
                        <a [{?(!empty($rubriques[$uri_module]['categories'])  && $rubriques[$uri_module]['type'] === 'multipage'):}]class="dropdown-toggle" data-toggle="dropdown" [?]  href="[{!$moduleUrl!}]">
                            [{!$value_module['label']!}] [{?(!empty($rubriques[$uri_module]['categories']) && $rubriques[$uri_module]['type'] === 'multipage'):}]<b class="caret"></b>[?]
                        </a>
                        [{?(!empty($rubriques[$uri_module]['categories']) && $rubriques[$uri_module]['type'] === 'multipage'):}]
                            <ul class="dropdown-menu">
                                [{/($rubriques[$uri_module]['categories'] as $uri_category=>$value_category):}]
                                    [{$door = 'doorgets';}][{?($rubriques[$uri_module]['type'] === 'multipage'):}][{$door=$uri_module;}][?]
                                    <li ><a class="menu-level-[{!$value_category['level']!}]" href="[{!$BASE_URL!}]?[{!$door!}]=[{!$uri_category!}]">[{!$value_category['name']!}]</a></li>
                                [/]
                            </ul>
                        [?]
                    </li>
                    [{$i++;}]
                [/]
                [{!$this->doorGets->genLangueMenuAdmin(false)!}]
                [{?(empty($user)):}]
                    <li class="dropdown" >
                        <a href="[{!BASE!}]dg-user/" class="dropdown-toggle" data-toggle="dropdown" >
                            <b class="glyphicon glyphicon-user"></b><b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="[{!URL_USER.$toLangue!}]?controller=authentification&back=[{!$currentUrl!}]" rel="nofollow">[{!$this->doorGets->__('Se connecter')!}]</a></li>
                            [{?(!empty($groupes)):}]
                            <li><a href="[{!URL_USER.$toLangue!}]?controller=authentification&action=register&back=[{!$currentUrl!}]" rel="nofollow">[{!$this->doorGets->__("S'inscrire")!}]</a></li>
                            [?]
                        </ul>
                    </li>
                [??]
                    
                    [{
                        $toLangue = $user['langue'].'/';
                    }]
                    <li class="dropdown"  >
                        <a class="dropdown-toggle" data-toggle="dropdown"  href="[{!BASE!}]dg-user/?controller=account" title="[{!$this->doorGets->__('Mon compte')!}]">
                            <img src="[{!URL.'data/users/'.$user['avatar']!}]" class="avatar">
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li >
                                <a href="[{!URL_USER.$toLangue!}]" title="[{!$this->doorGets->__('Tableau de bord')!}]">
                                    <b class="glyphicon glyphicon-dashboard"></b> 
                                    [{!$this->doorGets->__('Tableau de bord')!}]
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li >
                                <a href="[{!URL.'u/'.$user['pseudo'].'/'!}]" title="[{!$this->doorGets->__('Afficher mon profil')!}]">
                                    <b class="glyphicon glyphicon-user"></b> 
                                    [{!$this->doorGets->__('Afficher mon profil')!}]
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li >
                                <a href="[{!URL_USER.$toLangue!}]?controller=account" title="[{!$this->doorGets->__('Gérer mon profil')!}]">
                                    <b class="glyphicon glyphicon-cog"></b> 
                                    [{!$this->doorGets->__('Gérer mon profil')!}]
                                </a>
                            </li>
                            <li class="divider"></li>
                            [{?(in_array('myinbox', $user['liste_module_interne'])):}]
                            <li >
                                <a href="[{!URL_USER.$toLangue!}]?controller=myinbox" title="[{!$this->doorGets->__('Boîte de récéption')!}]">
                                    <b class="glyphicon glyphicon-inbox"></b> 
                                    [{!$this->doorGets->__('Boîte de récéption')!}]
                                </a>
                            </li>
                            <li class="divider"></li>
                            [?]
                            [{?(in_array('address', $user['liste_module_interne'])):}]
                            <li >
                                <a href="[{!URL_USER.$toLangue!}]?controller=address" title="[{!$this->doorGets->__('Mes adresses')!}]">
                                    <b class="glyphicon glyphicon-road"></b> 
                                    [{!$this->doorGets->__('Mes adresses')!}]
                                </a>
                            </li>
                            <li class="divider"></li>
                            [?]
                            <li >
                                <a href="[{!URL_USER.$toLangue!}]?controller=account&action=password" title="[{!$this->doorGets->__('Sécurité')!}]">
                                    <b class="glyphicon glyphicon-lock"></b> 
                                    [{!$this->doorGets->__('Sécurité')!}]
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li >
                                <a  href="[{!URL_USER.$toLangue!}]?controller=authentification&action=logout" title="[{!$this->doorGets->__('Me déconnecter')!}]">
                                    <b class="glyphicon violet glyphicon-off red"></b>
                                    <span class="red">[{!$this->doorGets->__('Me déconnecter')!}]</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                [?]
                
            </ul>
        </div>
        [{!$this->getView('checkout/checkout_navbar',$paramsNavbar)!}]
    </div>   
</div>
<!-- doorGets:end:widgets/navigation -->