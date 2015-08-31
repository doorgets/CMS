<?php
@set_time_limit(0);

// Load class from doorgets core
function __autoload($name) { 

	(is_file(CORE.'core/'.$name.'.php')) ? require_once CORE.'core/'.$name.'.php' : '';
	(is_file(CORE.'ajax/'.$name.'.php')) ? require_once CORE.'ajax/'.$name.'.php' : '';
	(is_file(CORE.'api/'.$name.'.php')) ? require_once CORE.'api/'.$name.'.php' : '';
	(is_file(CORE.'lib/'.$name.'.php')) ? require_once CORE.'lib/'.$name.'.php' : '';
	(is_file(CORE.'user/'.$name.'.php')) ? require_once CORE.'user/'.$name.'.php' : '';
	(is_file(CORE.'website/'.$name.'.php')) ? require_once CORE.'website/'.$name.'.php' : '';
	(is_file(CORE.'websiteUser/'.$name.'.php')) ? require_once CORE.'websiteUser/'.$name.'.php' : '';
	(is_file(CORE.'entity/'.$name.'.php')) ? require_once CORE.'entity/'.$name.'.php' : '';
	
}

spl_autoload_register('__autoload');

// Google API
include BASE.'doorgets/lib/google/src/Google/autoload.php';

// Facebook API

include BASE.'doorgets/lib/facebook/src/Facebook/FacebookResponse.php';
include BASE.'doorgets/lib/facebook/src/Facebook/GraphObject.php';
include BASE.'doorgets/lib/facebook/src/Facebook/GraphSessionInfo.php';

include BASE.'doorgets/lib/facebook/src/Facebook/FacebookSession.php';
include BASE.'doorgets/lib/facebook/src/Facebook/FacebookRequest.php';
include BASE.'doorgets/lib/facebook/src/Facebook/FacebookRedirectLoginHelper.php';
include BASE.'doorgets/lib/facebook/src/Facebook/FacebookSignedRequestFromInputHelper.php';
include BASE.'doorgets/lib/facebook/src/Facebook/FacebookCanvasLoginHelper.php';
include BASE.'doorgets/lib/facebook/src/Facebook/Entities/AccessToken.php';
include BASE.'doorgets/lib/facebook/src/Facebook/HttpClients/FacebookHttpable.php';
include BASE.'doorgets/lib/facebook/src/Facebook/HttpClients/FacebookCurl.php';
include BASE.'doorgets/lib/facebook/src/Facebook/HttpClients/FacebookCurlHttpClient.php';
include BASE.'doorgets/lib/facebook/src/Facebook/FacebookSDKException.php';
include BASE.'doorgets/lib/facebook/src/Facebook/FacebookRequestException.php';
include BASE.'doorgets/lib/facebook/src/Facebook/FacebookAuthorizationException.php';

include BASE.'doorgets/lib/facebook/src/Facebook/GraphLocation.php';
include BASE.'doorgets/lib/facebook/src/Facebook/GraphUser.php';

// PHPMailer 
include BASE.'doorgets/lib/phpmailer/PHPMailerAutoload.php';

// Include SAAS config
include CONFIG.'saas.php';