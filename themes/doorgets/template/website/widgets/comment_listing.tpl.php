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


 /*
  * Variables :
  * 
        $isModuleComments
        
    */
 
    $position = $countComments;
    
?>
<!-- doorGets:start:widgets/comment_listing -->
[{?(!empty($this->configWeb['m_comment'])):}]
<div id="comments">
    <div class="m-comment-title">
        <span>
            <strong>
                [{!$countComments!}] [{?($countComments > 1):}][{!$this->__('commentaires')!}][??][{!$this->__('commentaire')!}][?]
            </strong>
        </span>
    </div>
    [{?(!empty($countComments)):}]
        [{-($i=0;$i<$countComments;$i++):}]
            [{$date = GetDate::in($isModuleComments[$i]['date_creation'],1,$this->myLanguage);}]
            <div class="m-comment" >
                <span ><b class="violet">[{!$isModuleComments[$i]['nom']!}]</b> [{?($isModuleComments[$i]['stars'] > 0):}]<input type="hidden" class="rating green" data-fractions="3" disabled="disabled" value="[{!$isModuleComments[$i]['stars']!}]"/>[?] <small class="pull-right">[{!$date!}]</small></span>
                <div class="comment-content" >
                [{!$isModuleComments[$i]['comment']!}]
                </div>
            </div>
            [{$position--;}]
        [-]
    [?]

</div>
[?]
<!-- doorGets:end:widgets/comment_listing -->
