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



class ConfigurationController extends doorGetsUserController {
    
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);
        
        if (empty($doorGets->user)) {

            header('Location:./?controller=authentification&error-login=true&back='.urlencode($_SERVER['REQUEST_URI'])); exit();
        }
    }
    
    public function backupsAction() {
        

        if (!in_array('backups',$this->doorGets->user['liste_module_interne']) 
            || (in_array('backups',$this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_CONFIG_BACKUPS) ) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();

        }

        $this->doorGets->Form['backups_create'] = new Formulaire('backups_create');
        $this->doorGets->Form['backups_install'] = new Formulaire('backups_install');
        $this->doorGets->Form['backups_delete'] = new Formulaire('backups_delete');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    }
    
    
    public function paramsAction() {
        
        if (!in_array('params',$this->doorGets->user['liste_module_interne']) 
            || (in_array('params',$this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_CONFIG_PARAMS) ) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();

        }

        $this->doorGets->Form = new Formulaire('configuration_params');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    }
    
    public function langueAction() {
        
        if (!in_array('langue',$this->doorGets->user['liste_module_interne'])) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();

        }

        $this->doorGets->Form = new Formulaire('configuration_langue');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    }
    
    public function cacheAction() {
        
        if (!in_array('cache',$this->doorGets->user['liste_module_interne']) 
            || (in_array('cache',$this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_CONFIG_CACHE) ) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();

        }

        $this->doorGets->Form = new Formulaire('configuration_cache');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    }
    
    public function mediaAction() {
        
        if (!in_array('logo',$this->doorGets->user['liste_module_interne'])
            || (in_array('logo',$this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_CONFIG_MEDIA) ) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();

        }

        $this->doorGets->Form['configuration_media_logo_authentification'] = new Formulaire('configuration_media_logo_authentification');
        $this->doorGets->Form['configuration_media_logo'] = new Formulaire('configuration_media_logo');
        $this->doorGets->Form['configuration_media_logo_backoffice'] = new Formulaire('configuration_media_logo_backoffice');
        $this->doorGets->Form['configuration_media_logo_mail'] = new Formulaire('configuration_media_logo_mail');
        $this->doorGets->Form['configuration_media_icone'] = new Formulaire('configuration_media_icone');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    }
    
    public function modulesAction() {
        
        if (!in_array('modules',$this->doorGets->user['liste_module_interne'])
            || (in_array('modules',$this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_CONFIG_MODULES) ) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();

        }

        $this->doorGets->Form = new Formulaire('configuration_modules');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    }
    
    public function adresseAction() {
        
        if (!in_array('adresse',$this->doorGets->user['liste_module_interne'])) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();

        }

        if (!empty($this->doorGets->configWeb['addresses']) && is_array($this->doorGets->configWeb['addresses'])) {
            $addresses = $this->doorGets->configWeb['addresses'];
            foreach ($addresses as $key => $addresse) {
                $this->doorGets->Form['remove_'.$key] = new Formulaire('configuration_adresse_remove_'.$key);
                $this->doorGets->Form[$key] = new Formulaire('configuration_adresse_'.$key);
            }
        }

        $this->doorGets->Form['new'] = new Formulaire('configuration_adresse');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    }

    public function emailAction() {
        
        if (!in_array('adresse',$this->doorGets->user['liste_module_interne'])) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();

        }

        $this->doorGets->Form = new Formulaire('configuration_email');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    }
    
    public function networkAction() {
        
        if (!in_array('network',$this->doorGets->user['liste_module_interne'])
            || (in_array('network',$this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_CONFIG_NETWORK) ) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();

        }

        $this->doorGets->Form = new Formulaire('configuration_network');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    }
    
    public function analyticsAction() {
        
        if (!in_array('analytics',$this->doorGets->user['liste_module_interne']) 
            || (in_array('analytics',$this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_CONFIG_ANALYTICS)) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();

        }

        $this->doorGets->Form = new Formulaire('configuration_analytics');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    }
    
    public function sitemapAction() {
        
        if (!in_array('sitemap',$this->doorGets->user['liste_module_interne'])) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();

        }

        $this->doorGets->Form = new Formulaire('configuration_sitemap');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    }

    public function stripeAction() {
        
        if (!in_array('stripe',$this->doorGets->user['liste_module_interne'])
            || (in_array('stripe',$this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_CONFIG_STRIPE)) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();

        }

        $this->doorGets->Form = new Formulaire('configuration_stripe');

        // Generate the model
        $this->getRequest();

        // return the view
        return $this->getView();
    }

    public function paypalAction() {
        
        if (!in_array('paypal',$this->doorGets->user['liste_module_interne'])
            || (in_array('paypal',$this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_CONFIG_PAYPAL)) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();

        }

        $this->doorGets->Form = new Formulaire('configuration_paypal');

        // Generate the model
        $this->getRequest();

        // return the view
        return $this->getView();
    }

    public function transferAction() {
        
        if (!in_array('transfer',$this->doorGets->user['liste_module_interne'])
            || (in_array('transfer',$this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_CONFIG_TRANSFER)) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();

        }

        $this->doorGets->Form = new Formulaire('configuration_transfer');

        // Generate the model
        $this->getRequest();

        // return the view
        return $this->getView();
    }

    public function checkAction() {
        
        if (!in_array('check',$this->doorGets->user['liste_module_interne'])
            || (in_array('check',$this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_CONFIG_CHECK)) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();

        }

        $this->doorGets->Form = new Formulaire('configuration_check');

        // Generate the model
        $this->getRequest();

        // return the view
        return $this->getView();
    }

    public function cashAction() {
        
        if (!in_array('cash',$this->doorGets->user['liste_module_interne'])
            || (in_array('cash',$this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_CONFIG_CASH)) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();

        }

        $this->doorGets->Form = new Formulaire('configuration_cash');

        // Generate the model
        $this->getRequest();

        // return the view
        return $this->getView();
    }
    
    public function updaterAction() {
        
        if (!in_array('updater',$this->doorGets->user['liste_module_interne']) 
            || (in_array('updater',$this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_CONFIG_UPDATE) ) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();

        }

        $this->doorGets->Form = new Formulaire('configuration_updater');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    }
    
    public function indexAction()
    {

        if (!empty($this->doorGets->user) && !in_array('configuration',$this->doorGets->user['liste_module_interne'])) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();

        }

        $this->doorGets->Form = new Formulaire('configuration_index');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
        
    }

    public function sitewebAction()
    {
        
        if (!in_array('siteweb',$this->doorGets->user['liste_module_interne'])) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();

        }

        $this->doorGets->Form = new Formulaire('configuration_siteweb');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
           
    }

    public function oauthAction()
    {
        
        if (!in_array('oauth',$this->doorGets->user['liste_module_interne']) 
            || (in_array('oauth',$this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_CONFIG_OAUTH2) ) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();

        }

        $this->doorGets->Form = new Formulaire('configuration_oauth');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
           
    }

    public function smtpAction()
    {
        
        if (!in_array('smtp',$this->doorGets->user['liste_module_interne']) 
            || (in_array('smtp',$this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_CONFIG_SMTP) ) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();

        }

        $this->doorGets->Form = new Formulaire('configuration_smtp');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
           
    }

    public function saasAction()
    {
        
        if (!in_array('saas_config',$this->doorGets->user['liste_module_interne'])
            || (in_array('saas_config',$this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_CONFIG_CLOUD)) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();

        }

        $this->doorGets->Form = new Formulaire('configuration_saas');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
           
    }
    
    public function setupAction() {

        if (!in_array('setup',$this->doorGets->user['liste_module_interne']) 
            || (in_array('setup',$this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_CONFIG_SETUP) ) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();

        }

        $this->doorGets->Form['installer_create'] = new Formulaire('installer_create');
        $this->doorGets->Form['installer_delete'] = new Formulaire('installer_delete');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();

    }
    
}
