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

$theme_bootstrap = $this->doorGets->configWeb['theme_bootstrap'];
?>
<div class="doorGets-rubrique-center">
    <div class="doorGets-rubrique-center-content">
        <div class="doorGets-rubrique-left-center-title page-header">
        </div>

        <legend>
            <span class="create" ><a class="doorGets-comebackform" href="?controller=theme"><i class="fa fa-undo fa-lg green-c"></i> [{!$this->doorGets->__('Retour')!}]</a></span>
            <span class="create" >
                [{!$this->doorGets->Form['download']->open('post')!}]
                [{!$this->doorGets->Form['download']->input('','hidden','hidden','hidden')!}]
                [{!$this->doorGets->Form['download']->submit($this->doorGets->__("Télécharger ce thème"),'','btn no-loader')!}]
                [{!$this->doorGets->Form['download']->close()!}]
            </span>
            <b class="glyphicon glyphicon-tint"></b> <a href="?controller=theme">[{!$this->doorGets->__('Thème')!}] </a> / [{!$theme!}] 
            [{?($nameTheme === $theme):}]<div class="right-theme-title "><img src="[{!BASE_IMG.'activer.png'!}]"  /> <small>[{!$this->doorGets->__('Thème par défaut')!}]</small></div>[?]
        </legend>
        <div class="row">
            <div class="col-md-3">
                [{?(array_key_exists('css',$themeListe)):}]
                    <label>CSS</label><br />
                    <select onchange="window.location = $(this).val();">
                        <option value="" ></option>
                        [{/($themeListe['css'] as $dirFile=>$file):}]
                            <option [{?($fileSelected === $dirFile):}]selected="selected"[?]  value="?controller=theme&action=edit&name=[{!$theme!}]&file=[{!$dirFile!}]">[{!$dirFile!}]</option>
                        [/]
                    </select>
                [?]
            </div>
            [{?(!SAAS_ENV || (SAAS_ENV && SAAS_THEME_JS)):}]
            <div class="col-md-3">
                [{?(array_key_exists('js',$themeListe)):}]
                    <label>JavaScript</label><br />
                    <select onchange="window.location = $(this).val();">
                        <option value="" ></option>
                        [{/($themeListe['js'] as $dirFile=>$file):}]
                            <option [{?($fileSelected === $dirFile):}]selected="selected"[?] value="?controller=theme&action=edit&name=[{!$theme!}]&file=[{!$dirFile!}]">[{!$dirFile!}]</option>
                        [/]
                    </select>
                [?]
            </div>
            [?]
            [{?(!SAAS_ENV):}]
            <div class="col-md-3">
                [{?(array_key_exists('tpl',$themeListe)):}]
                    
                    <label>Template</label><br />
                    <select onchange="window.location = $(this).val();">
                        <option value="" ></option>
                        [{/($themeListe['tpl'] as $dirFile=>$file):}]
                            <option [{?($fileSelected === $dirFile):}]selected="selected"[?]  value="?controller=theme&action=edit&name=[{!$theme!}]&file=[{!$dirFile!}]">[{!$dirFile!}]</option>
                        [/]
                    </select>
                [?]
            </div>
            [?]
            <div class="col-md-12">
            <hr />
            </div>
            <div class="col-md-12">
                <div class="u-title"><label>[{!$this->doorGets->__('Fichier')!}] &#187; [{!$fileSelected!}]</label></div>
                [{!$this->doorGets->Form['edit']->open('post')!}]
                <textarea id="theme_content_nofi" name="theme_content_nofi">[{!$fileContent!}]</textarea>
                <div class="separateur-tb"></div>
                [{!$this->doorGets->Form['edit']->select($this->doorGets->__("Version de bootstrap"),'bootstrap_version',Constant::$bootstrapThemes,$theme_bootstrap)!}]
                <div class="separateur-tb"></div>
                <div class="text-center">
                    <img id="img-bootstap-theme-used" src="[{!BASE_IMG.'bootstrap_'.$theme_bootstrap!}].png">
                </div>
                <div class="separateur-tb"></div>
                <div class="text-center">
                    [{!$this->doorGets->Form['edit']->submit($this->doorGets->__("Sauvegarder"))!}]
                </div>
                [{!$this->doorGets->Form['edit']->close()!}]
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    window.addEventListener('load',function(){
        $("#edit_theme_bootstrap_version").on('change',function(){
            var newBootstap = $(this).val();
            var newUrlBoostrap = "[{!BASE_IMG!}]bootstrap_"+newBootstap+".png"
            $("#img-bootstap-theme-used").attr('src',newUrlBoostrap);
        })
    });
</script>
