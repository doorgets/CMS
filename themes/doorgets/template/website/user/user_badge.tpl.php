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
[{?($hasBadge):}]
<div class="author-badge row">
    [{?(!empty($networks)):}]
    <div class="col-md-12 author-badge-follow">
        <ul class="list-inline">
            <li>[{!$this->__("Suivre")!}] [{!$_lastname!}]:</li>
            [{/($networks as $url_network => $url_image):}]
                [{?(!empty($url_network)):}]
                <li><a href="[{!$url_network!}]" title="[{!$url_network!}]" target="blank"><img src="[{!$url_image!}]" alt="[{!$url_network!}]" /></a></li>
                [?]
            [/]
        </ul> 
    </div>
    [?]
    <div class="col-sm-6 col-md-2">
        <img src="[{!URL.'data/users/'.$profile['avatar']!}]" class="img-circle img-responsive img-author-badge">
    </div>
    <div class="col-sm-6 col-md-10">
        <h3><a href="[{!URL.'u/'.strtolower($profile['pseudo'])!}]">[{!$_name!}]</a></h3>
        <p>[{!$_description!}]</p>
    </div>
</div>
[?]
<!-- doorGets:end:user/user_badge -->
