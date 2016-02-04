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

// Check if connected and print header
if (!empty($User)  )
{
    
    $tplHeader = Template::getView('user/user_header'); include $tplHeader;

    $tplChangeLangue = Template::getView('user/user_changelangue');
    ob_start(); include $tplChangeLangue; $outChangeLangue = ob_get_clean();
    

    $modules = $allModules = $doorGets->loadModules(true,true);
    $modulesCanShow = $allModules = $doorGets->loadModules(true,true,Constant::$modulesCanShow);

    $modulesBlocks      = $doorGets->loadModulesBlocks(true);
    $modulesCarousel    = $doorGets->loadModulesCarousel(true);
    $modulesGenforms    = $doorGets->loadModulesGenforms(true);

    $canAddType = Constant::$modulesCanAdd;
    
    $iCountContents = 0;
    
    foreach($modules as $k => $v) {
        
        $allModules[$k]['url_edit'] = "?controller=modules&action=edit".$v['type']."&id=".$v['id'];
        
        if (!in_array($v['type'],$canAddType)) {
            
            unset($modules[$k]);
            $allModules[$k]['count']    = '';
            $allModules[$k]['url']      = "?controller=module".$v['type']."&uri=".$v['uri'];
            
            
        }else{
            
            $allModules[$k]['count']    = $doorGets->getCountTable('_m_'.$doorGets->getRealUri($v['uri']));
            $allModules[$k]['url']      = "?controller=module".$v['type']."&uri=".$v['uri'];
            
        }
        
        if ($v['type'] === 'inbox') {
            
            $allModules[$k]['count']    = $doorGets->getCountTable('_dg_inbox',array(array('key'=>'uri_module','type'=>'=','value'=>$v['uri'])));
            $allModules[$k]['url']      = "?controller=inbox&q_uri_module=".$v['uri'];
        }
        
        
        $iCountContents += $allModules[$k]['count'];
    }

    foreach($modulesBlocks as $k => $v) {

        $modulesBlocks[$k]['count']    = 1;
        $modulesBlocks[$k]['url']      = "?controller=module".$v['type']."&uri=".$v['uri'];

    }

    foreach($modulesCarousel as $k => $v) {
       $modulesCarousel[$k]['count']    = 1;
       $modulesCarousel[$k]['url']      = "?controller=module".$v['type']."&uri=".$v['uri'];
    }
    
    foreach($modulesGenforms as $k => $v) {

        $modulesGenforms[$k]['count']    = 1;
        $modulesGenforms[$k]['url']      = "?controller=module".$v['type']."&uri=".$v['uri'];

    }

    $editMode = false;
    // include config/modules.php 
    include CONFIG.'modules.php';
    
    $urlToHome = URL;
    $cLanguages = count($doorGets->allLanguagesWebsite);

    if ($cLanguages > 1 && array_key_exists($doorGets->myLanguage, $doorGets->allLanguagesWebsite)) {
        $urlToHome = $urlToHome.'t/'.$doorGets->myLanguage.'/';
    }

    $tplRubrique = Template::getView('user/user_rubrique');
    include $tplRubrique;

?>
<div id="wrapper">
<?php
    $tplRubrique = Template::getView('user/user_rubrique_left');
    include $tplRubrique; 
?>  <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div id="page-content-wrapper-content">
                        <?php echo FlashInfo::get(); ?> 
                        <?php echo $doorGets->Controller()->getContent(); ?>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

}else{

    // Flash info
    echo FlashInfo::get();    
    
    $tplHeader = Template::getView('index_header');
    include $tplHeader;
    
    echo  $doorGets->Controller()->getContent();
}



