<?php if (!defined(DOORGETS)) { header('Location:../'); exit(); }

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorGets it's free PHP Open Source CMS PHP & MySQL
    Copyright (C) 2012 - 2014 By Mounir R'Quiba -> Crazy PHP Lover
    
/*******************************************************************************

    Website : http://www.doorgets.com
    Contact : http://www.doorgets.com/?contact
    
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
        $carousel
    */
 
    $iCarousel = $iCarousels = 1;

    $labelModuleGroup  = $this->getActiveModules();

    $urlAfterAction     = urlencode(PROTOCOL.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    $urlEdition         = URL_USER.$this->_lgUrl.'?controller=modulecarousel&uri='.$isCarousel['uri'].'&lg='.$this->getLangueTradution().'&back='.$urlAfterAction;
?>
<!-- doorGets:start:widgets/carousel -->
<div class="container">
    <div class="carousel-static carousel-static-[{!$uri_module!}]">
        [{?($this->isUser && in_array($Module['id'],$this->_User['liste_widget'])):}]
        <div class="btn-group btn-front-edit-[{!$uri_module!}] pull-left z-max-index">
            <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#">
                <b  class="glyphicon glyphicon-cog"></b> [{!$this->__('Action')!}]
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="[{!$urlEdition!}]" class="navbut"><b class="glyphicon glyphicon-pencil"></b> [{!$this->__('Modifier le carousel')!}]</a></li>
            </ul>
        </div>
        [?]
        <div id="owl-[{!$uri_module!}]" class="owl-carousel">
            [{?($carousel):}]
            [{/($carousel as $page):}]
                [{?($page['type'] == 'image'):}]
                    <div class="item">
                    [{?(!filter_var($page['url'], FILTER_VALIDATE_URL) === false):}]
                        <a href="[{!$page['url']!}]" title="[{!$page['title']!}]" target="blank">
                    [?]
                        <img src="[{!URL.'data/'.$page['module'].'/'.$page['image']!}]" alt="[{!$page['title']!}]">
                    [{?(!filter_var($page['url'], FILTER_VALIDATE_URL) === false):}]
                        </a>
                    [?]
                    </div>
                [??]
                    <div>[{!$page['page']!}]</div>
                [?]
                [{$iCarousels++;}]
            [/]
            [?]
        </div>
        <script type="text/javascript">
        window.addEventListener('load',function(){
            
            $("#owl-[{!$uri_module!}]").owlCarousel({
                slideSpeed : 300,
                paginationSpeed : 400,
                paginationSpeed : 1000,
                goToFirstSpeed : 2000,
                items : [{!$isCarousel['items_count']!}],
                itemsDesktop : [1199,3],
                itemsDesktopSmall : [979,3],
                [{?($isCarousel['auto_play'] == '1'):}]
                autoPlay: 3000,[?]
                [{?($isCarousel['stop_on_hover'] == '1'):}]
                stopOnHover : true,[?]
                [{?($isCarousel['navigation'] == '1'):}]
                navigation:true,
                navigationText: [
                  '<i class="fa fa-chevron-left"></i>',
                  '<i class="fa fa-chevron-right"></i>'
                ] 
                [?]
            });
        })
        </script>
    </div>
</div>
<!-- doorGets:end:widgets/carousel -->