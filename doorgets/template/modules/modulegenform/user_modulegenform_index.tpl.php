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


    
 
?>
<div class="doorGets-rubrique-center">
    <div class="doorGets-rubrique-center-title page-header">

    </div>
    <div class="doorGets-rubrique-center-content">
        <legend>
            <span class="create" ><a class="doorGets-comebackform" href="?controller=widgets"><i class="fa fa-undo fa-lg green-c"></i> [{!$this->doorGets->__('Retour')!}]</a></span>
            <span class="create" ><a  href="?controller=modules&action=editgenform&id=[{!$moduleInfos['id']!}]&lg=[{!$lgActuel!}]"><b class="glyphicon glyphicon-cog"></b> [{!$this->doorGets->__('Paramètres')!}]</a></span>
            <img src="[{!BASE_IMG.'mod_genform.png'!}]" title="[{!$this->doorGets->__("Formulaire")!}]" class="doorGets-img-ico px25" />[{!$moduleInfos['titre']!}]
            
        </legend>
        
        <div style="width: 100%;padding: 10px 0 0;border-bottom: solid 1px #ccc;overflow: hidden;">
            
            <div style="overflow: hidden;">
                <div style="float: left;padding: 7px 0 ">
                    <i>
                        [{?(!empty($cAll)):}] [{!($ini+1)!}] [{!$this->doorGets->__("à")!}] [{!$finalPer!}] [{!$this->doorGets->__("sur")!}] [?]
                        <b>[{!$cResultsInt.' '!}] [{?( $cResultsInt > 1 ):}][{!$this->doorGets->__('Pages')!}] [??] [{!$this->doorGets->__('Page')!}] [?]</b>
                        [{?(!empty($q)):}] [{!$this->doorGets->__('pour la recherche : ').' <b>'.$q.'</b>'!}] [?]
                    </i>
                    <span id="doorGets-sort-count">
                        [{!$this->doorGets->__('Par')!}]
                        <a href="[{!$urlPagePosition!}]&gby=10" [{?($per=='10'):}] class="active" [?]>10</a>
                        <a href="[{!$urlPagePosition!}]&gby=20" [{?($per=='20'):}] class="active" [?]>20</a>
                        <a href="[{!$urlPagePosition!}]&gby=50" [{?($per=='50'):}] class="active" [?]>50</a>
                        <a href="[{!$urlPagePosition!}]&gby=100" [{?($per=='100'):}] class="active" [?]>100</a>
                    </span>
                     
                </div>
                <div  class="doorGets-box-search-module">
                    [{!$this->doorGets->Form['_search_filter']->open('post',$urlPageGo,'')!}]
                    [{!$this->doorGets->Form['_search_filter']->submit($this->doorGets->__('Chercher'),'','btn btn-success')!}]
                    <a href="?controller=[{!$this->doorGets->controllerNameNow()!}]&lg=[{!$lgActuel!}]" class="btn btn-danger doorGets-filter-bt" >[{!$this->doorGets->__('Reset')!}]</a>
                </div>
            </div>
            <div class="separateur-tb"></div>
            [{!$block->getHtml()!}]
            [{!$this->doorGets->Form['_search']->close()!}]

            [{?(!empty($cAll)):}]
            
                <br />
                [{!$valPage!}]
                <br /><br />
                
            [??]
               
                [{?(!empty($aGroupeFilter)):}]
                    <div class="alert alert-info">
                        <i class="fa fa-exclamation-triangle"></i> [{!$this->doorGets->__("Aucune donnée trouvé pour votre recherche");}]
                    </div>
                [??]
                    <div class="alert alert-info">
                        <i class="fa fa-exclamation-triangle"></i> [{!$this->doorGets->__("Il n'y a actuellement aucune donnée")!}] 
                    </div>
                [?]
                
            [?] 
        </div>
        <div class="separateur-tb"></div> 
        <div>
            [{!$this->doorGets->__('Utilisation template')!}] : <b>&#123;{!$this->getHtmlForm('[{!$this->doorGets->Uri!}]')!}&#125;</b>
            <div class="separateur-tb"></div>
            [{!$this->doorGets->__('Utilisation tinymce')!}] : <b>&#123;{!getHtmlForm/[{!$this->doorGets->Uri!}]!}&#125;</b>
        </div>
        <div class="separateur-tb"></div> 
        
    </div>
</div>
