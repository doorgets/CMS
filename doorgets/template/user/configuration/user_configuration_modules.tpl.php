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
    <div class="doorGets-rubrique-center-title-breadcrumb page-header">
        <ol class="breadcrumb">
            <li><a href="./?controller=configuration">[{!$this->doorGets->__('Configuration')!}]</a></li>
            <li class="active">[{!$htmlConfigSelect!}]</li> 
        </ol>
    </div>
    <div class="doorGets-rubrique-center-content">
        <div class="doorGets-rubrique-left-center-title page-header">
            <h2>
                <b class="glyphicon glyphicon-asterisk"></b> [{!$this->doorGets->__('Modules internes')!}]
                <small>[{!$this->doorGets->__('Gérer les modules internes de votre site')!}].</small>
            </h2>
        </div>
    
        
        [{!$this->doorGets->Form->open('post')!}]
            [{!$this->doorGets->Form->input('','other','hidden','')!}]
            [{?($this->doorGets->configWeb['m_sitemap']):}]
                [{$isActive = $imgOk!}]
                [{$isChecked = 'checked'!}]
            [??] [{ $isActive = $imgNo; $isChecked = ''!}] [?]
            <div>
                [{!$this->doorGets->Form->checkbox($isActive.$this->doorGets->__('Plan du site'),'sitemap','sitemap',$isChecked)!}]
            </div>
            <div class="separateur-tb"></div>
            [{?($this->doorGets->configWeb['m_rss']):}]
                [{$isActive = $imgOk!}]
                [{$isChecked = 'checked'!}]
            [??] [{ $isActive = $imgNo; $isChecked = ''!}] [?]
            <div>
                [{!$this->doorGets->Form->checkbox($isActive.$this->doorGets->__('Flux RSS'),'rss','rss',$isChecked)!}]
            </div>
            <div class="separateur-tb"></div>
            [{?($this->doorGets->configWeb['m_comment']):}]
                [{$isActive = $imgOk!}]
                [{$isChecked = 'checked'!}]
            [??] [{ $isActive = $imgNo; $isChecked = ''!}] [?]
            <div>
                [{!$this->doorGets->Form->checkbox($isActive.$this->doorGets->__('Commentaire doorGets'),'comment','comment',$isChecked)!}]
            </div>
            <div class="separateur-tb"></div>
            [{?($this->doorGets->configWeb['m_comment_facebook']):}]
                [{$isActive = $imgOk!}]
                [{$isChecked = 'checked'!}]
            [??] [{ $isActive = $imgNo; $isChecked = ''!}] [?]
            <div>
                [{!$this->doorGets->Form->checkbox($isActive.$this->doorGets->__('Commentaire Facebook'),'comment_facebook','comment_facebook',$isChecked)!}]
            </div>
            <div class="separateur-tb"></div>
            [{?($this->doorGets->configWeb['m_comment_disqus']):}]
                [{$isActive = $imgOk!}]
                [{$isChecked = 'checked'!}]
            [??] [{ $isActive = $imgNo; $isChecked = ''!}] [?]
            <div>
                [{!$this->doorGets->Form->checkbox($isActive.$this->doorGets->__('Commentaire Disqus'),'comment_disqus','comment_disqus',$isChecked)!}]
            </div>
            <div class="separateur-tb"></div>
            [{?($this->doorGets->configWeb['m_sharethis']):}]
                [{$isActive = $imgOk!}]
                [{$isChecked = 'checked'!}]
            [??] [{ $isActive = $imgNo; $isChecked = ''!}] [?]
            <div>
                [{!$this->doorGets->Form->checkbox($isActive.$this->doorGets->__('Partage avec ShareThis'),'sharethis','sharethis',$isChecked)!}]
            </div>
            <div class="separateur-tb"></div>
            [{?($this->doorGets->configWeb['m_newsletter']):}]
                [{$isActive = $imgOk!}]
                [{$isChecked = 'checked'!}]
            [??] [{ $isActive = $imgNo; $isChecked = ''!}] [?]
            <div>
                [{!$this->doorGets->Form->checkbox($isActive.$this->doorGets->__('Inscription à la newsletter'),'newsletter','newsletter',$isChecked)!}]
                
            </div>
            
            <div class="separateur-tb"></div>
            <div class="text-center">
                [{! $this->doorGets->Form->submit($this->doorGets->__('Sauvegarder'))!}]
            </div>
        [{!$this->doorGets->Form->close()!}]
    </div>
</div>
