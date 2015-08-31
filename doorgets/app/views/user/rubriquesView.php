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



class RubriquesView extends doorGetsUserView{
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);
        
    }
    
    public function getContent() {
        
        $out = '';
        
        $Rubriques = array(
            
            'index'         => $this->doorGets->__('Gestion des rubriques'),
            'select'        => $this->doorGets->__('Voir une rubrique'),
            'add'           => $this->doorGets->__('Ajouter une rubrique'),
            'edit'          => $this->doorGets->__('Modifier une rubrique'),
            'delete'        => $this->doorGets->__('Supprimer une rubrique'),
            
        );
        
        $listeModules = $this->doorGets->loadModulesRubrique();
        
        $params = $this->doorGets->Params();
        if (array_key_exists('id',$params['GET'])) {
            
            $id = $params['GET']['id'];
            $isContent = $this->doorGets->dbQS($id,'_rubrique');
            if (empty($isContent)) { return null; }
            $listeModules = $this->doorGets->loadModulesRubrique($isContent['idModule']);
            
        }
        
        $cListeModules = count($listeModules);
        
        $listeModulesForm = array('--');
        $listeModules = $listeModulesForm + $listeModules;
        
        $ouinon = $this->doorGets->getArrayForms();
        
        if (array_key_exists($this->Action,$Rubriques) )
        {
            switch($this->Action) {
                
                case 'index':
                    
                    $nbStringCount = '';
                    $per = 300;
                    $ini = 0;
                    $cResultsInt = $this->doorGets->getCountTable('_rubrique');
                    
                    $sqlLimit = " ORDER BY ordre  LIMIT ".$ini.",".$per;
                    
                    $all = $this->doorGets->dbQA('_rubrique',$sqlLimit);
                    $cAll = count($all);
                    
                    if ($cAll > 4) {
                        $nbStringCount = $cResultsInt.' '.$this->doorGets->__('Rubriques');
                    }
                    
                    $block = new BlockTable();
                    $block->setClassCss('doorgets-listing');
                    
                    if ($cAll != 0) {
                        
                        $block->addTitle($nbStringCount,'titre','first-title td-title');
                        $block->addTitle('','statut','td-title');
                        $block->addTitle('','topup','td-title');
                        $block->addTitle('','topbottom','td-title');
                        $block->addTitle('','edit','td-title');
                        $block->addTitle('','delete','td-title');
                        
                        for($i=0;$i<$cAll;$i++) {
                            
                            $urlStatut = BASE_IMG.'puce-verte.png';
                            
                            $bCss = 'backddd';$nModule = '';$tModule = '';$tiModule = '';
                            $isModule = $this->doorGets->dbQS($all[$i]['idModule'],'_modules');
                            $isModuleTrad = $this->doorGets->dbQS($all[$i]['idModule'],'_modules_traduction','id_module'," AND langue = '".$this->doorGets->myLanguage()."' LIMIT 1 ");
                            if (!empty($isModule) && !empty($isModuleTrad)) {
                                
                                $nModule=$isModule['uri'];
                                $tModule='['.$isModule['type'].']';
                                $tiModule = '<span class="right"><small>'.$all[$i]['name'].' #</small></span> '.$isModuleTrad['nom'].' - '.$isModuleTrad['titre'];
                                $bCss = ' hover';
                                if ($all[$i]['showinmenu'] === '2') {
                                    
                                    $urlStatut = BASE_IMG.'puce-orange.png';
                                    
                                }
                            }else{
                                
                                $tiModule = $all[$i]['name'];
                                if ($all[$i]['showinmenu'] === '2') {
                                    
                                    $urlStatut = BASE_IMG.'puce-rouge.png';
                                    
                                }else{
                                    
                                    $urlStatut = BASE_IMG.'puce-orange.png';
                                    
                                }
                                
                                
                            }
                            
                            $urlStatut = '<img src="'.$urlStatut.'" >';
                            
                            $urlVoirTitle = '<a title="'.$this->doorGets->__('Modifier').'" href="./?controller=rubriques&action=edit&id='.$all[$i]['id'].'"><img src="'.BASE_IMG.'list-rubrique.png'.'" style="width: 20px;height: 20px;vertical-align: middle;margin-right: 5px;"> '.$tiModule.' '.$tModule.'</a>';
                            $urlVoir = '<a title="'.$this->doorGets->__('Modifier').'" href="./?controller=rubriques&action=edit&id='.$all[$i]['id'].'"><b class="glyphicon glyphicon-file"></b></a>';
                            $urlDelete = '<a title="'.$this->doorGets->__('Supprimer').'" href="./?controller=rubriques&action=delete&id='.$all[$i]['id'].'"><b class="glyphicon glyphicon-remove red"></b></a>';
                            $urlEdit = '<a title="'.$this->doorGets->__('Modifier').'" href="./?controller=rubriques&action=edit&id='.$all[$i]['id'].'"><b class="glyphicon glyphicon-pencil green-font"></b></a>';
                            
                            $urlMovedown = '';
                            if ($all[$i]['ordre'] != $cResultsInt) {
                                $urlMovedown = $this->doorGets->movePosition('down','_rubrique',$all[$i]['id'],$all[$i]['ordre'],$cResultsInt);
                            }
                            $urlMoveup = '';
                            if ($all[$i]['ordre'] != 1) {
                                $urlMoveup = $this->doorGets->movePosition('up','_rubrique',$all[$i]['id'],$all[$i]['ordre'],$cResultsInt);
                            }
                            $dateCreation = GetDate::in($all[$i]['date_creation'],1,$this->doorGets->myLanguage());
                            
                            
                            
                            $block->addContent('titre',$urlVoirTitle );
                            $block->addContent('statut',$urlStatut,'center tb-30');
                            $block->addContent('topbottom',$urlMovedown,'center tb-30');
                            $block->addContent('topup',$urlMoveup,'center tb-30');
                            $block->addContent('edit',$urlEdit,'center tb-30');
                            $block->addContent('delete',$urlDelete,'center tb-30');
                        }
                    
                    }
                    
                    break;
                
            }
            
            $ActionFile = 'user/rubriques/user_rubriques_'.$this->Action;
            
            $tpl = Template::getView($ActionFile);
            ob_start();
            if (is_file($tpl)) { include $tpl; }
            
            $out .= ob_get_clean();
            
        }
        
        return $out;
        
    }
    
    
    
    
    
}