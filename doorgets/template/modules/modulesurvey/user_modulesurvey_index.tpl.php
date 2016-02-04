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
        <legend>
            <span class="create" ><a class="doorGets-comebackform" href="?controller=widgets"><i class="fa fa-undo fa-lg green-c"></i> [{!$this->doorGets->__('Retour')!}]</a></span>
            <span class="create" ><a  href="?controller=modules&action=editblock&id=[{!$moduleInfos['id']!}]&lg=[{!$lgActuel!}]"><b class="glyphicon glyphicon-cog"></b> [{!$this->doorGets->__('Paramètres')!}]</a></span>
            <span class="create">[{!$this->doorGets->genLangueMenuAdmin()!}]</span>
            <img src="[{!BASE_IMG.'mod_survey.png'!}]" class="doorGets-img-ico px25" />
            [{!$moduleInfos['titre']!}]
        </legend>
        
        [{!$this->doorGets->Form->open('post','');}]
        <div class="separateur-tb"></div>
        [{!$this->doorGets->Form->input('','titre','hidden',$isContent['titre']);}]
        <div >
            <ul  class="nav nav-tabs">
                <li class="active" role="presentation" ><a data-toggle="tab" href="#tabs-1">[{!$this->doorGets->__('Information')!}]</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tabs-1">
                <div class="alert alert-success"> 
                    [{!$this->doorGets->Form->input($this->doorGets->__('Question'),'question','text',$this->isContent['question'])!}]
                </div>
                [{/(Constant::$surveyResponse as $field):}]
                <div class="separateur-tb"></div>
                <div class="alert alert-info"> 
                    [{!$this->doorGets->Form->input($this->doorGets->__('Réponse').' '.$field,'response_'.$field,'text',$this->isContent['response_'.$field])!}]
                    [{?(array_key_exists($field,$stats)):}]
                        <div class="separateur-tb"></div>
                        <i class="fa fa-pie-chart"></i>   [{!$stats[$field]['count']!}] <i class="fa fa-chevron-right"></i> [{!$stats[$field]['percent']!}]%
                    [?]
                </div>
                [/]
                <div class="separateur-tb"></div>
                </div>
            </div>
        </div>
        <div class="separateur-tb"></div>
        <div class="text-center">
            [{!$this->doorGets->Form->submit($this->doorGets->__('Sauvegarder'));}]
        </div>
        [{!$this->doorGets->Form->close();}]
        <div class="separateur-tb"></div>
        <div>
            [{!$this->doorGets->__('Utilisation template')!}] : <b>&#123;{!$this->getHtmlSurvey('[{!$isContent['uri']!}]')!}&#125;</b>
            <div class="separateur-tb"></div>
            [{!$this->doorGets->__('Utilisation tinymce')!}] : <b>&#123;{!getHtmlSurvey/[{!$isContent['uri']!}]!}&#125;</b>
        </div>
        <div class="separateur-tb"></div> 
    </div>   
</div>
