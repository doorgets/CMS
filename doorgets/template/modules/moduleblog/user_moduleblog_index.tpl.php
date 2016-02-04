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
        
        [{!$htmlIndexTop!}]
        <div class="row">
            <div class="col-md-2">
                [{!$htmlCategoryLeft!}]
            </div>
            <div class="col-md-10">
                <div style="overflow: hidden;">
                    [{!$htmlSearchTop!}]
                </div>
                <div class="separateur-tb"></div>

                [{!$block->getHtml()!}]
                [{!$this->doorGets->Form['_search']->close()!}]
                
                [{?(!empty($cAll)):}]
                    <br />
                    [{!$valPage!}]
                    <br /><br />
                [??]
                   
                    [{?(isset($_GET['categorie'])):}]
                        <div class="alert alert-info">
                            <i class="fa fa-exclamation-triangle"></i> [{!$this->doorGets->__("Il n'y a actuellement aucun article pour cette catégorie")!}]
                        </div>
                    [{???(!empty($aGroupeFilter)):}]
                        <div class="alert alert-info">
                            <i class="fa fa-exclamation-triangle"></i> [{!$this->doorGets->__("Aucun article trouvé pour votre recherche");}]
                        </div>
                    [??]
                        <div class="alert alert-info">
                            <i class="fa fa-exclamation-triangle"></i> [{!$this->doorGets->__("Il n'y a actuellement aucun article")!}] 
                        </div>
                    [?]
                    
                [?]
            </div>
        </div>
    </div>
</div>