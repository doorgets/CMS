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


class ModuleCategoryView extends doorGetsUserModuleOrderView {
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);

    }
    
    public function getContent() {
        
        $out = '';
        
        $lgActuel       =$this->doorGets->getLangueTradution();
        $moduleInfos    = $this->doorGets->moduleInfos($this->doorGets->Uri,$lgActuel);
        $this->doorGets->loadCategories($moduleInfos['uri']);
        $this->doorGets->categorieSimple[0] = '-- '.$this->doorGets->__('Ancune').' --';
        
        $Categories = $this->doorGets->getAllCategories($this->doorGets->Uri);
        
        $categoriesOptions = $this->doorGets->getMenuCategoriesOptions(0,0,$Categories);
        $categoriesOptions[0] = '-- '.$this->doorGets->__('Ancune').' --';
        
        $menuCategories = $this->doorGets->getMenuCategories(0,0,$Categories);
        
        
        $Rubriques = array(
            
            'index'         => $this->doorGets->__('Index des catégories'),
            'add'           => $this->doorGets->__('Ajouter une catégorie'),
            'edit'          => $this->doorGets->__('Modifier une catégorie'),
            'delete'        => $this->doorGets->__('Supprimer une catégorie'),
            
        );
        
        // get Content for edit / delete
        $params = $this->doorGets->Params();
        if (array_key_exists('id',$params['GET'])) {
            
            $id = $params['GET']['id'];
            $isContent = $this->doorGets->dbQS($id,'_categories');
            
            if (!empty($isContent)) {
                
                if ($lgGroupe = @unserialize($isContent['groupe_traduction'])) {
                    
                    $idLgGroupe = $lgGroupe[$lgActuel];
                    
                    $isContentTraduction = $this->doorGets->dbQS($idLgGroupe,'_categories_traduction');
                    if (!empty($isContentTraduction)) {
                        
                        $isContent = array_merge($isContent,$isContentTraduction);
                        
                    }
                    
                }
                
            }
            
        }
        
        if (array_key_exists($this->Action,$Rubriques) )
        {
            switch($this->Action) {
                
                case 'index':
                    
                    $all = $menuCategories;
                    $nbStringCount = '';
                    $cAll = count($all);
                    
                    if ($cAll > 4) {
                        $nbStringCount = '<b>'.$cAll.' '.$this->doorGets->__('Catégories').'<b>';
                    }
                    
                    $block = new BlockTable();
                    $block->setClassCss('doorgets-listing');
                    
                    if ($cAll != 0) {
                        
                        
                        $block->addTitle($nbStringCount,'titre','first-title td-title left' );
                        $block->addTitle('','topup','td-title');
                        $block->addTitle('','topbottom','td-title');
                        $block->addTitle('','edit','td-title');
                        $block->addTitle('','delete','td-title');
                        
                        foreach($all as $Categorie) {
                            
                            
                            
                            $cResultsInt = (int) $menuCategories[$Categorie['id']]['nb_brother'];
                            
                            $urlMovedown = '';
                            if ($Categorie['ordre'] != $cResultsInt && $cResultsInt !== 0) {
                                $urlMovedown = $this->doorGets->movePositionCategories('down','_categories',$Categorie['id'],$Categorie['id_parent'],$Categorie['ordre'],$cResultsInt,'cat-order-'.$Categorie['level']);
                            }
                            $urlMoveup = '';
                            if ($Categorie['ordre'] != 1 && $cResultsInt !== 0) {
                                $urlMoveup = $this->doorGets->movePositionCategories('up','_categories',$Categorie['id'],$Categorie['id_parent'],$Categorie['ordre'],$cResultsInt,'cat-order-'.$Categorie['level']);
                            }
                            
                            $urlAction = './?controller=modulecategory&uri='.$this->doorGets->Uri.'&id='.$Categorie['id'].'&lg='.$lgActuel;
                            
                            $urlVoirTitle = '<a class="cat-img-'.$Categorie['level'].'"  title="'.$this->doorGets->__('Modifier').'" href="'.$urlAction.'&action=edit">';
                            $urlVoirTitle .= '<img src="'.BASE_IMG.'list-rubrique.png'.'" style="width: 25px;height: 25px;vertical-align: middle;margin-right: 5px;float:left;">';
                            $urlVoirTitle .= $Categorie['nom'].' <small class="badge pull-right badge-lg">'.$Categorie['count'].'</small>';
                            $urlVoirTitle .= '</a>';
                            //$urlVoirTitle .= '<span class="doorGets-sub-title-categorie"> '.$Categorie['titre'].'</span>';
                            
                            $urlDelete = '<a title="'.$this->doorGets->__('Supprimer').'" href="'.$urlAction.'&action=delete"><b class="glyphicon glyphicon-remove red"></b></a>';
                            $urlEdit = '<a title="'.$this->doorGets->__('Modifier').'" href="'.$urlAction.'&action=edit"><b class="glyphicon glyphicon-pencil green-font"></b></a>';
                            
                            $classLevel = 'tb-level-'.$Categorie['level'];
                            
                            $block->addContent('titre',$urlVoirTitle,''.$classLevel );
                            $block->addContent('topbottom',$urlMovedown,'tb-30 center '.$classLevel);
                            $block->addContent('topup',$urlMoveup,'tb-30 center'.$classLevel);
                            $block->addContent('edit',$urlEdit,'tb-30 center'.$classLevel);
                            $block->addContent('delete',$urlDelete,'tb-30 center'.$classLevel);
                        }
                    
                    }
                    
                    break;
                
                
                case 'delete':
                    
                    $isArcticleIn = $this->doorGets->dbQ("SELECT * FROM ".$this->doorGets->Table." WHERE categorie = '".$isContent['id_cat']."' LIMIT 1 ");
                    
                    break;
            }
            
            $ActionFile = 'modules/category/user_category_'.$this->Action;
            
            $tpl = Template::getView($ActionFile);
            ob_start(); if (is_file($tpl)) { include $tpl; } $out .= ob_get_clean();
            
        }
        
        return $out;
        
    }
    
}