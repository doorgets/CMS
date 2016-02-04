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
    
    unset($liste['block']);
    unset($liste['genform']);
    unset($liste['carousel']);
    unset($liste['survey']);

    // Init $menu from Name Controller
    $menu               = $doorGets->controllerNameNow();
    $action             = $doorGets->Action();
    
    // Init rubrique for module
    $isModuleRubriques  = array('modulenews','modulepage','modulemultipage');
    
    $isModuleRubriques      = array('modules','modulenews','modulecategory','modulepage','modulemultipage','moduleblock',
                                    'modulelink','moduleimage','modulevideo','modulefaq','modulepartner','moduleshop','modulesharedlinks');
    $isRubriquesRubriques   = array('rubriques');
    $isEmailingRubriques    = array('emailing');
    $isDashboardRubriques   = array('dashboard');
    $isDashboardTheme       = array('theme');
    $isUsersRubriques       = array('users','groupes','attributes');
    
    $iSupportNotRead    = 0;
    if (in_array('support',$doorGets->user['liste_module_interne'])) {
        $iSupportNotRead    = $doorGets->getCountSupportNotRead();
    } else {
        $iSupportNotRead    = $doorGets->getCountUserSupportNotRead();
    }

    if (empty($iSupportNotRead)) { $iSupportNotRead = '';}
    if (!empty($iSupportNotRead)) { $iSupportNotRead    = '<small class="info-counts">'.$iSupportNotRead.'</small>'; }
    if ($iSupportNotRead > 100) { $iSupportNotRead    = '<small class="info-counts">+99</small>'; }

    $iCommentNotRead    = $doorGets->getCountCommentNotRead();

    if (empty($iCommentNotRead)) { $iCommentNotRead = '';}
    if (!empty($iCommentNotRead)) { $iCommentNotRead    = '<small class="info-counts">'.$iCommentNotRead.'</small>'; }
    if ($iCommentNotRead > 100) { $iCommentNotRead    = '<small class="info-counts">+99</small>'; }

    $iMessageNotRead    = $doorGets->getCountMessageNotRead();

    if (empty($iMessageNotRead)) { $iMessageNotRead = '';}
    if (!empty($iMessageNotRead)) { $iMessageNotRead    = '<small class="info-counts">'.$iMessageNotRead.'</small>'; }
    if ($iMessageNotRead > 100) { $iMessageNotRead    = '<small class="info-counts">+99</small>'; }

    $iInboxNotRead      = $doorGets->getCountInboxNotRead();
    
    if (empty($iInboxNotRead)) { $iInboxNotRead = '';}
    if (!empty($iInboxNotRead)) { $iInboxNotRead      = '<small class="info-counts">'.$iInboxNotRead.'</small>'; }
    if ($iInboxNotRead > 100) { $iInboxNotRead    = '<small class="info-counts">+99</small>'; }

    $iModerationWaitting = $doorGets->getCountModerationWaitting();

    if (empty($iModerationWaitting)) { $iModerationWaitting = '';}
    if (!empty($iModerationWaitting)) { $iModerationWaitting      = '<small class="info-counts">'.$iModerationWaitting.'</small>'; }
    if ($iModerationWaitting > 100) { $iModerationWaitting    = '<small class="info-counts">+99</small>'; }

    if (in_array('siteweb', $doorGets->user['liste_module_interne'])) {
        $Rubriques['siteweb']       = $doorGets->__('Site Web');
    }
    if (in_array('langue', $doorGets->user['liste_module_interne'])) {
        $Rubriques['langue']        = $doorGets->__('Langue').' / '.$doorGets->__('Heure');
    }
    if (in_array('logo', $doorGets->user['liste_module_interne'])) {
        $Rubriques['media']          = $doorGets->__('Logo').' & '.$doorGets->__('Icône');
    }
    if (in_array('modules', $doorGets->user['liste_module_interne'])) {
        $Rubriques['modules']       = $doorGets->__('Modules internes');
    }
    if (in_array('adresse', $doorGets->user['liste_module_interne'])) {
        $Rubriques['adresse']       = $doorGets->__('Addresse').' & '.$doorGets->__('Contact');
    }
    if (in_array('network', $doorGets->user['liste_module_interne'])) {
        $Rubriques['network']       = $doorGets->__('Réseaux sociaux');
    }
    if (in_array('analytics', $doorGets->user['liste_module_interne'])) {
        $Rubriques['analytics']     = $doorGets->__('Google analytics');
    }
    if (in_array('sitemap', $doorGets->user['liste_module_interne'])) {
        $Rubriques['sitemap']       = $doorGets->__('Plan du site');
    }
    if (in_array('backups', $doorGets->user['liste_module_interne'])) {
        $Rubriques['backups']       = $doorGets->__('Sauvegardes');
    }
    if (in_array('updater', $doorGets->user['liste_module_interne'])) {
        $Rubriques['updater']       = $doorGets->__('Mise à jour');
    }
    if (in_array('cache', $doorGets->user['liste_module_interne'])) {
        $Rubriques['cache']         = $doorGets->__('Cache');
    }
    if (in_array('setup', $doorGets->user['liste_module_interne'])) {
        $Rubriques['setup']        = $doorGets->__('Installer');
    }
    if (in_array('pwd', $doorGets->user['liste_module_interne'])) {
        $Rubriques['pwd']        = $doorGets->__('Mot de passe');
    }
    if (in_array('oauth', $doorGets->user['liste_module_interne'])) {
        $Rubriques['oauth']        = 'OAuth';
    }
    if (in_array('smtp', $doorGets->user['liste_module_interne'])) {
        $Rubriques['smtp']        = 'SMTP';
    }
    if (in_array('stripe', $doorGets->user['liste_module_interne'])) {
        $Rubriques['stripe']        = 'Stripe';
    }
    if (in_array('params', $doorGets->user['liste_module_interne'])) {
        $Rubriques['params']        = $doorGets->__('Paramètres');
    }
    
    $RubriquesImage = array(
            
        'siteweb'       => '<b class="glyphicon glyphicon-home"></b>',
        'langue'        => '<b class="glyphicon glyphicon-globe"></b>',
        'media'         => '<b class="glyphicon glyphicon-picture"></b>',
        'modules'       => '<b class="glyphicon glyphicon-asterisk"></b>',
        'adresse'       => '<b class="glyphicon glyphicon-envelope"></b>',
        'network'       => '<b class="glyphicon glyphicon-link"></b>',
        'analytics'     => '<b class="glyphicon glyphicon-stats"></b>',
        'sitemap'       => '<b class="glyphicon glyphicon-tree-deciduous"></b>',
        'backups'       => '<b class="glyphicon glyphicon-floppy-disk"></b>',
        'updater'       => '<b class="glyphicon glyphicon-open"></b>',
        'cache'         => '<b class="glyphicon glyphicon-refresh"></b>',
        'setup'         => '<b class="glyphicon glyphicon-compressed"></b>',
        'pwd'           => '<b class="glyphicon glyphicon-edit"></b>',
        'oauth'         => '<b class="glyphicon glyphicon-magnet"></b>',
        'smtp'          => '<b class="glyphicon glyphicon-road"></b>',
        'stripe'        => '<b class="glyphicon glyphicon-euro"></b>',
        'params'        => '<b class="glyphicon glyphicon-filter"></b>'
        
    );

    $Pseudo = ucfirst($doorGets->user['pseudo']);
