<?php
@set_time_limit(0);


function __autoload($name) {
    // Load class from doorgets core
    (is_file(CORE.'core/'.$name.'.php')) ? include CORE.'core/'.$name.'.php' : '';
    (is_file(CORE.'ajax/'.$name.'.php')) ? include CORE.'ajax/'.$name.'.php' : '';
    (is_file(CORE.'api/'.$name.'.php')) ? include CORE.'api/'.$name.'.php' : '';
    (is_file(CORE.'lib/'.$name.'.php')) ? include CORE.'lib/'.$name.'.php' : '';
    (is_file(CORE.'user/'.$name.'.php')) ? include CORE.'user/'.$name.'.php' : '';
    (is_file(CORE.'website/'.$name.'.php')) ? include CORE.'website/'.$name.'.php' : '';
    (is_file(CORE.'websiteUser/'.$name.'.php')) ? include CORE.'websiteUser/'.$name.'.php' : '';
    (is_file(CORE.'entity/'.$name.'.php')) ? include CORE.'entity/'.$name.'.php' : '';
    (is_file(CORE.'services/'.$name.'.php')) ? include CORE.'services/'.$name.'.php' : '';
}

spl_autoload_register('__autoload');

// PHPMailer 
include BASE.'doorgets/lib/phpmailer/PHPMailerAutoload.php';

// Include SAAS config
include CONFIG.'saas.php';
