<?php

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorGets it's free PHP Open Source CMS PHP & MySQL
    Copyright (C) 2012 - 2015 By Mounir R'Quiba -> Crazy PHP Lover
    
/*******************************************************************************

    Website : http://www.doorgets.com
    Contact : moonair@doorgets.com
    
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
<div class="doorGets-content-wrapper">
    <div class="doorGets-top-title-content">
        <img src="<?php echo BASE_IMG; ?>doorgets.png">
    </div>
    <div class="doorGets-title-content">
        <?php echo $doorgets->l("Vous avez presque fini ..."); ?>
    </div>
    <?php echo $doorgets->form['doorgets_polymorphic']->open('post','',''); ?>
        <?php echo $doorgets->form['doorgets_polymorphic']->input('','hidden','hidden','1'); ?>
        <div class="t-polymorphic-center">
            <div>
                <?php echo $doorgets->l("Cliquez sur le bouton ci-dessous pour générer votre site."); ?>
                <br />
                <?php echo $doorgets->l("Vous allez être ensuite redirigé vers la page d'administration."); ?>
                <br /><br />
            </div>
            <div id="show-after-click" style="display: none;">
                <img src="<?php echo BASE_IMG; ?>loader.gif" style="margin: 10px;" > <br /><br /> 
                <?php echo $doorgets->l("Installation en cours"); ?> ... 
            </div>
            <?php echo $doorgets->form['doorgets_polymorphic']->submit($doorgets->l('Génerer mon site internet doorGets')); ?>
            <div>
                <br />
                <i>" <?php echo $doorgets->l('Merci'); ?> ! "</i> 
            </div>
        </div>
    <?php echo $doorgets->form['doorgets_polymorphic']->close(); ?>
    <div class="separateur-tb"></div>
    <?php echo $doorgets->getHtmlGoBack(); ?>
</div>
<script type="text/javascript">
    document.getElementById('doorgets_polymorphic_submit').addEventListener('click',function(e){
        document.getElementById('doorgets_polymorphic_submit').style.display = 'none';
        document.getElementById('doorgets_goback_submit').style.display = 'none';
        document.getElementById('show-after-click').style.display = 'block';
    });
</script>