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
        $content
 */
        $labelModuleGroup   = $this->getActiveModules();

        $urlAfterAction     = urlencode(PROTOCOL.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
        $urlEdition         = URL_USER.$this->_lgUrl.'?controller=modulesurvey&uri='.$isSurvey['uri'].'&lg='.$this->getLangueTradution().'&back='.$urlAfterAction;
        
        $surveyService = new SurveyService($this);
        $canRespond = $surveyService->firewall($isSurvey['uri'],$this->user['id']);

        $stats = $surveyService->getStats($isSurvey['uri']);
        $value = '';
        if (!empty($canRespond)) {
            $value = $canRespond['value'];
        }

?>
<!-- doorGets:start:widgets/survey -->
<div id="survey-[{!$uri_module!}]" class="survey-static survey-static-[{!$uri_module!}]">
    [{?($this->isUser && in_array($Module['id'],$this->_User['liste_widget'])):}]
    <div class="btn-group btn-front-edit-[{!$uri_module!}] navbar-right pull-right z-max-index">
        <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#">
            <b  class="glyphicon glyphicon-cog"></b> [{!$this->__('Action')!}]
            <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            <li><a href="[{!$urlEdition!}]" class="navbut"><b class="glyphicon glyphicon-pencil"></b> [{!$this->__('Modifier le sondage')!}]</a></li>
        </ul>
    </div>
    [?]
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">[{!$survey['question']!}]</h3>
        </div>
        <div class="panel-body">
            [{/(Constant::$surveyResponse as $field):}]
                [{?(!empty($survey['response_'.$field])):}]
                    <div class="radio">
                        <label>
                            <input type="radio" 
                                class="optionsSurveyClass-[{!$field!}]" 
                                name="optionsSurvey" 
                                value="[{!$field!}]" 
                                [{?($value === $field):}]checked[?]
                                [{?($canRespond):}]disabled[?]
                            >
                            [{!$survey['response_'.$field]!}]
                            [{?($value === $field):}] <i class="fa fa-check fa-lg"></i>[?]
                            [{?($canRespond && $stats[$field]['percent']):}]
                                ([{!$stats[$field]['count']!}])
                                [{!$stats[$field]['percent']!}]%
                                 
                            [?]
                        </label>
                    </div>
                [?]
            [/]
        </div>
        <div class="panel-footer text-center"><button type="submit" class="btn btn-default" [{?($canRespond):}]disabled[?]>[{!$this->__('Envoyer ma réponse')!}]</button></div>
    </div>
</div>
<!-- doorGets:end:widgets/survey -->
