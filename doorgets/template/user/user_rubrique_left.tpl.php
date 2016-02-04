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

    // Init $menu from Name Controller
    $menu               = $doorGets->controllerNameNow();
    $action             = $doorGets->Action();

    // Init rubrique for module
    $isModuleRubriques  = array('modulenews','modulepage','modulemultipage');
    
    $isModuleRubriques      = array('modules','modulenews','modulecategory','modulepage','modulemultipage',
                                    'modulelink','moduleimage','modulevideo','modulefaq','modulepartner','modulesharedlinks','moduleblog');
    $isWidgetsRubriques      = array('widgets','modulecarousel','modulegenform','modulesurvey','moduleblock');
    $isRubriquesRubriques   = array('rubriques');
    $isEmailingRubriques    = array('emailing');
    $isSaasRubriques        = array('saas');
    $isDashboardRubriques   = array('dashboard');
    $isDashboardTheme       = array('theme');
    $isUsersRubriques       = array('users');
    $isGroupesRubriques       = array('groupes','attributes');
    $isOrderRubriques       = array('order','taxes','promotion','orderstatus','orderstatusback','ordermessage');
    
    $iCommentNotRead    = $doorGets->getCountCommentNotRead();

    if (empty($iCommentNotRead)) { $iCommentNotRead = '';}
    if (!empty($iCommentNotRead)) { $iCommentNotRead    = '<small class="info-counts">'.$iCommentNotRead.'</small>'; }
    
    $iInboxNotRead      = $doorGets->getCountInboxNotRead();
    
    if (empty($iInboxNotRead)) { $iInboxNotRead = '';}
    if (!empty($iInboxNotRead)) { $iInboxNotRead      = '<small class="info-counts">'.$iInboxNotRead.'</small>'; }
    
    $iModerationWaitting = $doorGets->getCountModerationWaitting();

    if (empty($iModerationWaitting)) { $iModerationWaitting = '';}
    if (!empty($iModerationWaitting)) { $iModerationWaitting      = '<small class="info-counts">'.$iModerationWaitting.'</small>'; }
    
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

