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
                <b class="glyphicon glyphicon-open"></b> [{!$this->doorGets->__('Mise à jour doorGets')!}]
                <small>[{!$this->doorGets->__("Garder votre système doorGets à jour")!}].</small>
            </h2>
        </div>
    
        [{?($dgVersion > $myVersion):}]
            <div class="alert alert-info">
                [{!$this->doorGets->__("Vous n'avez pas la dernière version de doorGets")!}] / [{!$this->doorGets->__("Votre version")!}] : <b>doorGets [{!$myVersion!}]</b>
            </div>
            <div class="separateur-tb"></div>
            [{!$this->doorGets->__("Dernière version disponible")!}] : <b>doorGets [{!$dgVersion!}]</b>
            <div class="separateur-tb"></div>
            [{?($isForDownload):}]
		[{?($isOkForCurl):}]
		    <div class="action-bottom-inworks" style="display: none;">
			<img src="[{!BASE_IMG.'loader.gif'!}]" class="icon-image" style="width:25px;height: 25px;vertical-align: middle;">
			[{!$this->doorGets->__("Téléchargement en cours")!}]...[{!$this->doorGets->__("Veuillez patienter")!}]...
		    </div>
		    <div class="action-bottom-form">
			[{!$this->doorGets->Form->open('post')!}]
			[{!$this->doorGets->Form->input('','version','hidden',$myVersion.'-to-'.$dgVersion)!}]
			[{!$this->doorGets->Form->submit($this->doorGets->__('Télécharger').' doorGets '.$dgVersion)!}]
			[{!$this->doorGets->Form->close()!}]
		    </div>
		    <script type="text/javascript">
			$("#configuration_updater_submit").click(function() {
			    $(".action-bottom-inworks").fadeIn();
			    $(".action-bottom-form").fadeOut();
			    $(".doorGets-comebackform").fadeOut();
			});
		    </script>
		[??]
		    <div class="alert alert-info">
			[{!$this->doorGets->__("Vous devez activer l'extension CURL de PHP pour faire les mises à jour !")!}]
		    </div>
		[?]
            [??]
                <div class="info-found">
                    [{!$this->doorGets->__("Vous pouvez maintenant commencer l'installation")!}]
                </div>
                <div class="action-bottom-inworks" style="display: none;">
                    <img src="[{!BASE_IMG.'loader.gif'!}]" class="icon-image" style="width:25px;height: 25px;vertical-align: middle;">
                    [{!$this->doorGets->__("Installation en cours")!}]...[{!$this->doorGets->__("Veuillez patienter")!}]...
                </div>
                <div class="action-bottom-form">
                    [{!$this->doorGets->Form->open('post')!}]
                    [{!$this->doorGets->Form->input('','version','hidden',$myVersion.'-to-'.$dgVersion)!}]
                    [{!$this->doorGets->Form->submit($this->doorGets->__('Installer').' dooGets '.$dgVersion)!}]
                    [{!$this->doorGets->Form->close()!}]
                </div>
                <script type="text/javascript">
                    $("#configuration_updater_submit").click(function() {
                        $(".action-bottom-inworks").fadeIn();
                        $(".action-bottom-form info-found").fadeOut();
                        $(".doorGets-comebackform").fadeOut();
                    });
                </script>
            [?]
	[??]
            <div class="info-found">
                [{!$this->doorGets->__("Vous avez la dernière version de doorGets")!}] / [{!$this->doorGets->__("Version")!}] : <b>doorGets [{!$dgVersion!}]</b>
            </div>
	[?]
        
    </div>
</div>