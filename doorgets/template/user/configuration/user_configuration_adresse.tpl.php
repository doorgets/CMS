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

$addresses = $this->doorGets->configWeb['addresses'];

?>

<script type="text/javascript">   
var reloadGmaps = function (el) {
    $("body").on('change','#'+el+' :input',function(){

        $('#newAddressGmap-' + el).gmap3({
            action: 'destroy'
        });

        var container = $('#newAddressGmap-' + el).parent();
        $('#newAddressGmap-' + el).remove();
        container.append('<div id="newAddressGmap-'+el+'" class="gmap3"></div>');

        var inputs = $('#'+el+' :input');
        var address = {};
        inputs.each(function() {
            var name = this.name;
            name = name.replace(el+'_','');
            address[name] = $(this).val();
        });
        var newAddress = address.address + ", " + address.zipcode + ", " + address.city + ", " + address.region + ", " + address.country;
        $('#newAddressGmap-' + el).gmap3({
            action: 'init',
            marker:{
              address: newAddress
            },
            map:{
                options:{
                    zoom: 13
                }
            }
          });
    });
}
reloadGmaps('configuration_adresse');
</script>
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
                <i class="fa fa-map-marker"></i> [{!$this->doorGets->__('Adresses')!}] 
                <small>[{!$this->doorGets->__('Configurer les adresses')!}].</small>
            </h2>
        </div>
        [{?(!empty($addresses)):}]
            [{/($addresses as $k => $address):}]
                <div class="separateur-tb"></div>
                <div class="panel panel-default">
                    <div class="panel-body">
                    [{!$this->doorGets->Form[$k]->open('post')!}]
                        [{!$this->doorGets->Form[$k]->input('','id_address','hidden',$k)!}]
                        <div class="row">
                            <div class="col-md-6">
                                [{!$this->doorGets->Form[$k]->input($this->doorGets->__('Titre').' <span class="cp-obli">*</span><br />','title','text',$address['title'])!}]
                                <div class="separateur-tb"></div>
                                <div class="row">
                                    <div class="col-md-6">
                                        [{!$this->doorGets->Form[$k]->input($this->doorGets->__('Pays').' <span class="cp-obli">*</span><br />','country','text',$address['country'])!}]
                                        <div class="separateur-tb"></div>
                                    </div>
                                    <div class="col-md-6">
                                        [{!$this->doorGets->Form[$k]->input($this->doorGets->__('Région').'/'.$this->doorGets->__('Province').'<br />','region','text',$address['region'])!}]
                                        <div class="separateur-tb"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        [{!$this->doorGets->Form[$k]->input($this->doorGets->__('Ville').' <span class="cp-obli">*</span><br />','city','text',$address['city'])!}]
                                    <div class="separateur-tb"></div>
                                    </div>
                                    <div class="col-md-6">
                                        [{!$this->doorGets->Form[$k]->input($this->doorGets->__('Code Postal').' <span class="cp-obli">*</span><br />','zipcode','text',$address['zipcode'])!}]
                                        <div class="separateur-tb"></div>
                                    </div>
                                </div>
                                [{!$this->doorGets->Form[$k]->input($this->doorGets->__('Adresse').' <span class="cp-obli">*</span><br />','address','text',$address['address'])!}]
                                <div class="separateur-tb"></div>
                                <div class="row">
                                    <div class="col-md-4">
                                        [{!$this->doorGets->Form[$k]->input($this->doorGets->__('Téléphone').'<br />','phone','text',$address['phone'])!}]
                                        <div class="separateur-tb"></div>
                                    </div>
                                    <div class="col-md-8">
                                        [{!$this->doorGets->Form[$k]->input($this->doorGets->__('E-mail').'<br />','email','text',$address['email'])!}]
                                        <div class="separateur-tb"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div id="newAddressGmap-configuration_adresse_[{!$k!}]" class="gmap3"></div>
                            </div>
                        </div>
                        <div class="separateur-tb"></div>
                        <div class="row">
                            <div class="col-md-4">
                            &nbsp;
                            </div>
                            <div class="col-md-4 text-center">
                                [{!$this->doorGets->Form[$k]->submit($this->doorGets->__('Modifier'),'','btn btn-lg btn-default')!}]
                                [{!$this->doorGets->Form[$k]->close()!}]
                            </div>
                            <div class="col-md-4 text-right">
                                [{!$this->doorGets->Form['remove_'.$k]->open('post')!}]
                                [{!$this->doorGets->Form['remove_'.$k]->input('','id_address','hidden',$k)!}]
                                [{!$this->doorGets->Form['remove_'.$k]->submit($this->doorGets->__('Supprimer'),'','btn btn-danger')!}]
                                [{!$this->doorGets->Form['remove_'.$k]->close()!}]
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    $('#newAddressGmap-configuration_adresse_[{!$k!}]').gmap3({
                        action: 'init',
                        marker:{
                          address: "[{!$address['url']!}]"
                        },
                        map:{
                            options:{
                                zoom: 13
                            }
                        }
                      });
                    reloadGmaps('configuration_adresse_[{!$k!}]');
                </script>
            [/]
        [?]
        <h3>[{!$this->doorGets->__('Ajouter une adresse')!}]</h3>
        <div class="separateur-tb"></div>
        [{!$this->doorGets->Form['new']->open('post')!}]
            [{!$this->doorGets->Form['new']->input('','id_address','hidden')!}]
            <div class="row">
                <div class="col-md-6">
                    [{!$this->doorGets->Form['new']->input($this->doorGets->__('Titre').' <span class="cp-obli">*</span><br />','title')!}]
                    <div class="separateur-tb"></div>
                    <div class="row">
                        <div class="col-md-6">
                            [{!$this->doorGets->Form['new']->input($this->doorGets->__('Pays').' <span class="cp-obli">*</span><br />','country')!}]
                            <div class="separateur-tb"></div>
                        </div>
                        <div class="col-md-6">
                            [{!$this->doorGets->Form['new']->input($this->doorGets->__('Région').'/'.$this->doorGets->__('Province').'<br />','region')!}]
                            <div class="separateur-tb"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            [{!$this->doorGets->Form['new']->input($this->doorGets->__('Ville').' <span class="cp-obli">*</span><br />','city')!}]
                        <div class="separateur-tb"></div>
                        </div>
                        <div class="col-md-6">
                            [{!$this->doorGets->Form['new']->input($this->doorGets->__('Code Postal').' <span class="cp-obli">*</span><br />','zipcode')!}]
                            <div class="separateur-tb"></div>
                        </div>
                    </div>
                    [{!$this->doorGets->Form['new']->input($this->doorGets->__('Adresse').' <span class="cp-obli">*</span><br />','address')!}]
                    <div class="separateur-tb"></div>
                    <div class="row">
                        <div class="col-md-4">
                            [{!$this->doorGets->Form['new']->input($this->doorGets->__('Téléphone').'<br />','phone')!}]
                            <div class="separateur-tb"></div>
                        </div>
                        <div class="col-md-8">
                            [{!$this->doorGets->Form['new']->input($this->doorGets->__('E-mail').'<br />','email')!}]
                            <div class="separateur-tb"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div id="newAddressGmap-configuration_adresse" class="gmap3"></div>
                </div>
            </div>
            <div class="separateur-tb"></div>
            <div class="text-center">
                [{! $this->doorGets->Form['new']->submit($this->doorGets->__('Ajouter'),'','btn btn-lg btn-success')!}]
            </div>
        [{!$this->doorGets->Form['new']->close()!}]
        
        <script type="text/javascript">
        

        var reloadGmaps = function (el) {
            $("body").on('change','#'+el+' :input',function(){

                $('#newAddressGmap-' + el).gmap3({
                    action: 'destroy'
                });

                var container = $('#newAddressGmap-' + el).parent();
                $('#newAddressGmap-' + el).remove();
                container.append('<div id="newAddressGmap-'+el+'" class="gmap3"></div>');

                var inputs = $('#'+el+' :input');
                var address = {};
                inputs.each(function() {
                    var name = this.name;
                    name = name.replace(el+'_','');
                    address[name] = $(this).val();
                });
                var newAddress = address.address + ", " + address.zipcode + ", " + address.city + ", " + address.region + ", " + address.country;
                $('#newAddressGmap-' + el).gmap3({
                    action: 'init',
                    marker:{
                      address: newAddress
                    },
                    map:{
                        options:{
                            zoom: 14
                        }
                    }
                  });
            });
        }
        reloadGmaps('configuration_adresse');
        
        </script>
    </div>
</div>
