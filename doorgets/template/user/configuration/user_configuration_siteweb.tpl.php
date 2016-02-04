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

 $yn = $this->doorGets->getArrayForms('yn');
 // $devise = $this->doorGets->configWeb['currency'];
 // $currencyIco = Constant::$currencyIcon[$devise];
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
                <span class="create">[{!$this->doorGets->genLangueMenuAdmin()!}]</span>
                <b class="glyphicon glyphicon-home"></b> [{!$this->doorGets->__('Site internet')!}]
                <small>[{!$this->doorGets->__('Configurer les informations globales de votre site')!}].</small>
            </h2>
        </div>
        
        [{!$this->doorGets->Form->open('post')!}]
        [{!$this->doorGets->Form->select($statutImage.$this->doorGets->__('Statut du site'),'statut',$aValidation,$this->doorGets->configWeb['statut'])!}]
        <div class="box-statut-config">
            <div class="separateur-tb"></div>
            [{!$this->doorGets->Form->input($this->doorGets->__('Adresses IP autorisé lors de la désactivation, séparer par ')."','",'statut_ip','text',$this->doorGets->configWeb['statut_ip'])!}]
            <div class="separateur-tb"></div>
            [{!$this->doorGets->Form->textarea($this->doorGets->__('Message lors de la désactivation du site'),'statut_tinymce',$this->doorGets->configWeb['statut_tinymce_edit'],'tinymce ckeditor')!}]   
        </div>
        <script type="text/javascript">
            if ($('#configuration_siteweb_statut').val() == 1) {
                $('.box-statut-config').hide();
            }
            $('#configuration_siteweb_statut').change(function() {
                if ($(this).val() == 1) {
                    $('.box-statut-config').fadeOut();
                }
                if ($(this).val() == 2) {
                    $('.box-statut-config').fadeIn();
                }
            });
        </script>
        <div class="separateur-tb"></div>
        <h3>[{!$this->doorGets->__('Informations')!}]</h3>
        <div class="separateur-tb"></div>
        <div class="row">
            <div class="col-md-6">
                [{!$this->doorGets->Form->input($this->doorGets->__('Titre'),'title','text',$this->doorGets->configWeb['title'])!}]
                <div class="separateur-tb"></div>
                [{!$this->doorGets->Form->input($this->doorGets->__('Slogan'),'slogan','text',$this->doorGets->configWeb['slogan'])!}]
                <div class="separateur-tb"></div>
                [{!$this->doorGets->Form->input($this->doorGets->__('Description'),'description','text',$this->doorGets->configWeb['description'])!}]
                <div class="separateur-tb"></div>
            </div>
            <div class="col-md-6">
                [{!$this->doorGets->Form->input($this->doorGets->__('Copyright'),'copyright','text',$this->doorGets->configWeb['copyright'])!}]
                <div class="separateur-tb"></div>
                [{!$this->doorGets->Form->input($this->doorGets->__('Mots clés'),'keywords','text',$this->doorGets->configWeb['keywords'])!}]
                <div class="separateur-tb"></div>
                [{!$this->doorGets->Form->select($this->doorGets->__('Année de création'),'year',$dateCreation,$this->doorGets->configWeb['year'])!}]
                <div class="separateur-tb"></div>
            </div>
        </div>
        [{?(!SAAS_ENV || (SAAS_ENV && SAAS_CONFIG_SOCIAL)):}]
        <h3>[{!$this->doorGets->__('Commentaires')!}]</h3>
        <div class="separateur-tb"></div>
        <div class="row">
            <div class="col-md-6">
                [{!$this->doorGets->Form->input($this->doorGets->__('Id Facebook'),'id_facebook','text',$this->doorGets->configWeb['id_facebook'])!}]
                <div class="separateur-tb"></div>
            </div>
            <div class="col-md-6">
                [{!$this->doorGets->Form->input($this->doorGets->__('Id Disqus'),'id_disqus','text',$this->doorGets->configWeb['id_disqus'])!}]
                <div class="separateur-tb"></div>
            </div>
        </div>
        [?]
        <div class="separateur-tb"></div>
        <h3>[{!$this->doorGets->__("Signature")!}]</h3>
        <div class="separateur-tb"></div>
        [{!$this->doorGets->Form->textarea('','signature_tinymce',$this->doorGets->configWeb['signature_tinymce_edit'],'tinymce ckeditor')!}]   
        <div class="separateur-tb"></div>
        <h3>[{!$this->doorGets->__("Conditions générales d'utilisation")!}]</h3>
        <div class="separateur-tb"></div>
        [{!$this->doorGets->Form->textarea('','cgu_tinymce',$this->doorGets->configWeb['cgu_tinymce_edit'],'tinymce ckeditor')!}]   
        <div class="separateur-tb"></div>
        <h3>[{!$this->doorGets->__("Conditions générales de vente")!}]</h3>
        <div class="separateur-tb"></div>
        [{!$this->doorGets->Form->textarea('','terms_tinymce',$this->doorGets->configWeb['terms_tinymce_edit'],'tinymce ckeditor')!}]   
        <div class="separateur-tb"></div>
        <h3>[{!$this->doorGets->__("Politique de confidentialité")!}]</h3>
        <div class="separateur-tb"></div>
        [{!$this->doorGets->Form->textarea('','privacy_tinymce',$this->doorGets->configWeb['privacy_tinymce_edit'],'tinymce ckeditor')!}]   
        <div class="separateur-tb"></div>
        <div class="text-center">
            [{! $this->doorGets->Form->submit($this->doorGets->__('Sauvegarder'))!}]
        </div>
        [{!$this->doorGets->Form->close()!}]
        
    </div>
</div>
