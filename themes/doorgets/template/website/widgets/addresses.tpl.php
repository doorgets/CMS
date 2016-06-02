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
        
 */
 $addresses = $this->configWeb['addresses'];

?>
[{?($addresses):}]
<h2><i class="fa fa-map-marker"></i> [{!$this->__('Localisation')!}]</h2>
[{/($addresses as $k => $_address):}]
    <div class="separateur-tb"></div>
    <div class="panel panel-default address-localisation">
        <div class="panel-body">
            <div class="row">
                [{?($k % 2 == 1):}]
                    <div class="col-md-6 text-right">
                        <div class="address-localisation-box">
                        <h3>[{!$_address['title']!}]</h3>
                        [{!$_address['address']!}]<br />
                        [{!$_address['zipcode']!}], [{!$_address['city']!}]<br />
                        [{?(!empty($_address['region'])):}][{!$_address['region']!}] [?][{!$_address['country']!}]<br />
                        <small>
                        [{?(!empty($_address['phone'])):}]
                        <i class="fa fa-phone"></i> [{!$_address['phone']!}]<br />
                        [?]
                        [{?(!empty($_address['phone'])):}]
                        <i class="fa fa-envelope-o"></i> <a href="mailto:[{!$_address['email']!}]">[{!$_address['email']!}]</a>
                        [?]
                        </small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="addressGmap-[{!$k!}]" class="gmap3 img-responcive"></div>
                    </div>
                [??]
                    <div class="col-md-6">
                        <div id="addressGmap-[{!$k!}]" class="gmap3 img-responcive"></div>
                    </div>
                    <div class="col-md-6 text-center">
                        <div class="address-localisation-box">
                        <h3>[{!$_address['title']!}]</h3>
                        [{!$_address['address']!}]<br />
                        [{!$_address['zipcode']!}], [{!$_address['city']!}]<br />
                        [{?(!empty($_address['region'])):}][{!$_address['region']!}] [?][{!$_address['country']!}]<br />
                        <small>
                        [{?(!empty($_address['phone'])):}]
                        <i class="fa fa-phone"></i> [{!$_address['phone']!}]<br />
                        [?]
                        [{?(!empty($_address['phone'])):}]
                        <i class="fa fa-envelope-o"></i> <a href="mailto:[{!$_address['email']!}]">[{!$_address['email']!}]</a>
                        [?]
                        </small>
                        </div>
                    </div>
                    
                [?]
            </div>
        </div>
    </div>
[/]
<script type="text/javascript">
window.addEventListener('load',function() {
    [{/($addresses as $k => $_address):}]
    console.log('#addressGmap-[{!$k!}]');
    $('#addressGmap-[{!$k!}]').gmap3({
        marker:{
          address: "[{!$_address['url']!}]"
        },
        map:{
            options:{
                zoom: 13
            }
        }
      });
    [/]
});
</script>
[?]