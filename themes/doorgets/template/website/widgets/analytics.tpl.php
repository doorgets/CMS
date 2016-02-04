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
        $codeAnalytics
        
 */

 $msgCookies = $this->__("En poursuivant votre navigation sur ce site, vous acceptez l'utilisation de cookies pour vous proposer des publicités ciblées adaptées à vos centres d'intérêts et réaliser des statistiques").".";

?>[{?(!empty($codeAnalytics)):}]
<!-- doorGets:start:widgets/analytics -->
<script type="text/javascript">

    function removeAllCookies() {
        document.cookie.split(";").forEach(function(c) { document.cookie = c.replace(/^ +/, "").replace(/=.*/, "=;expires=" + new Date().toUTCString() + ";path=/"); });
    }
    //removeAllCookies();
    function showBanner() {
        var CNIL = '<div style="z-index:9999999;display: block;position: relative;width: 100%;top: 0;margin: auto 0;font-size: 12px;text-align: center;color: #7b7b7b;background-color: #fcf7e5;padding:10px;">' + "[{!$msgCookies!}]" + ' <i class="fa fa-remove fa-lg pull-right"></i></div>'
        var bodytag = document.getElementsByTagName('body')[0];
        var div = document.createElement('div');
        div.setAttribute('id','cookie-banner');
        div.setAttribute('width','70%');
        div.innerHTML =  CNIL;
        bodytag.insertBefore(div,bodytag.firstChild); 
        document.getElementsByTagName('body')[0].className+=' cookiebanner'; 
        console.log(div);        
    }

    //Cette fonction vérifie si on  a déjÃ  obtenu le consentement de la personne qui visite le site.
    function checkFirstVisit() {
       var consentCookie =  getCookie('hasConsent'); 
       if ( !consentCookie ) return true;
    }

    // Fonction utile pour récupérer un cookie à partir de son nom
    function getCookie(NameOfCookie)  {
        if (document.cookie.length > 0) {        
            begin = document.cookie.indexOf(NameOfCookie+"=");
            if (begin != -1)  {
                begin += NameOfCookie.length+1;
                end = document.cookie.indexOf(";", begin);
                if (end == -1) end = document.cookie.length;
                return unescape(document.cookie.substring(begin, end)); 
            }
         }
        return null;
    }

    function getCookieExpireDate() { 
        // Le nombre de millisecondes que font 13 mois 
        var cookieTimeout = 33696000000;
        var date = new Date();
        date.setTime(date.getTime()+cookieTimeout);
        var expires = "; expires="+date.toGMTString();
        return expires;
    }

    function consent() {
        document.cookie = 'hasConsent=true; '+ getCookieExpireDate() +' ; path=/'; 
    }

    var isFirtTime = checkFirstVisit();
    if (isFirtTime) {
        showBanner();
        window.addEventListener('load',function(){
            $('#cookie-banner').on('click',function(){
                consent();
                $(this).remove();
            });
        });
    }

    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', '[{!$codeAnalytics!}]', 'auto');
    ga('send', 'pageview');
</script>
<!-- doorGets:end:widgets/analytics -->[?]
