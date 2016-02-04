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
        $categories
        
 */
 $i=1;
 
?>
<!-- doorGets:start:widgets/module_categories -->
[{?( !empty($categories) ):}]
<div class="nav-collapse">
   <ul class="nav ">
    [{/($categories as $uri_category => $categorie):}]
        <li class="[{?($uri_category === $category_now['uri']):}]active[?]" >
            <a   class="  menu-level-[{!$categorie['level']!}] [{?($this->position === 'root' && $i === 1 ):}]active[?]
                        [{?($this->type === 'multipage' && $this->position === 'content' && $this->content['uri'] === $uri_category ):}]active[?]
                        [{?($this->position === 'category' && $this->category['uri'] === $uri_category ):}]active[?]"
            href="[{!BASE_URL!}]?[{!$togo!}]=[{!$uri_category!}]">[{!$categorie['name']!}] ([{!$categorie['count']!}])</a>
        </li>
        [{$i++;}]
    [/]
    </ul>
</div>
[?]
<!-- doorGets:end:widgets/module_categories -->
