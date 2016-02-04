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


class ModulesController extends doorGetsUserController{
    
    public function __construct(&$doorGets) {
        
        $doorGets->Table = '_modules';

        parent::__construct($doorGets);
        
        if (empty($doorGets->user)) {

            header('Location:./?controller=authentification&error-login=true&back='.urlencode($_SERVER['REQUEST_URI'])); exit();
        }


        if (!in_array('module',$this->doorGets->user['liste_module_interne'])) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();
        }
    }
    
    public function indexAction() {
        
        $this->doorGets->Form['_search']            = new Formulaire('doorGets_search');
        $this->doorGets->Form['_massdelete']        = new Formulaire($this->doorGets->controllerNameNow().'_massdelete');
        $this->doorGets->Form['_search_filter']     = new Formulaire('doorGets_search_filter');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }
    
    public function typeAction() {
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }
    
    
    public function addpageAction() {
        
        if (!in_array('module_page',$this->doorGets->user['liste_module_interne'])
            || ( in_array('module_page',  $this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_MODULES_PAGE)) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();
        }

        $this->doorGets->Form = new Formulaire('modules_addpage');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }
    
    public function addmultipageAction() {
        
        if (!in_array('module_multipage',$this->doorGets->user['liste_module_interne'])
            || ( in_array('module_multipage',  $this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_MODULES_MULTIPAGE)) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();
        }

        $this->doorGets->Form = new Formulaire('modules_addmultipage');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }
    
    public function addblogAction() {
        
        if (!in_array('module_blog',$this->doorGets->user['liste_module_interne'])
            || ( in_array('module_blog',  $this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_MODULES_BLOG)) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();
        }

        $this->doorGets->Form = new Formulaire('modules_addblog');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }

    public function addshopAction() {
        
        if (!in_array('module_shop',$this->doorGets->user['liste_module_interne'])
            || ( in_array('module_shop',  $this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_MODULES_SHOP)) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();
        }

        $this->doorGets->Form = new Formulaire('modules_addshop');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }

    public function addonepageAction() {
        
        if (!in_array('module_onepage',$this->doorGets->user['liste_module_interne'])
            || ( in_array('module_onepage',  $this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_MODULES_ONEPAGE)) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();
        }

        $this->doorGets->Form = new Formulaire('modules_addonepage');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }
    
    public function addnewsAction() {
        
        if (!in_array('module_news',$this->doorGets->user['liste_module_interne'])
            || ( in_array('module_news',  $this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_MODULES_NEWS)) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();
        }

        $this->doorGets->Form = new Formulaire('modules_addnews');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }

    public function addsharedlinksAction() {
        
        if (!in_array('module_sharedlinks',$this->doorGets->user['liste_module_interne'])
            || ( in_array('module_sharedlinks',  $this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_MODULES_SHAREDLINKS)) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();
        }

        $this->doorGets->Form = new Formulaire('modules_addsharedlinks');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }

    
    public function addinboxAction() {
        
        if (!in_array('module_inbox',$this->doorGets->user['liste_module_interne'])
            || ( in_array('module_inbox',  $this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_MODULES_CONTACT)) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();
        }

        $this->doorGets->Form = new Formulaire('modules_addinbox');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }
    
    public function addlinkAction() {
        
        if (!in_array('module_link',$this->doorGets->user['liste_module_interne'])
            || ( in_array('module_link',  $this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_MODULES_LINK)) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();
        }

        $this->doorGets->Form = new Formulaire('modules_addlink');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }
    
    public function addvideoAction() {
        
        if (!in_array('module_video',$this->doorGets->user['liste_module_interne'])
            || ( in_array('module_video',  $this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_MODULES_VIDEO)) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();
        }

        $this->doorGets->Form = new Formulaire('modules_addvideo');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }
    
    public function addimageAction() {
        
        if (!in_array('module_image',$this->doorGets->user['liste_module_interne'])
            || ( in_array('module_image',  $this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_MODULES_IMAGE)) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();
        }

        $this->doorGets->Form = new Formulaire('modules_addimage');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }
    
    public function addfaqAction() {
        
        if (!in_array('module_faq',$this->doorGets->user['liste_module_interne'])
            || ( in_array('module_faq',  $this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_MODULES_FAQ)) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();
        }

        $this->doorGets->Form = new Formulaire('modules_addfaq');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }
    
    public function addpartnerAction() {
        
        if (!in_array('module_partner',$this->doorGets->user['liste_module_interne'])
            || ( in_array('module_partner',  $this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_MODULES_PARTNER)) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();
        }

        $this->doorGets->Form = new Formulaire('modules_addpartner');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }
    
    public function addgenformAction() {
        
        if (!in_array('module_genform',$this->doorGets->user['liste_module_interne'])
            || ( in_array('module_genform',  $this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_WIDGET_FORM)) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();
        }

        $this->doorGets->Form = new Formulaire('modules_addgenform');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }

    public function addblockAction() {
        
        if (!in_array('module_block',$this->doorGets->user['liste_module_interne'])
            || ( in_array('module_block',  $this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_WIDGET_BLOCK)) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();
        }

        $this->doorGets->Form = new Formulaire('modules_addblock');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }

    public function addsurveyAction() {
        
        if (!in_array('module_survey',$this->doorGets->user['liste_module_interne'])
            || ( in_array('module_survey',  $this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_WIDGET_SURVEY)) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();
        }

        $this->doorGets->Form = new Formulaire('modules_addsurvey');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }

    public function addcarouselAction() {
        
        if (!in_array('module_carousel',$this->doorGets->user['liste_module_interne'])
            || ( in_array('module_carousel',  $this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_WIDGET_BLOCK)) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();
        }

        $this->doorGets->Form = new Formulaire('modules_addcarousel');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }
    
    public function editpageAction() {
        
        if (!in_array('module_page',$this->doorGets->user['liste_module_interne'])
            || ( in_array('module_page',  $this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_MODULES_PAGE)) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();
        }

        $this->doorGets->Form = new Formulaire('modules_editpage');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }
    
    public function editmultipageAction() {
        
        if (!in_array('module_multipage',$this->doorGets->user['liste_module_interne'])
            || ( in_array('module_multipage',  $this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_MODULES_MULTIPAGE)) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();
        }

        $this->doorGets->Form = new Formulaire('modules_editmultipage');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }
    
    public function editnewsAction() {
        
        if (!in_array('module_news',$this->doorGets->user['liste_module_interne'])
            || ( in_array('module_news',  $this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_MODULES_NEWS)) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();
        }

        $this->doorGets->Form = new Formulaire('modules_editnews');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }

    public function editsharedlinksAction() {
        
        if (!in_array('module_sharedlinks',$this->doorGets->user['liste_module_interne'])
            || ( in_array('module_sharedlinks',  $this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_MODULES_SHAREDLINKS)) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();
        }

        $this->doorGets->Form = new Formulaire('modules_editnews');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }
    
    public function editblogAction() {
        
        if (!in_array('module_blog',$this->doorGets->user['liste_module_interne'])
            || ( in_array('module_blog',  $this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_MODULES_BLOG)) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();
        }

        $this->doorGets->Form = new Formulaire('modules_editblog');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }

    public function editshopAction() {
        
        if (!in_array('module_shop',$this->doorGets->user['liste_module_interne'])
            || ( in_array('module_shop',  $this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_MODULES_SHOP)) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();
        }

        $this->doorGets->Form = new Formulaire('modules_editshop');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }

    public function editonepageAction() {
        
        if (!in_array('module_onepage',$this->doorGets->user['liste_module_interne'])
            || ( in_array('module_onepage',  $this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_MODULES_ONEPAGE)) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();
        }

        $this->doorGets->Form = new Formulaire('modules_editonepage');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }
    
    public function editinboxAction() {
        
        if (!in_array('module_inbox',$this->doorGets->user['liste_module_interne'])
            || ( in_array('module_inbox',  $this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_MODULES_CONTACT)) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();
        }

        $this->doorGets->Form = new Formulaire('modules_editinbox');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }
    
    public function editlinkAction() {
        
        if (!in_array('module_link',$this->doorGets->user['liste_module_interne'])
            || ( in_array('module_link',  $this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_MODULES_LINK)) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();
        }

        $this->doorGets->Form = new Formulaire('modules_editlink');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }
    
    public function editvideoAction() {
        
        if (!in_array('module_video',$this->doorGets->user['liste_module_interne'])
            || ( in_array('module_video',  $this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_MODULES_VIDEO)) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();
        }

        $this->doorGets->Form = new Formulaire('modules_editvideo');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }
    
    public function editimageAction() {
        
        if (!in_array('module_image',$this->doorGets->user['liste_module_interne'])
            || ( in_array('module_image',  $this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_MODULES_IMAGE)) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();
        }

        $this->doorGets->Form = new Formulaire('modules_editimage');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }
    
    public function editfaqAction() {
        
        if (!in_array('module_faq',$this->doorGets->user['liste_module_interne'])
            || ( in_array('module_faq',  $this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_MODULES_FAQ)) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();
        }

        $this->doorGets->Form = new Formulaire('modules_editfaq');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }
    
    public function editpartnerAction() {
        
        if (!in_array('module_partner',$this->doorGets->user['liste_module_interne'])
            || ( in_array('module_partner',  $this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_MODULES_PARTNER)) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();
        }

        $this->doorGets->Form = new Formulaire('modules_editpartner');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }
    
    public function editgenformAction() {
        
        if (!in_array('module_genform',$this->doorGets->user['liste_module_interne'])
            || ( in_array('module_genform',  $this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_WIDGET_FORM)) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();
        }

        $this->doorGets->Form = new Formulaire('modules_editgenform');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }
    
    public function editblockAction() {
        
        if (!in_array('module_block',$this->doorGets->user['liste_module_interne'])
            || ( in_array('module_block',  $this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_WIDGET_BLOCK)) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();
        }

        $this->doorGets->Form = new Formulaire('modules_editblock');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }

    public function editsurveyAction() {
        
        if (!in_array('module_survey',$this->doorGets->user['liste_module_interne'])
            || ( in_array('module_survey',  $this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_WIDGET_SURVEY)) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();
        }

        $this->doorGets->Form = new Formulaire('modules_editsurvey');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }

    public function editcarouselAction() {
        
        if (!in_array('module_carousel',$this->doorGets->user['liste_module_interne'])
            || ( in_array('module_carousel',  $this->doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_WIDGET_BLOCK)) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();
        }

        $this->doorGets->Form = new Formulaire('modules_editcarousel');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }

    public function deleteAction() {
        
        $this->doorGets->Form = new Formulaire('modules_delete');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }
    
}
