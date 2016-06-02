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

    
    // do not change this
    echo $this->getHtmlHeader();
    
?>
[{!FlashInfo::get()!}]
<div class="navbar navbar-inverse navbar-static-top " >
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="[{!BASE_URL!}]" class="navbar-brand" title="[{!$title!}]"><img src="[{!URL!}]skin/img/logo.png"/> [{!$title!}]</a>  
        </div>
        [{!$this->getHtmlNavigation()!}]
    </div>   
</div>
[{!$this->getHtmlFixed('top')!}]
<div id="wrap" >
    <div class="container websiteUser" >
        [{!$this->getContentView()!}]
    </div>
</div>
[{!$this->getHtmlFixed('bottom')!}]
<div class="jumbotron">
    <div class="container">
        <div class="row">
            [{?(!empty($this->configWeb['m_newsletter'])):}]
                [{?($countComments != 0):}]
                <div class="col-md-4">
                [??]
                <div class="col-md-8">
                [?]
                    <h2 class="h2-b">[{!$this->__("Lettre d'information")!}]</h2>
                    <p>[{!$this->getHtmlNewsletter()!}]</p>
                </div>
            [?]
            [{?($countComments != 0):}]
            <div class="col-md-[{?(empty($this->configWeb['m_newsletter'])):}]8[??]4[?]">     
                <h2 class="h2-b">[{!$this->__("Derniers commentaires")!}]</h2>        
                <blockquote>       
                    <p>[{!$this->getLastComments()!}]</p>     
                </blockquote>      
            </div>
            [?]
            [{?(empty($this->configWeb['m_newsletter']) && $countComments == 0):}]
            <div class="col-md-12 text-center">
            [??]
            <div class="col-md-4 text-right">
            [?]
                <h2 class="h2-b">[{!$this->__('Nous suivre')!}]</h2>
                [{!$this->getHtmlNetwork()!}]
                <p>[{!$dateWesbsite!}] © [{!$copyright!}]</p>
            </div>
        </div>
    </div>
</div>
<div>
    <footer>
      <a href="http://www.doorgets.com" title="http://www.doorgets.com" target="blank" rel="nofollow">
          [{!$this->__('Propulsé avec')!}] doorGets ™
      </a>
  </footer>
</div>
[{!$this->getHtmlAnalytics()!}]
[{!$this->getHtmlFooter()!}]
