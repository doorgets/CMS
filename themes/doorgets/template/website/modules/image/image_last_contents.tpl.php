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
        

 */
 
 
 $labelModuleGroup = $this->getActiveModules();
 $labelModule = $labelModuleGroup[$module]['all']['nom'];
?>
<!-- doorGets:start:modules/image/image_last_contents -->
<div class="container doorGets-image-listing doorGets-module-[{!$module!}]">
    <div class="row">
        <div class="col-md-12">
            [{?(!empty($Contents)):}]
                <div class="row">
                [{/($Contents as $content):}]
                    <div class="col-md-4 col-xs-12 p-bottom-1 ">
                        <a href="[{!$this->getBaseUrl()!}]?[{!$module!}]=[{!$content['content_traduction']['uri']!}]" title="[{!$content['content_traduction']['titre']!}]">
                            <img src="[{!URL!}]data/[{!$module!}]/[{!$content['content_traduction']['image']!}]" class="img-thumbnail   hover-t" />
                    
                        </a>
                    </div>
                    
                [/]                
                </div>
            [?]  
        </div>
    </div>
</div>
<!-- doorGets:end:modules/image/image_last_contents -->