<?php if (!defined(DOORGETS)) { header('Location:../'); exit(); }

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorgets it's free PHP Open Source CMS PHP & MySQL
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

?>
<div class="doorGets-rubrique-center">
    <div class="doorGets-rubrique-center-content">
        <div class="doorGets-rubrique-left-center-title page-header">

        </div>
        <legend>
            <span class="create" ><a class="doorGets-comebackform" href="?controller=support"><i class="fa fa-undo fa-lg green-c"></i> [{!$this->doorGets->__('Retour');}]</a></span>
            <i class="fa fa-ticket"></i> <a href="?controller=support">[{!$this->doorGets->__('Tickets')!}] </a> / [{!$isContent['reference']!}]
            [{?($isContent['status'] === '1'):}]
                <a class="pull-right btn btn-danger" href="?controller=support&action=close&id=[{!$isContent['id']!}]">[{!$this->doorGets->__('Fermer ce ticket');}]</a>
            [?]
        </legend>
        <div>
            <h3 ><b class="glyphicon glyphicon-chevron-right"></b> [{!$isContent['subject']!}]</h3>
            <div class="separateur-tb"></div>
            <div class="support-chat">
                <div class="media">
                    <div class="media-right media-top text-center">
                        <img class="media-object" src="[{!URL.$avatar!}]">
                        <small >[{!$isContent['pseudo']!}]</small>
                    </div>
                    <div class="media-body">
                        <div class="talk-bubble tri-right left-in">
                            <div class="talktext">
                                <small>[{!GetDate::in($isContent['date_creation'])!}]</small>
                                <p>[{!$isContent['message']!}]</p>
                            </div>
                        </div>
                    </div>
                </div>
                [{/($supportMessagesEntities as $message):}]
                <div class="media">
                    [{?(empty($message['is_support_agent'])):}]
                    <div class="media-right media-top text-center">
                        <img class="media-object" src="[{!URL.$avatar!}]">
                        <small >[{!$isContent['pseudo']!}]</small>
                    </div>
                    [?]
                    <div class="media-body">
                        <div class="talk-bubble tri-right [{?(empty($message['is_support_agent'])):}]left-in[??]right-in[?]">
                            <div class="talktext">
                                <small>[{!GetDate::in($message['date_creation'])!}]</small>
                                <p>[{!$message['message']!}]</p>
                            </div>
                        </div>
                    </div>
                    [{?(!empty($message['is_support_agent'])):}]
                        <div class="media-right img-left media-top text-center">
                           <img class="media-object" src="/skin/img/logo.png">
                           <small >[{!$this->doorGets->__('Support')!}]</small>
                        </div>
                    [?] 
                </div>
                [/]
            </div>
        </div>
        <div class="separateur-tb"></div>
        [{?($isContent['status'] === '1'):}]
            [{!$this->doorGets->Form->open('post','','');}]
            [{!$this->doorGets->Form->textarea($this->doorGets->__('Réponse').' <span class="cp-obli">*</span>','message');}]
            <div class="separateur-tb"></div>
            <div class="text-center">
                [{!$this->doorGets->Form->submit($this->doorGets->__('Envoyer'))!}]
            </div>
            [{!$this->doorGets->Form->close();}]
        [??]
            <div class="alert alert-danger text-center">
                [{!$this->doorGets->__('Ticket fermé');}]
            </div>
        [?]
    </div>
</div>