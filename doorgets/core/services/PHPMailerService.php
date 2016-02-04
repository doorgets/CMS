<?php

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorgets it's free PHP Open Source CMS PHP & MySQL
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

class PHPMailerService {

    static function init(&$doorGets){
        
        $mail = null;

        if (!is_object($doorGets) || !is_array($doorGets->configWeb)) {
            return 'PHPMailerService: doorGets object not found';
        }

        $config = $doorGets->configWeb;
        
        $mail = new PHPMailer(true);
        
        $mail->CharSet = 'UTF-8';

        if ($config['smtp_mandrill_active']){
            $mail->isSMTP();
            $mail->Host = $config['smtp_mandrill_host'];
        
            $mail->SMTPAuth = true;

            $mail->Username = $config['smtp_mandrill_username'];
            $mail->Password = $config['smtp_mandrill_password'];

            $mail->SMTPSecure = 'tls';
            if ($config['smtp_mandrill_ssl']){
                $mail->SMTPSecure = 'ssl';
            }
            $mail->Port = (int) $config['smtp_mandrill_port'];
        } else {
            $mail->isMail();
        }

        $serverHost = $_SERVER['HTTP_HOST'];
        $mail->FromName = str_replace('www.', '', $serverHost);

        $serverName = $_SERVER['SERVER_NAME'];
        if ($serverName === '~^(?<vhost>.*)\.doorgets\.io$') {
            $serverName = 'doorgets.io';
        } else {
            $serverName = str_replace('www.', '', $serverName);
        }
        
        $mail->From = 'no-reply@'.$serverName;
        
        return $mail;
    }
}