?>

<div class="navbar navbar-default navbar-static-top  " >
    <div class="navbar-header">
        
        <a class="navbar-brand"  href="./"><img  src="[{!BASE_IMG!}]logo_backoffice.png" /></a>
    </div>
    <div class="collapse navbar-collapse " id="bs-navbar">
        <ul class="nav navbar-nav">
            [{?( !empty($modules) || in_array('module', $doorGets->user['liste_module_interne']) ):}]
            <li class="dropdown hidden-xs">
                <a href="#" class="dropdown-toggle" title="[{!$doorGets->__("Edition rapide")!}]" data-toggle="dropdown">
                    <b class="glyphicon violet glyphicon-flash"></b>
                    [{!$doorGets->__("Edition rapide")!}]
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    [{?(in_array('module', $doorGets->user['liste_module_interne']) && !empty($liste)):}]
                    <li class="dropdown-submenu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"  tabindex="-1">[{!$doorGets->__("Créer un module")!}]</a>
                        <ul class="dropdown-menu">
                        [{/($liste as $uri_module => $label):}]
                            <li>
                                <a href="?controller=modules&action=add[{!$uri_module!}]">
                                    <img src="[{!$listeInfos[$uri_module]['image']!}]"  class="px15" >
                                    [{!$label!}]
                                </a>
                            </li>
                        [/]
                        </ul>
                    </li>
                    <li class="divider"></li>
                    [?]
                    [{?(in_array('module', $doorGets->user['liste_module_interne']) && !empty($listeWidgets)):}]
                    <li class="dropdown-submenu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"  tabindex="-1">[{!$doorGets->__("Créer un widget")!}]</a>
                        <ul class="dropdown-menu">
                        [{/($listeWidgets as $uri_module => $label):}]
                            <li>
                                <a href="?controller=modules&action=add[{!$uri_module!}]">
                                    <img src="[{!$listeInfos[$uri_module]['image']!}]"  class="px15" >
                                    [{!$label!}]
                                </a>
                            </li>
                        [/]
                        </ul>
                    </li>
                    <li class="divider"></li>
                    [?]
                    [{?(!empty($modules)):}]
                    <li class="dropdown-submenu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"  tabindex="-1">[{!$doorGets->__("Ajouter du contenu dans")!}]</a>
                        <ul class="dropdown-menu">
                            [{/($modules as $value):}]
                                <li>
                                    <a href="?controller=module[{!$value['type']!}]&uri=[{!$value['uri']!}]&action=add">
                                        <img src="[{!$listeInfos[$value['type']]['image']!}]"  class="px15" >
                                        [{!$value['label']!}]
                                    </a>
                                </li>
                            [/]
                        </ul>
                    </li>
                    [?]
                </ul>
            </li>
            [?]   
        </ul>
        <ul class="nav navbar-nav navbar-right">   
            [{?(!empty($modulesCanShow)):}]
                [{$z=0;$max=5;$total=count($modulesCanShow);}]
                [{/($modulesCanShow as $value):}]
                    [{?($z==$max):}]
                    <li >
                    <a class="dropdown-toggle" data-toggle="dropdown"  href="?controller=account" title="[{!$doorGets->__('Mon compte')!}]">
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu"> 
                    [?]
                    <li class="<?php if (in_array($menu,Constant::$modules) && $doorGets->Uri == $value['uri'] ) { echo 'active'; } ?>">
                        <a href="?controller=module[{!$value['type']!}]&uri=[{!$value['uri']!}]"  >
                            <img src="[{!$listeInfos[$value['type']]['image']!}]"  class="px15" >
                            [{!$value['label']!}]
                        </a>
                    </li>
                    [{?($z>=$max && $z==$total-1):}]
                    </li>
                    </ul>
                    [?]
                    [{$z++;}]
                [/]
            [?]
            [{?((in_array('moderation', $doorGets->user['liste_module_interne']) && !SAAS_ENV) 
                || (in_array('moderation', $doorGets->user['liste_module_interne']) && SAAS_ENV && SAAS_MODERATION)):}]      
            <li class="<?php if ($menu === 'moderation') { echo 'active'; } ?>">
                <a href="?controller=moderation" title="[{!$doorGets->__('Modération')!}]">
                    <b class="glyphicon violet glyphicon-bell hidden-xs"></b>
                    <span class="visible-xs">
                        <b class="glyphicon violet glyphicon-bell"></b>
                        [{!$doorGets->__('Modération')!}]
                    </span>
                    <span class="badge badge-important">[{!$iModerationWaitting!}]</span>
                </a>
            </li>
            [?]
            [{?((in_array('inbox', $doorGets->user['liste_module_interne']) && !SAAS_ENV)
                || (in_array('inbox', $doorGets->user['liste_module_interne']) && SAAS_ENV && SAAS_INBOX)):}]      
            <li class="<?php if ($menu === 'inbox') { echo 'active'; } ?>">
                <a href="?controller=inbox" title="[{!$doorGets->__('Message')!}]">
                    <b class="glyphicon violet glyphicon-envelope hidden-xs"></b>
                    <span class="visible-xs">
                        <b class="glyphicon violet glyphicon-envelope"></b>
                        [{!$doorGets->__('Message')!}]
                    </span>
                    <span class="badge badge-important">[{!$iInboxNotRead!}]</span>
                </a>
            </li>
            [?]
            [{?((in_array('comment', $doorGets->user['liste_module_interne']) && !SAAS_ENV)
                || (in_array('comment', $doorGets->user['liste_module_interne']) && SAAS_ENV && SAAS_COMMENT)):}]
            <li class="<?php if ($menu === 'comment') { echo 'active'; } ?>">
                <a href="?controller=comment" title="[{!$doorGets->__('Commentaire')!}]">
                    <b class="glyphicon violet glyphicon-comment hidden-xs"></b>
                    <span class="visible-xs">
                        <b class="glyphicon violet glyphicon-comment"></b>
                        [{!$doorGets->__('Commentaire')!}]
                    </span>
                    <span class="badge badge-important">[{!$iCommentNotRead!}]</span>
                </a>
            </li>
            [?]
            [{?(
                ((in_array('support_client', $doorGets->user['liste_module_interne']) || in_array('support', $doorGets->user['liste_module_interne'])) && !SAAS_ENV) 
                || ((in_array('support_client', $doorGets->user['liste_module_interne']) || in_array('support', $doorGets->user['liste_module_interne']))  && SAAS_ENV && SAAS_SUPPORT) 
            ):}]
            <li class="divider-vertical"></li>
            <li class="<?php if ($menu === 'support') { echo 'active'; } ?>">
                <a href="?controller=support" title="[{!$doorGets->__('Support')!}]">
                    <b class="glyphicon violet glyphicon-question-sign"></b>
                    <span class="badge badge-important">[{!$iSupportNotRead!}]</span>
                </a>
            </li>
            [?]
            <li class="divider-vertical"></li>
            <li class="<?php if ($menu === 'account') { echo 'active'; } ?>">
                <a class="dropdown-toggle" data-toggle="dropdown"  href="?controller=account" title="[{!$doorGets->__('Mon compte')!}]">
                    <span class="visible-xs">
                        <img src="[{!URL.'data/users/'.$doorGets->user['avatar']!}]" class="avatar">
                        [{!$doorGets->__('Mon compte')!}] 
                        <span class="badge badge-important">[{!$iMessageNotRead!}]</span>
                        <b class="caret"></b>
                    </span>
                    <span class="hidden-xs">
                        <img src="[{!URL.'data/users/'.$doorGets->user['avatar']!}]" class="avatar">
                        <span class="badge badge-important">[{!$iMessageNotRead!}]</span>
                        <b class="caret"></b>
                    </span>
                </a>
                <ul class="dropdown-menu"> 
                    [{?(in_array('showprofile', $doorGets->user['liste_module_interne'])):}]
                    <li >
                        <a href="[{!URL.'u/'.$doorGets->user['pseudo'].'/'!}]" title="[{!$doorGets->__('Afficher mon profil')!}]">
                            <b class="glyphicon glyphicon-user"></b> 
                            [{!$doorGets->__('Afficher mon profil')!}]
                        </a>
                    </li>
                    <li class="divider"></li>
                    [?]
                    <li class="<?php if ($action === 'index'  && $menu !== 'inbox' && $menu !== 'dashboard' && $menu != 'myinbox' && $menu != 'address') { echo 'active'; } ?>">
                        <a href="?controller=account" title="[{!$doorGets->__('Gérer mon profil')!}]">
                            <b class="glyphicon glyphicon-cog"></b>
                            [{!$doorGets->__('Gérer mon profil')!}]
                        </a>
                    </li>
                    <li class="divider"></li>
                    [{?(in_array('myinbox', $doorGets->user['liste_module_interne'])):}]
                    <li class="<?php if ($menu === 'myinbox') { echo 'active'; } ?>">
                        <a href="?controller=myinbox" title="[{!$doorGets->__('Boîte de récéption')!}]">
                            <b class="glyphicon glyphicon-inbox"></b>
                            [{!$doorGets->__('Boîte de récéption')!}]
                            <span class="badge badge-important">[{!$iMessageNotRead!}]</span>
                        </a>
                    </li>
                    <li class="divider"></li>
                    [?]
                    [{?(in_array('address', $doorGets->user['liste_module_interne'])):}]
                    <li class="<?php if ($menu === 'address') { echo 'active'; } ?>">
                        <a href="?controller=address" title="[{!$doorGets->__('Mes adresses')!}]">
                            <b class="glyphicon glyphicon-road"></b>
                            [{!$doorGets->__('Mes adresses')!}]
                        </a>
                    </li>
                    <li class="divider"></li>
                    [?]
                    <li class="<?php if ($action === 'password') { echo 'active'; } ?>">
                        <a href="?controller=account&amp;action=password" title="[{!$doorGets->__('Mot de passe')!}]">
                            <b class="glyphicon glyphicon-lock"></b>
                            [{!$doorGets->__('Sécurité')!}]
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="?controller=authentification&action=logout">
                            <b class="glyphicon violet glyphicon-off red"></b>
                            <span class="red">[{!$doorGets->__('Me déconnecter')!}]</span>
                        </a>
                    </li>
                </ul>
            </li>
            [{?(ACTIVE_DEMO):}]
            [{!$outChangeLangue!}]
            [?]
            <li class="divider-vertical"></li>
            <li class="dropdown">
                <a target="_blank" href="[{!$urlToHome!}]"  title="[{!$doorGets->__('Accéder au site')!}]">
                    <b class="glyphicon violet glyphicon-new-window hidden-xs green-c"></b>
                    <span class="visible-xs">
                        <b class="glyphicon violet glyphicon-new-window green-c"></b>
                        [{!$doorGets->__('Accéder au site')!}]
                    </span>
                </a>
            </li>
        </ul>
    </div>
</div>
