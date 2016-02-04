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
<!-- doorGets:start:user/user_badge -->
<div class="author-badge-header row">
    <div class="col-sm-12 col-md-12 text-center">
        <img src="[{!URL.'data/users/'.$profile['avatar']!}]" class="img-circle">
    </div>
    <div class="col-sm-12 col-md-12 text-center">
        <h3>[{!$_name!}]</h3>
        <h4>[{!$_description!}]</h4>
        <p>[{!$_website!}]</p>
    </div>
    [{?(!empty($networks)):}]
    <div class="col-md-12 author-badge-follow text-center">
        <ul class="list-inline">
            [{/($networks as $url_network => $url_image):}]
                [{?(!empty($url_network)):}]
                <li><a href="[{!$url_network!}]" title="[{!$url_network!}]" target="blank"><img src="[{!$url_image!}]" alt="[{!$url_network!}]" /></a></li>
                [?]
            [/]
        </ul> 
    </div>
    [?]
</div>
<!-- doorGets:end:user/user_badge -->
