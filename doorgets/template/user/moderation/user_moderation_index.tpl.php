<?php if (!defined(DOORGETS)) { header('Location:../'); exit(); }

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 20, February 2014
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


?> 
<div class="doorGets-rubrique-center">
    <div class="doorGets-rubrique-center-content">
        <div class="doorGets-rubrique-left-center-title page-header">
        
        </div>
        <legend>
            <b class="glyphicon violet glyphicon-bell "></b> [{!$this->doorGets->__('Modération')!}]
        </legend>
        <div class="width-listing">
            <div style="overflow: hidden;">
                    <div style="float: left;padding: 7px 0 ">
                    <i>
                        [{?(!empty($count)):}] [{!($ini+1)!}] [{!$this->doorGets->__("à")!}] [{!$finalPer!}] [{!$this->doorGets->__("sur")!}] [?] 
                        <b>[{!$countTotal.' '!}] [{?( $countTotal > 1 ):}][{!$this->doorGets->__('Items')!}] [??] [{!$this->doorGets->__('Item')!}] [?]</b>
                        | [{?(!empty($q)):}] [{!$this->doorGets->__('pour la recherche : ').' <b>'.$q.'</b>'!}] [?]
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
                    [{!$this->doorGets->Form['_search_filter']->open('post',$urlToGo,'')!}]
                    [{!$this->doorGets->Form['_search_filter']->submit($this->doorGets->__('Chercher'),'','btn btn-success')!}]
                    <a href="?controller=[{!$this->doorGets->controllerNameNow()!}]&lg=[{!$lgActuel!}]" class="btn btn-danger doorGets-filter-bt" >[{!$this->doorGets->__('Reset')!}]</a>
                </div>
            </div>
            <div class="separateur-tb"></div>
            [{!$block->getHtml()!}]
            [{!$this->doorGets->Form['_search']->close()!}]
            
            [{?(!empty($count)):}]

                <div class="separateur-tb"></div>
                [{!$valPage!}]
            [??]
                [{?(!empty($aGroupeFilter)):}]
                    <div class="alert alert-danger text-center">
                        [{!$this->doorGets->__("Aucun resultat trouvé pour votre recherche");}]
                    </div>
                [??]
                    <div class="alert alert-danger text-center">
                        [{!$this->doorGets->__("Il n'y a aucun resultat")!}]
                    </div>
                [?]
                
            [?] 
        </div>
    </div>
</div>