<div id="sidebar-wrapper" >
    <ul class="sidebar-nav list-group">
        <li class="sidebar-brand">
            <a class="navbar-brand"  href="./"><img  src="[{!BASE_IMG!}]logo_backoffice.png" /></a>
        </li>
        <li class=" list-group-item first <?php if (in_array($menu,$isDashboardRubriques)) { echo 'active'; } ?>">
            <a href="./"  title="[{!$doorGets->__('Tableau de bord')!}]">
                <b class="glyphicon glyphicon-dashboard"></b>
                [{!$doorGets->__('Tableau de bord')!}]
            </a>
        </li>
        [{?((in_array('users', $doorGets->user['liste_module_interne']) && !SAAS_ENV)
            || (in_array('users', $doorGets->user['liste_module_interne']) && SAAS_ENV && SAAS_USERS)):}]
            <li class="list-group-item <?php if (in_array($menu,$isUsersRubriques)) { echo 'active'; } ?>">
                <a href="?controller=users"><b class="glyphicon glyphicon-user"></b>
                    [{!$doorGets->__('Utilisateurs')!}]
                </a>
            </li>
        [?]
        [{?((in_array('groupes', $doorGets->user['liste_module_interne']) && !SAAS_ENV)
            || (in_array('groupes', $doorGets->user['liste_module_interne']) && SAAS_ENV && SAAS_GROUPES) ):}]
            <li class="list-group-item <?php if (in_array($menu,$isGroupesRubriques)) { echo 'active'; } ?>">
                <a href="?controller=groupes"><b class="glyphicon glyphicon-cloud"></b>
                    [{!$doorGets->__('Groupes')!}]
                </a>
            </li>
        [?]
        [{?((in_array('module', $doorGets->user['liste_module_interne']) && !SAAS_ENV)
            || (in_array('module', $doorGets->user['liste_module_interne']) && SAAS_ENV && SAAS_MODULES)):}]
        <li class="list-group-item <?php if (in_array($menu,$isModuleRubriques)) { echo 'active'; } ?>">
            <a href="?controller=modules"  title="[{!$doorGets->__('Modules')!}]" >
                <b class="glyphicon glyphicon-asterisk"></b>
                [{!$doorGets->__('Modules')!}]
            </a>
        </li>
        <li class="list-group-item <?php if (in_array($menu,$isWidgetsRubriques)) { echo 'active'; } ?>">
            <a href="?controller=widgets"  title="[{!$doorGets->__('Widgets')!}]" >
                <b class="glyphicon glyphicon-magnet"></b>
                [{!$doorGets->__('Widgets')!}]
            </a>
        </li>
        [?]
        [{?((in_array('menu', $doorGets->user['liste_module_interne']) && !SAAS_ENV)
            || (in_array('menu', $doorGets->user['liste_module_interne']) && SAAS_ENV && SAAS_MENU)):}]
        <li class="list-group-item <?php if (in_array($menu,$isRubriquesRubriques)) { echo 'active'; } ?>">
            <a href="?controller=rubriques"  title="[{!$doorGets->__('Menu')!}]">
                <b class="glyphicon glyphicon-align-justify"></b>
                [{!$doorGets->__('Menu')!}]
            </a>
        </li>
        [?]
        [{?((in_array('media', $doorGets->user['liste_module_interne']) && !SAAS_ENV)
            || (in_array('media', $doorGets->user['liste_module_interne']) && SAAS_ENV && SAAS_MEDIA) ):}]  
        <li class="list-group-item <?php if ($menu === 'media') { echo 'active'; } ?>">
            <a href="?controller=media" title="[{!$doorGets->__('Média')!}]">
                <b class="glyphicon glyphicon-folder-open "></b>
                [{!$doorGets->__('Média')!}]
            </a>
        </li>
        [?]
        [{?(
            (in_array('traduction', $doorGets->user['liste_module_interne']) && !SAAS_ENV)
            || (in_array('traduction', $doorGets->user['liste_module_interne']) && SAAS_ENV && SAAS_TRADUCTION) 
        ):}]  
        <li class="list-group-item <?php if ($menu === 'traductions') { echo 'active'; } ?>">
            <a href="?controller=traductions" title="[{!$doorGets->__('Traductions')!}]">
                <b class="glyphicon glyphicon-flag "></b>
                [{!$doorGets->__('Traduction')!}]
            </a>
        </li>
        [?]
        [{?((in_array('themes', $doorGets->user['liste_module_interne']) && !SAAS_ENV)
            || (in_array('themes', $doorGets->user['liste_module_interne']) && SAAS_ENV && SAAS_THEME)):}]  
        <li class="list-group-item <?php if ($menu === 'theme') { echo 'active'; } ?>">
            <a href="?controller=theme" title="[{!$doorGets->__('Thème')!}]">
                <b class="glyphicon glyphicon-tint "></b>
                [{!$doorGets->__('Thème')!}]
            </a>
        </li>
        [?]
        [{?((in_array('campagne_email', $doorGets->user['liste_module_interne']) && !SAAS_ENV)
            || (in_array('campagne_email', $doorGets->user['liste_module_interne']) && SAAS_ENV && SAAS_NEWSLETTER) ):}]
        <li class="list-group-item <?php if ($menu === 'emailing') { echo 'active'; } ?>">
            <a href="?controller=emailing" title="[{!$doorGets->__('Inscription à la newsletter')!}]">
                <b class="glyphicon glyphicon-send "></b>
                [{!$doorGets->__('Newsletter')!}]
            </a>
        </li>
        [?]
        [{?(
            (in_array('emailnotification', $doorGets->user['liste_module_interne']) && !SAAS_ENV)
            || (in_array('emailnotification', $doorGets->user['liste_module_interne']) && SAAS_ENV && SAAS_NOTIFICATION) 
        ):}]             
        <li class="list-group-item <?php if ($menu === 'emailnotification') { echo 'active'; } ?>" >
            <a href="?controller=emailnotification" title="[{!$doorGets->__('Notification email')!}]">
                <b class="glyphicon glyphicon-bullhorn "></b>
                [{!$doorGets->__('Notification')!}]
            </a>
        </li>
        [?]
        [{?((in_array('saas', $doorGets->user['liste_module_interne']) && !SAAS_ENV)
            || (in_array('saas', $doorGets->user['liste_module_interne']) && SAAS_ENV && SAAS_CLOUD) ):}]
        <li class="list-group-item <?php if (in_array($menu,$isSaasRubriques)) { echo 'active'; } ?>">
            <a href="?controller=saas"><b class="glyphicon glyphicon-cloud-upload"></b>
                [{!$doorGets->__('Cloud')!}]
            </a>
        </li>
        [?]
        [{?(!empty($Rubriques)):}]
        <li class="list-group-item  <?php if ($menu === 'configuration') { echo 'active'; } ?>">
            <a  title="[{!$doorGets->__('Configuration')!}]" href="?controller=configuration">
                <b class="glyphicon glyphicon-cog"></b>
                [{!$doorGets->__('Configuration')!}]
            </a>
        </li>
        [?]
        <li class="list-group-item" style="position: fixed;bottom: 0;">
            <a  title="[{!$doorGets->__('Par')!}] doorGets™" href="http://www.doorgets.com/t/[{!$User['langue']!}]/" target="self" style="font-size: 11px;text-align: right;display: block;">
                <b class="glyphicon glyphicon-gift"></b>
                [{!$doorGets->__('Par')!}] doorGets™
            </a>
        </li>
    </ul>
</div>
