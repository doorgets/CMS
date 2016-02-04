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
    $_imgTime = URL.'themes/'.$this->getTheme().'/img/icone_time.png';
?>
<!-- doorGets:start:modules/video/video_last_contents -->

<div class="container doorGets-video-last-contents doorGets-last-contents-[{!$module!}]">
    <div class="row">
        <div class="col-md-12">
            
            [{?(!empty($Contents)):}]
                <div class="row">
                [{/($Contents as $content):}]
                    <div  class="col-md-4" >
                        <div class="list-group  hover-t">
                            <div class="list-group-item " >
                                <span  class="color-in"  >
                                    [{!ucfirst(mb_strtolower($this->_truncate($content['content_traduction']['titre'],'40'),'UTF-8'))!}]
                                </span>
                                <span class="badge" >
                                    <img alt="" src="[{!$_imgTime!}]" class="img-icone"  >
                                    [{!$content['content_traduction']['temps']!}]m
                                </span>
                            </div>
                            <div class="list-group-item center-g">
                                <a href="[{!$this->getBaseUrl()!}]?[{!$module!}]=[{!$content['content_traduction']['uri']!}]" title="[{!$content['content_traduction']['titre']!}]"  >
                                    <img alt="" src="https://i2.ytimg.com/vi/[{!$content['content_traduction']['youtube']!}]/mqdefault.jpg" class="youtube" >
                                </a>
                            </div>
                            
                        </div>
                    </div>
                    
                [/]                
                </div>
            [?]
            
        </div>

    </div>
</div>
<!-- doorGets:end:modules/video/video_last_contents -->