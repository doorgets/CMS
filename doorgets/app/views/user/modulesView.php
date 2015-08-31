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


class ModulesView extends doorGetsUserView{
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);
        
    }
    
    public function getContent() {
        
        $out = '';
        
        $lgActuel = $this->doorGets->getLangueTradution();
        
        // Init action
        $Rubriques = array(
            
            'index'                 => $this->doorGets->__('Index'),
            'addblock'              => $this->doorGets->__('Ajouter'),
            'addcarousel'           => $this->doorGets->__('Ajouter'),
            'addblog'               => $this->doorGets->__('Ajouter'),
            'addpage'               => $this->doorGets->__('Ajouter'),
            'addgendata'            => $this->doorGets->__('Ajouter'),
            'addgenform'            => $this->doorGets->__('Ajouter'),
            'addmultipage'          => $this->doorGets->__('Ajouter'),
            'addinbox'              => $this->doorGets->__('Ajouter'),
            'addlink'               => $this->doorGets->__('Ajouter'),
            'addnews'               => $this->doorGets->__('Ajouter'),
            'addsharedlinks'        => $this->doorGets->__('Ajouter'),
            'addimage'              => $this->doorGets->__('Ajouter'),
            'addvideo'              => $this->doorGets->__('Ajouter'),
            'addfaq'                => $this->doorGets->__('Ajouter'),
            'addpartner'            => $this->doorGets->__('Ajouter'),
            'editblock'             => $this->doorGets->__('Modifier'),
            'editcarousel'          => $this->doorGets->__('Modifier'),
            'editblog'              => $this->doorGets->__('Modifier'),
            'editpage'              => $this->doorGets->__('Modifier'),
            'editmultipage'         => $this->doorGets->__('Modifier'),
            'editinbox'             => $this->doorGets->__('Modifier'),
            'editgenform'           => $this->doorGets->__('Modifier'),
            'editlink'              => $this->doorGets->__('Modifier'),
            'editnews'              => $this->doorGets->__('Modifier'),
            'editsharedlinks'       => $this->doorGets->__('Modifier'),
            'editimage'             => $this->doorGets->__('Modifier'),
            'editvideo'             => $this->doorGets->__('Modifier'),
            'editfaq'               => $this->doorGets->__('Modifier'),
            'editpartner'           => $this->doorGets->__('Modifier'),
            'delete'                => $this->doorGets->__('Supprimer'),
            'type'                  => $this->doorGets->__('Chox du module'),
            'massdelete'            => $this->doorGets->__('Supprimer par groupe'),
            
        );
        
        // get Content for edit / delete
        $params = $this->doorGets->Params();
        if (array_key_exists('id',$params['GET']) && !array_key_exists('uri',$params['GET'])) {
            
            $id = $params['GET']['id'];
            $isContent = $this->doorGets->dbQS($id,'_modules');
            
            if (!empty($isContent)) {
                
                $lgGroupe = @unserialize($isContent['groupe_traduction']);
                $idLgGroupe = $lgGroupe[$lgActuel];
                
                $isContentTraduction = $this->doorGets->dbQS($idLgGroupe,'_modules_traduction');
                if (!empty($isContentTraduction)) {
                    unset($isContentTraduction['id']);
                    $isContent = array_merge($isContent,$isContentTraduction);
                }
                
                $imageIcone = BASE_DATA.'/_gestion/'.$isContent['image'];
            
                if (!is_file($imageIcone)) {
                    $imageIcone = BASE_IMG.'/ico_module.png';
                }
                
                $isActiveModule = '';
                if (!empty($isContent['active'])) { $isActiveModule = 'checked'; }

                $isPasswordModule = '';
                if (!empty($isContent['with_password'])) { $isPasswordModule = 'checked'; }

                $isAuthorBadge = '';
                if (array_key_exists( 'author_badge', $isContent) && !empty($isContent['author_badge'])) { $isAuthorBadge = 'checked'; }
                
                $isActiveNotification = '';
                if (!empty($isContent['notification_mail'])) { $isActiveNotification = 'checked'; }
                
                $isPublicModule = '';
                if (!empty($isContent['public_module'])) { $isPublicModule = 'checked'; }
                
                $isPublicComment = '';
                if (!empty($isContent['public_comment'])) { $isPublicComment = 'checked'; }
                
                $isPublicAdd = '';
                if (!empty($isContent['public_add'])) { $isPublicAdd = 'checked'; }
                
                $isHomePage = '';
                if (!empty($isContent['is_first'])) { $isHomePage = 'checked'; }
                
                $this->isContent = $isContent;

            }
            
        }
        
        // Init variables form
        $numGroupe = array();
        for($i=1;$i<100;$i++) {
            $numGroupe[$i] = $i;
        }
        
        $editMode = true;
        // include config/modules.php 
        include CONFIG.'modules.php';
        
        $arrayEmpty = array('' => ' -------' );
        $notifications = $this->doorGets->getAllEmailNotifications();
        $allNotifications = array_merge($arrayEmpty,$notifications);
        
        $ouinon = $this->doorGets->getArrayForms();
        
        $modules = $allModules = $this->doorGets->loadModules(true,true);

        $modulesBlocks      = $this->doorGets->loadModulesBlocks(true);
        $modulesGenforms    = $this->doorGets->loadModulesGenforms(true);

        $canAddType = array('blog','news','multipage','video','faq','image','partner','genform','sharedlinks');
        $moduleType = array('page','blog','news','multipage','video','faq','image','partner','inbox','sharedlinks');
        $iCountContents = 0;
        
        $_uri_module = str_replace('add', '', $this->Action);
        $_uri_module = str_replace('edit', '', $_uri_module);

        $__uri = $_uri_module.'/';

        (in_array($_uri_module, $moduleType)) ? $_type = 'modules/'  : $_type = 'widgets/';

        if (!array_key_exists($_uri_module, $liste)) { 
            $__uri = $_type = '';
        } 

        foreach($modules as $k => $v) {
            
            $allModules[$k]['url_edit'] = "?controller=modules&action=edit".$v['type']."&id=".$v['id'];
            
            if (!in_array($v['type'],$canAddType)) {
                
                unset($modules[$k]);
                $allModules[$k]['count']    = '';
                $allModules[$k]['url']      = "?controller=module".$v['type']."&uri=".$v['uri'];
                
                
            }else{
                
                $allModules[$k]['count']    = $this->doorGets->getCountTable('_m_'.$v['uri']);
                $allModules[$k]['url']      = "?controller=module".$v['type']."&uri=".$v['uri'];
                
            }
            
            if ($v['type'] === 'inbox') {
                
                $allModules[$k]['count']    = $this->doorGets->getCountTable('_dg_inbox',array(array('key'=>'uri_module','type'=>'=','value'=>$v['uri'])));
                $allModules[$k]['url']      = "?controller=inbox&q_uri_module=".$v['uri'];
            }
            
            if ($v['type'] === 'genform') {
                
                $allModules[$k]['count']    = $this->doorGets->getCountTable('_m_'.$v['uri']);
                $allModules[$k]['url']      = "?controller=module".$v['type']."&uri=".$v['uri'];
            }
            
            $iCountContents += $allModules[$k]['count'];
        }

        $htmlFormAddTop = 'user/modules/user_modules_form_add';
        $tpl = Template::getView($htmlFormAddTop);  ob_start();if (is_file($tpl)) { include $tpl; } $getHtmlFormAddTop = ob_get_clean();


        $htmlFormAddTop = 'user/modules/user_modules_form_edit';
        $tpl = Template::getView($htmlFormAddTop);  ob_start();if (is_file($tpl)) { include $tpl; } $getHtmlFormEditTop = ob_get_clean();

        if (array_key_exists($this->Action,$Rubriques) )
        {
            switch($this->Action) {
                
                case 'addgenform':
                    
                    $Form = $this->doorGets->Form->i;
                    $label = 'input-label';
                    $cLabel = strlen($label);
                    $iLabel = 0;
                    if (!empty($Form)) {
                        foreach($Form as $k=>$v) {
                            $restLabel = substr($k,0,$cLabel);
                            if ($restLabel === $label) {
                                $iLabel++;
                            }
                        }
                        
                    }
                    
                    break;
                
                case 'editgenform':
                    
                    
                    $isContent['extras'] = unserialize($isContent['extras']);
                    
                    $this->genArraysForm($isContent['extras']);
                    
                    $isSendEmailTo = '';
                    if ($isContent['notification_mail'] === '1') { $isSendEmailTo = 'checked'; }
                    $isSendEmailUser = '';
                    if ($isContent['send_mail_user'] === '1') { $isSendEmailUser = 'checked'; }
                    $isActiveRecaptcha = '';
                    if ($isContent['recaptcha'] === '1') { $isActiveRecaptcha = 'checked'; }
                    
                    $Form = $this->doorGets->Form->i;
                    $label = 'input-label';
                    $cLabel = strlen($label);
                    $iLabel = 0;
                    
                    if (!empty($Form)) {
                        foreach($Form as $k=>$v) {
                            $restLabel = substr($k,0,$cLabel);
                            if ($restLabel === $label) {
                                $iLabel++;
                            }
                        }
                        
                    }
                    
                    break;
                
                case 'type':

                    $editMode = false;
                    // include config/modules.php 
                    include CONFIG.'modules.php';

                    break;

                case 'index':
                    
                    $out = '';
                    
                    // Modules without blocks and genforms
                    
                    $nbStringCount = '';
                    $per = 300;
                    $ini = 0;
                    
                    $cResultsInt = $this->doorGets->getCountTable('_modules',array()," WHERE type != 'block' AND type != 'genform'");
                    
                    $sqlLimit = " WHERE type != 'block' AND type != 'genform' ORDER BY type  LIMIT ".$ini.",".$per;
                    
                    $all = $this->doorGets->dbQA('_modules',$sqlLimit);
                    foreach ($all as $key => $value) {
                        if (!array_key_exists($value['id'], $allModules)) {
                            unset($all[$key]);
                        }
                    }
                    sort($all);

                    $cAll = count($all);
                    if ($cAll > 4) {
                        $nbStringCount = $cResultsInt.' '.$this->doorGets->__('Modules');
                    }
                    
                    $block = new BlockTable();
                    
                    $block->setClassCss('doorgets-listing');
                    
                    $block->addTitle('','statut','td-title');
                    $block->addTitle('','image','td-title');
                    $block->addTitle('','titre','first-title td-title left');
                    $block->addTitle('','rubrique','td-title');
                    $block->addTitle('','gerer','td-title');
                    $block->addTitle('','editer','td-title');
                    $block->addTitle('','supprimer','td-title');
                    
                    $isHomePageIn = '';
                    
                    for($i=0;$i<$cAll;$i++) {
                        
                        
                        $lgGroupe = unserialize($all[$i]['groupe_traduction']);
                        $idTraduction = $lgGroupe[$lgActuel];
                        
                        $isContentTraduction = $this->doorGets->dbQS($idTraduction,'_modules_traduction');
                        
                        $cResultsComInt = '';
                        $cResultsContentsInt = '';
                        $cResultsCatInt = '';
                        $cResultsRub = '-';
                        $idRub = 0;
                        
                        if (
                            $all[$i]['type'] !== 'page'  
                            && $all[$i]['type'] !== 'inbox'
                            && $all[$i]['type'] !== 'block'
                            && $all[$i]['type'] !== 'link' 
                       ) {
                            
                            $iComments = $this->doorGets->dbQ("SELECT COUNT(*) as counter FROM _dg_comments WHERE uri_module = '".$all[$i]['uri']."' ");
                            $cResultsComInt = (int)$iComments[0]['counter'];
                            
                            $iContents = $this->doorGets->dbQ("SELECT COUNT(*) as counters FROM _m_".$this->doorGets->getRealUri($all[$i]['uri'])."  ");
                            $cResultsContentsInt = (int)$iContents[0]['counters'];
                            
                            $iCat = $this->doorGets->dbQ("SELECT COUNT(*) as counters FROM _categories WHERE uri_module = '".$all[$i]['uri']."' ");
                            $cResultsCatInt = (int)$iCat[0]['counters'];
                            
                            $aRubrique = $this->doorGets->dbQS($all[$i]['id'],'_rubrique','idModule');
                            
                            if (!empty($aRubrique)) {
                                $cResultsRub = $aRubrique['name'];
                                $idRub = $aRubrique['id'];
                            }
                            
                        }
                        
                        if ($all[$i]['type'] === 'page' || $all[$i]['type'] === 'link' || $all[$i]['type'] === 'block' || $all[$i]['type'] === 'genform' ) {
                            
                            $aRubrique = $this->doorGets->dbQS($all[$i]['id'],'_rubrique','idModule');
                            if (!empty($aRubrique)) {
                                $cResultsRub = $aRubrique['name'];
                                $idRub = $aRubrique['id'];
                            }
                            
                        }
                        
                        
                        if ($all[$i]['type'] === 'inbox') {
                            
                            $iContents = $this->doorGets->dbQ("SELECT COUNT(*) as counters FROM _dg_inbox WHERE uri_module = '".$all[$i]['uri']."'  ");
                            $cResultsContentsInt = (int)$iContents[0]['counters'];
                            
                            $aRubrique = $this->doorGets->dbQS($all[$i]['id'],'_rubrique','idModule');
                            if (!empty($aRubrique)) {
                                $cResultsRub = $aRubrique['name'];
                                $idRub = $aRubrique['id'];
                            }
                            
                        }
                        
                        
                        $isFirstr = $imgFirst = '';
                        if ($all[$i]['is_first']) {
                            
                            $imgFirst = '<img src="'.BASE_IMG.'home.png" class="ico-home" />';
                            $isHomePageIn = 1;
                            
                        }
                        
                        $imgRubrique = '<img src="'.BASE_IMG.'list-rubrique.png" class="px20 doorgets-img-ico" />';
                        
                        $ImageStatut = BASE_IMG.'puce-orange.png';
                        if ($all[$i]['active'] == '1' AND $cResultsRub !== '-')
                        {
                            
                            $ImageStatut = BASE_IMG.'puce-verte.png';
                            
                        }elseif ($all[$i]['active'] == '0') {
                            
                            $ImageStatut = BASE_IMG.'puce-rouge.png';
                            
                        }
                        
                        
                        $imageIcone = BASE_IMG.'ico_module.png';

                        if (array_key_exists($all[$i]['type'],$listeInfos)) {$imageIcone = $listeInfos[$all[$i]['type']]['image'];}
                        
                        if ($all[$i]['type'] === 'block' || $all[$i]['type'] === 'genform') { $ImageStatut = BASE_IMG.'puce-verte.png'; }
                        
                        if (!empty($isContentTraduction)) {
                            
                            $tGerer = $this->doorGets->__("Gérer le contenu du module").' '.$all[$i]['uri'];
                            $tEditer = $this->doorGets->__("Paramètres du module").' '.$all[$i]['uri'];
                            $tDel = $this->doorGets->__("Supprimer le module").' '.$all[$i]['uri'];
                            
                            $urlGerer = '<a title="'.$tGerer.'" href="./?controller=module'.$all[$i]['type'].'&uri='.$all[$i]['uri'].'&lg='.$lgActuel.'"><b class="glyphicon glyphicon-pencil green-font"></b>';
                            $urlEditer = '<a title="'.$tEditer.'" href="./?controller=modules&action=edit'.$all[$i]['type'].'&id='.$all[$i]['id'].'&lg='.$lgActuel.'"><b class="glyphicon glyphicon-cog"></b>';
                            $urlSupprimer = '<a title="'.$tDel.'" href="./?controller=modules&action=delete&id='.$all[$i]['id'].'&lg='.$lgActuel.'"><b class="glyphicon glyphicon-remove red"></b></a>';
                            
                            $urlImage = '<a title="'.$tGerer.'"  href="./?controller=module'.$all[$i]['type'].'&uri='.$all[$i]['uri'].'&lg='.$lgActuel.'" title="'.ucfirst($isContentTraduction['nom']).'" ><img src="'.$imageIcone.'" class="px36" alt="'.ucfirst($isContentTraduction['nom']).'" ></a>';
                            $urlTitre = '<a title="'.$tGerer.'"  href="./?controller=module'.$all[$i]['type'].'&uri='.$all[$i]['uri'].'&lg='.$lgActuel.'" style="font-size:12pt;padding:8px;"  >'.$imgFirst.'<b> '.ucfirst($isContentTraduction['titre']).'</b>';
                            if ($all[$i]['type'] === 'inbox') {
                                $urlImage = '<a title="'.$tGerer.'"  href="./?controller='.$all[$i]['type'].'&q_uri_module='.$all[$i]['uri'].'" title="'.ucfirst($isContentTraduction['nom']).'" ><img src="'.$imageIcone.'" class="px36" ></a>';
                                $urlTitre = '<a title="'.$tGerer.'"  href="./?controller='.$all[$i]['type'].'&q_uri_module='.$all[$i]['uri'].'" style="font-size:12pt;padding:8px;"  >'.$imgFirst.' <b>'.ucfirst($isContentTraduction['titre']).'</b>';
                                $urlGerer = '<a title="'.$tGerer.'"  href="./?controller='.$all[$i]['type'].'&q_uri_module='.$all[$i]['uri'].'"><b class="glyphicon glyphicon-pencil green-font"></b>';
                            
                            }
                            $urlStatut = '<img src="'.$ImageStatut.'" style="vertical-align: middle;" >';
                            $urlType = '<em>'.$all[$i]['type'].'</em>';
                            $urlName = '<small><em>'.$all[$i]['uri'].'</em></small>';
                            
                            $urlRubrique = '<a class="size12" href="./?controller=rubriques&action=edit&id='.$idRub.'">'.$imgRubrique.' '.$cResultsRub.'</a>';
                            if ($cResultsRub === '-') { $urlRubrique = ''; }
                            
                            if (!empty($cResultsContentsInt)) {
                                $urlTitre = $urlTitre.' '.'<span class="badge right">'.$cResultsContentsInt.'</span>';
                            }
                            
                            $block->addContent('statut',$urlStatut,'tb-30');
                            $block->addContent('image',$urlImage,'tb-30');
                            $block->addContent('titre',$urlTitre);
                            $block->addContent('rubrique',$urlRubrique,'tb-250 ');
                            $block->addContent('gerer',$urlGerer,'tb-30');
                            $block->addContent('editer',$urlEditer,'tb-30');
                            $block->addContent('supprimer',$urlSupprimer,'tb-30');
                            
                            
                            
                        }
                        
                    }
                    
                    // Modules  blocks, genforms
                    
                    $nbStringCount = '';
                    $per = 300;
                    $ini = 0;
                    
                    $cResultsInt = $this->doorGets->getCountTable('_modules',array()," WHERE type = 'block' OR type = 'genform' ");
                    
                    $sqlLimit = " WHERE type = 'block' OR type = 'genform' ORDER BY type  LIMIT ".$ini.",".$per;
                    
                    $allWidgets = $this->doorGets->dbQA('_modules',$sqlLimit);
                    foreach ($allWidgets as $key => $value) {
                        if (!array_key_exists($value['id'], $modulesBlocks) && !array_key_exists($value['id'], $modulesGenforms)) {
                            unset($allWidgets[$key]);
                        }
                    }
                    sort($allWidgets);
                    $callWidgets = count($allWidgets);
                    if ($callWidgets > 4) {
                        $nbStringCount = $cResultsInt.' '.$this->doorGets->__('Modules');
                    }
                    
                    $blockWidgets = new BlockTable();
                    
                    $blockWidgets->setClassCss('doorgets-listing');
                    
                    $blockWidgets->addTitle('','statut','td-title');
                    $blockWidgets->addTitle('','image','td-title');
                    $blockWidgets->addTitle('','titre','first-title td-title left');
                    //$blockWidgets->addTitle('','rubrique','td-title');
                    $blockWidgets->addTitle('','gerer','td-title');
                    $blockWidgets->addTitle('','editer','td-title');
                    $blockWidgets->addTitle('','supprimer','td-title');
                    
                    $isHomePageIn = '';
                    
                    for($i=0;$i<$callWidgets;$i++) {
                        
                        $lgGroupe = unserialize($allWidgets[$i]['groupe_traduction']);
                        $idTraduction = $lgGroupe[$lgActuel];
                        
                        $isContentTraduction = $this->doorGets->dbQS($idTraduction,'_modules_traduction');
                        
                        $cResultsComInt = '';
                        $cResultsContentsInt = '';
                        $cResultsCatInt = '';
                        $cResultsRub = '-';
                        $idRub = 0;
                        
                        
                        $imageIcone = BASE_IMG.'ico_module.png';
                        if (array_key_exists($allWidgets[$i]['type'],$listeInfos)) {$imageIcone = $listeInfos[$allWidgets[$i]['type']]['image'];}
                        

                        if (!empty($isContentTraduction)) {
                            
                            $tGerer = $this->doorGets->__("Gérer le contenu du module").' '.$allWidgets[$i]['uri'];
                            $tEditer = $this->doorGets->__("Paramètres du module").' '.$allWidgets[$i]['uri'];
                            $tDel = $this->doorGets->__("Supprimer le module").' '.$allWidgets[$i]['uri'];
                            
                            $urlGerer = '<a title="'.$tGerer.'" href="./?controller=module'.$allWidgets[$i]['type'].'&uri='.$allWidgets[$i]['uri'].'&lg='.$lgActuel.'"><b class="glyphicon glyphicon-pencil green-font"></b>';
                            $urlEditer = '<a title="'.$tEditer.'" href="./?controller=modules&action=edit'.$allWidgets[$i]['type'].'&id='.$allWidgets[$i]['id'].'&lg='.$lgActuel.'"><b class="glyphicon glyphicon-cog"></b>';
                            $urlSupprimer = '<a title="'.$tDel.'" href="./?controller=modules&action=delete&id='.$allWidgets[$i]['id'].'&lg='.$lgActuel.'"><b class="glyphicon glyphicon-remove red"></b></a>';
                            
                            $urlImage = '<a title="'.$tGerer.'"  href="./?controller=module'.$allWidgets[$i]['type'].'&uri='.$allWidgets[$i]['uri'].'&lg='.$lgActuel.'" title="'.ucfirst($isContentTraduction['nom']).'" ><img src="'.$imageIcone.'" class="px36" alt="'.ucfirst($isContentTraduction['nom']).'" ></a>';
                            $urlTitre = '<a title="'.$tGerer.'"  href="./?controller=module'.$allWidgets[$i]['type'].'&uri='.$allWidgets[$i]['uri'].'&lg='.$lgActuel.'" style="font-size:12pt;padding:8px;"  ><b> '.ucfirst($isContentTraduction['titre']).'</b>';
                            
                            $urlStatut = '';
                            $urlType = '<em>'.$allWidgets[$i]['type'].'</em>';
                            $urlName = '<small><em>'.$allWidgets[$i]['uri'].'</em></small>';
                            
                            $urlRubrique = '<a href="./?controller=rubriques&action=edit&id='.$idRub.'">'.$cResultsRub.'</a>';
                            if ($cResultsRub === '-') { $urlRubrique = ''; }
                            
                            if (!empty($cResultsContentsInt)) {
                                $urlTitre = $urlTitre.' '.'<span class="badge right">'.$cResultsContentsInt.'</span>';
                            }
                            
                            $blockWidgets->addContent('statut',$urlStatut,'tb-30');
                            $blockWidgets->addContent('image',$urlImage,'tb-30');
                            $blockWidgets->addContent('titre',$urlTitre);
                            //$blockWidgets->addContent('rubrique',$urlRubrique,'nb-link ');
                            $blockWidgets->addContent('gerer',$urlGerer,'tb-30');
                            $blockWidgets->addContent('editer',$urlEditer,'tb-30');
                            $blockWidgets->addContent('supprimer',$urlSupprimer,'tb-30');
                            
                            
                            
                        }
                        
                    }
                    
                    break;
                
            }
            
            $ActionFile = 'user/modules/'.$_type.$__uri.'user_modules_'.$this->Action;
            $tpl = Template::getView($ActionFile);  ob_start();if (is_file($tpl)) { include $tpl; } $out = $tpl; $out = ob_get_clean();
            
        }
        
        return $out;
        
    }
    
    public function getBoxTitle($displayDelete=false,$displayBox=false,$i=0,$lLabel = '',$lActive = '', $lFilter = '' ,$lCss = '') {
        
        $boxTag = 'user/modules/widgets/genform/user_modules_box_tag_title';
        $tpl = Template::getView($boxTag);  ob_start();if (is_file($tpl)) { include $tpl; } $out = $tpl; $out = ob_get_clean();
            
        return $out;
        
    }
    
    public function getBoxQuotte($displayDelete=false,$displayBox=false,$i=0,$lLabel = '',$lActive = '', $lFilter = '' ,$lCss = '') {
        
        $boxTag = 'user/modules/widgets/genform/user_modules_box_tag_quotte';
        $tpl = Template::getView($boxTag);  ob_start();if (is_file($tpl)) { include $tpl; } $out = $tpl; $out = ob_get_clean();
            
        return $out;
        
    }

    public function getBoxSeparateur($displayDelete=false,$displayBox=false,$i=0,$lLabel = '',$lActive = '', $lFilter = '' ,$lCss = '') {
        
        $boxTag = 'user/modules/widgets/genform/user_modules_box_tag_separateur';
        $tpl = Template::getView($boxTag);  ob_start();if (is_file($tpl)) { include $tpl; } $out = $tpl; $out = ob_get_clean();
            
        return $out;
        
    }
    
    public function getBoxText($type="text",$displayDelete=false,$displayBox=false,$i=0,$lLabel = '',$lValue = '',$lActive = '',$lObli = '', $lFilter = '' , $lInfo = '' , $lCss = '') {
        
        $boxFile = 'user/modules/widgets/genform/user_modules_box_text';
        $tpl = Template::getView($boxFile);  ob_start();if (is_file($tpl)) { include $tpl; } $out = $tpl; $out = ob_get_clean();
        
        return $out;
        
    }
    
    public function getBoxSelect($type="radio",$displayDelete=false,$displayBox=false,$i=0,$lLabel = '',$lValue = '',$lActive = '',$lObli = '',  $lInfo = '' , $lCss = '' , $lListe = '') {
        
        $boxFile = 'user/modules/widgets/genform/user_modules_box_select';
        $tpl = Template::getView($boxFile);  ob_start();if (is_file($tpl)) { include $tpl; } $out = $tpl; $out = ob_get_clean();
        
        return $out;
        
    }
    
    public function getBoxFile($displayDelete=false,$displayBox=false,$i=0,$lLabel = '',$lValue = '',$lActive = '',$lObli = '',  $lInfo = '' , $lCss = '' , $tZip = '',$tPng = '', $tJpg = '', $tGif = '', $tPdf = '', $tSwf = '', $tDoc = '') {
        
        $boxFile = 'user/modules/widgets/genform/user_modules_box_file';
        $tpl = Template::getView($boxFile);  ob_start();if (is_file($tpl)) { include $tpl; } $out = $tpl; $out = ob_get_clean();
        
        return $out;
        
    }
    
    public function genArraysForm($data) {
        
        
        if (!empty($data)) {
            
            $iLabel = count($data);
            for($i=1;$i<$iLabel+1;$i++) {
                
                $this->doorGets->Form->i['input-type-'.$i]    = 'text';
                $this->doorGets->Form->i['input-label-'.$i]       = $data[$i]['label'];
                $this->doorGets->Form->i['input-css-'.$i]         = $data[$i]['css'];
                
            
                switch ($data[$i]['type']) {
                    
                    case 'tag-title':
                        
                        $this->doorGets->Form->i['input-active-'.$i]  = $data[$i]['active'];
                        
                        $this->doorGets->Form->i['input-obligatoire-'.$i] = 'no';
                        $this->doorGets->Form->i['input-info-'.$i]        = '';
                        
                        $this->doorGets->Form->i['input-type-'.$i]    = 'tag-title';
                        $this->doorGets->Form->i['input-filter-'.$i]  = $data[$i]['filtre'];
                        break;
                    
                    case 'tag-quotte':
                        
                        $this->doorGets->Form->i['input-active-'.$i]  = $data[$i]['active'];
                        
                        $this->doorGets->Form->i['input-obligatoire-'.$i] = 'no';
                        $this->doorGets->Form->i['input-info-'.$i]        = '';
                        
                        $this->doorGets->Form->i['input-type-'.$i]    = 'tag-quotte';
                        $this->doorGets->Form->i['input-filter-'.$i]  = $data[$i]['filtre'];
                        break;
                    
                    case 'tag-separateur':
                        
                        $this->doorGets->Form->i['input-active-'.$i]      = $data[$i]['active'];
                        
                        $this->doorGets->Form->i['input-obligatoire-'.$i] = 'no';
                        $this->doorGets->Form->i['input-info-'.$i]        = '';
                        
                        $this->doorGets->Form->i['input-type-'.$i]        = 'tag-separateur';
                        $this->doorGets->Form->i['input-filter-'.$i]      = $data[$i]['filtre'];
                        break;
                    
                    case 'text':
                        
                        $this->doorGets->Form->i['input-active-'.$i]      = $data[$i]['active'];
                        $this->doorGets->Form->i['input-obligatoire-'.$i] = $data[$i]['obligatoire'];
                        $this->doorGets->Form->i['input-info-'.$i]        = $data[$i]['info'];
                        
                        $this->doorGets->Form->i['input-type-'.$i]    = 'text';
                        $this->doorGets->Form->i['input-filter-'.$i]  = $data[$i]['filtre'];
                        $this->doorGets->Form->i['input-value-'.$i]       = $data[$i]['value'];
                        break;
                    
                    case 'textarea':
                        
                        $this->doorGets->Form->i['input-active-'.$i]      = $data[$i]['active'];
                        $this->doorGets->Form->i['input-obligatoire-'.$i] = $data[$i]['obligatoire'];
                        $this->doorGets->Form->i['input-info-'.$i]        = $data[$i]['info'];
                        
                        $this->doorGets->Form->i['input-type-'.$i]    = 'textarea';
                        $this->doorGets->Form->i['input-filter-'.$i]  = '';
                        $this->doorGets->Form->i['input-value-'.$i]       = $data[$i]['value'];
                        break;
                    
                    case 'select':
                        
                        $this->doorGets->Form->i['input-active-'.$i]      = $data[$i]['active'];
                        $this->doorGets->Form->i['input-obligatoire-'.$i] = $data[$i]['obligatoire'];
                        $this->doorGets->Form->i['input-info-'.$i]        = $data[$i]['info'];
                        
                        $this->doorGets->Form->i['input-type-'.$i]    = 'select';
                        $this->doorGets->Form->i['input-liste-'.$i]   = $data[$i]['liste'];
                        $this->doorGets->Form->i['input-value-'.$i]       = $data[$i]['value'];
                        break;
                    
                    case 'checkbox':
                        
                        $this->doorGets->Form->i['input-active-'.$i]      = $data[$i]['active'];
                        $this->doorGets->Form->i['input-obligatoire-'.$i] = $data[$i]['obligatoire'];
                        $this->doorGets->Form->i['input-info-'.$i]        = $data[$i]['info'];
                        
                        $this->doorGets->Form->i['input-type-'.$i]    = 'checkbox';
                        $this->doorGets->Form->i['input-liste-'.$i]   = $data[$i]['liste'];
                        $this->doorGets->Form->i['input-value-'.$i]       = $data[$i]['value'];
                        break;
                    
                    case 'radio':
                        
                        $this->doorGets->Form->i['input-active-'.$i]      = $data[$i]['active'];
                        $this->doorGets->Form->i['input-obligatoire-'.$i] = $data[$i]['obligatoire'];
                        $this->doorGets->Form->i['input-info-'.$i]        = $data[$i]['info'];
                        
                        $this->doorGets->Form->i['input-type-'.$i]    = 'radio';
                        $this->doorGets->Form->i['input-liste-'.$i]   = $data[$i]['liste'];
                        $this->doorGets->Form->i['input-value-'.$i]   = $data[$i]['value'];
                        break;
                    
                    case 'file':
                        
                        $this->doorGets->Form->i['input-active-'.$i]      = $data[$i]['active'];
                        $this->doorGets->Form->i['input-obligatoire-'.$i] = $data[$i]['obligatoire'];
                        $this->doorGets->Form->i['input-info-'.$i]        = $data[$i]['info'];
                        
                        $this->doorGets->Form->i['input-type-'.$i]    = 'file';
                        $this->doorGets->Form->i['input-value-'.$i]   = $data[$i]['value'];
                        
                        $this->doorGets->Form->i['input-zip-'.$i] = $data[$i]['file-type']['zip'];
                        $this->doorGets->Form->i['input-png-'.$i] = $data[$i]['file-type']['png'];
                        $this->doorGets->Form->i['input-jpg-'.$i] = $data[$i]['file-type']['jpg'];
                        $this->doorGets->Form->i['input-gif-'.$i] = $data[$i]['file-type']['gif'];
                        $this->doorGets->Form->i['input-pdf-'.$i] = $data[$i]['file-type']['pdf'];
                        $this->doorGets->Form->i['input-swf-'.$i] = $data[$i]['file-type']['swf'];
                        $this->doorGets->Form->i['input-doc-'.$i] = $data[$i]['file-type']['doc'];
                        
                        break;
                }
            }
            
        }
        
    
    }
    
}
