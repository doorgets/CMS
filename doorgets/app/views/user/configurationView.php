<?php

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 31, August 2015
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


class ConfigurationView extends doorGetsUserView{
    
    public function __construct(&$doorGets) {

        parent::__construct($doorGets);
        
    }
    
    public function getContent() {
        
        $out = '';
        
        $Rubriques = array(
            
            'siteweb'         => $this->doorGets->__('Site Web'),
            'langue'        => $this->doorGets->__('Langue').' / '.$this->doorGets->__('Heure'),
            'media'         => $this->doorGets->__('Logo').' & '.$this->doorGets->__('Icône'),
            'modules'       => $this->doorGets->__('Modules internes'),
            'adresse'       => $this->doorGets->__('Addresse').' & '.$this->doorGets->__('Contact'),
            'network'       => $this->doorGets->__('Réseaux sociaux'),
            'analytics'     => $this->doorGets->__('Google analytics'),
            'sitemap'       => $this->doorGets->__('Plan du site'),
            //'backups'       => $this->doorGets->__('Sauvegardes'),
            'updater'       => $this->doorGets->__('Mise à jour'),
            'cache'         => $this->doorGets->__('Cache'),
            'oauth'         => 'OAuth2',
            'smtp'          => 'SMTP',
            'setup'         => $this->doorGets->__('Installer'),
            'params'        => $this->doorGets->__('Paramètres'),
            
        );

        $RubriquesImage = array(
            
            'siteweb'       => '<b class="glyphicon glyphicon-home"></b>',
            'langue'        => '<b class="glyphicon glyphicon-globe"></b>',
            'media'         => '<b class="glyphicon glyphicon-picture"></b>',
            'modules'       => '<b class="glyphicon glyphicon-asterisk"></b>',
            'adresse'       => '<b class="glyphicon glyphicon-envelope"></b>',
            'network'       => '<b class="glyphicon glyphicon-link"></b>',
            'analytics'     => '<b class="glyphicon glyphicon-stats"></b>',
            'sitemap'       => '<b class="glyphicon glyphicon-tree-deciduous"></b>',
            //'backups'       => '<b class="glyphicon glyphicon-floppy-disk"></b>',
            'updater'       => '<b class="glyphicon glyphicon-open"></b>',
            'cache'         => '<b class="glyphicon glyphicon-refresh"></b>',
            'setup'         => '<b class="glyphicon glyphicon-compressed"></b>',
            'oauth'         => '<b class="glyphicon glyphicon-magnet"></b>',
            'smtp'          => '<b class="glyphicon glyphicon-road"></b>',
            'params'        => '<b class="glyphicon glyphicon-cog"></b>',
            
        );
        
        if (SAAS_ENV && !SAAS_CONFIG_UPDATE) { unset($Rubriques['updater']); }
        if (SAAS_ENV && !SAAS_CONFIG_MODULES) { unset($Rubriques['modules']); }
        if (SAAS_ENV && !SAAS_CONFIG_ANALYTICS) { unset($Rubriques['analytics']); }
        if (SAAS_ENV && !SAAS_CONFIG_BACKUPS) { unset($Rubriques['backups']); }
        if (SAAS_ENV && !SAAS_CONFIG_PARAMS) { unset($Rubriques['params']); }
        if (SAAS_ENV && !SAAS_CONFIG_ANALYTICS) { unset($Rubriques['smtp']); }
        if (SAAS_ENV && !SAAS_CONFIG_MEDIA) { unset($Rubriques['media']); }
        if (SAAS_ENV && !SAAS_CONFIG_SETUP) { unset($Rubriques['setup']); }
        if (SAAS_ENV && !SAAS_CONFIG_OAUTH2) { unset($Rubriques['oauth']); }
        if (SAAS_ENV && !SAAS_CONFIG_CACHE) { unset($Rubriques['cache']); }
        if (SAAS_ENV && !SAAS_CONFIG_SMTP) { unset($Rubriques['smtp']); }
        if (SAAS_ENV && !SAAS_CONFIG_NETWORK) { unset($Rubriques['network']); }

        $params = $this->doorGets->Params();

        $tplSelect = Template::getView('user/configuration/user_configuration_oauth_select');
        ob_start(); if (is_file($tplSelect)) { include $tplSelect; } $htmlConfigSelect = ob_get_clean();
        
        if (array_key_exists($this->Action,$Rubriques) || $this->Action === 'index')
        {
            switch($this->Action) {
                
                case 'smtp':
                    
                    $isMandrillActive = ($this->doorGets->configWeb['smtp_mandrill_active']) ? 'checked' : '';
                    break;

                case 'oauth':
                    
                    $isGoogleActive = ($this->doorGets->configWeb['oauth_google_active']) ? 'checked' : '';
                    $isFacebookActive = ($this->doorGets->configWeb['oauth_facebook_active']) ? 'checked' : '';
                    
                    break;

                case 'siteweb':
                    
                    $yDateNow = date("Y"); $dateCreation = array();
                    for($i = $yDateNow;$i> ( $yDateNow - 100);$i--) { $dateCreation[(string)$i] = (int)$i; }
                    
                    $statutImage = '<img src="'.BASE_IMG.'puce-verte.png" title="'.$this->doorGets->__('Activer').'" class="ico-image"  />';
                    if ($this->doorGets->configWeb['statut'] == '2') {
                        $statutImage = '<img src="'.BASE_IMG.'puce-rouge.png" title="'.$this->doorGets->__('Désactiver').'" class="ico-image" />';
                    }
                    $aValidation = $this->doorGets->getArrayForms('website_activation');
                    
                    break;
                
                case 'langue':
                    
                    $arrLangue = $this->doorGets->getAllLanguages();
                    
                    break;
                
                case 'backups':
                    
                    $urlTop = '<a href="?controller=configuration&action=backups&do=create"><img src="'.BASE_IMG.'add.png" alt="'.$this->doorGets->__("Créer une sauvegarde").'" class="ico-image" />  '.$this->doorGets->__('Créer une sauvegarde').'</a>';
                    
                    if (array_key_exists('do',$params['GET'])) {
                        
                        $urlTop = '<a class="doorGets-comebackform" href="?controller=configuration&action=backups"><img src="'.BASE_IMG.'retour.png" class="Retour-img"> '.$this->doorGets->__('Retour').'</a>';
                        
                    }
                    
                    $backups = new doorgetsBackups($this->doorGets);
                    
                    break;
                
                case 'modules':
                    
                    $imgOk = '<img src="'.BASE_IMG.'activer.png" > ';
                    $imgNo = '<img src="'.BASE_IMG.'pause.png" > ';
                    $isActive = '';
                    $isChecked = '';
                    
                    break;
                
                case 'updater':
                    
                    $checkNow = $this->doorGets->_ckeckVersion();
                    
                    extract($checkNow);
                    
                    break;
                
                case 'sitemap':
                    
                    $fileSitemap = BASE.'sitemap.xml';
                    $urlSitemap = URL.'sitemap.xml';
                    
                    $dateEdit = $this->doorGets->__("Jamais");
                    if (is_file($fileSitemap)) {
                        $dateEdit = GetDate::in($fileSitemap,1,$this->doorGets->myLanguage());
                    }
                    
                    break;
                
                case 'params':
                    
                    $ouinon = array(1=>$this->doorGets->__('Oui'),2=>$this->doorGets->__('Non'));
                    $valCache = 2;if (ACTIVE_CACHE) {$valCache = 1;}
                    $valDemo = 2;if (ACTIVE_DEMO) {$valDemo = 1;}
                    $aProtocol = array('http://'=>'http://','https://'=>'https://');

                    $val_url = strtolower(URL); 

                    break;

                case 'setup':
                    
                    $urlTop = '<a href="?controller=configuration&action=setup&do=create"><img src="'.BASE_IMG.'add.png" alt="'.$this->doorGets->__("Créer un installer").'" class="ico-image" />  '.$this->doorGets->__('Créer un installer').'</a>';
                    
                    if (array_key_exists('do',$params['GET'])) {
                        
                        $urlTop = '<a class="doorGets-comebackform" href="?controller=configuration&action=setup"><img src="'.BASE_IMG.'retour.png" class="Retour-img"> '.$this->doorGets->__('Retour').'</a>';
                        
                    }
                    
                    $setup = new doorgetsInstaller($this->doorGets);
                    
                    break;
            }
            
            $ActionFile = 'user/configuration/user_configuration_'.$this->Action;
            
            $tpl = Template::getView($ActionFile);
            ob_start(); if (is_file($tpl)) { include $tpl; } $out .= ob_get_clean();
            
        }
        
        return $out;
        
    }
    
}