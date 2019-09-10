<?php
    //Facebook Login
    require_once "Facebook/autoload.php";
    $FB = new \Facebook\Facebook([
        'app_id' => '272930626590587',
        'app_secret' => '29510ff3a4c3f4d50fce3f1ff6799745',
        'default_graph_version' => 'v3.1'
    ]);
    $helper = $FB->getRedirectLoginHelper();

    //Google Login
	require_once "GoogleAPI/vendor/autoload.php";
    $gClient = new Google_Client();
	$gClient->setClientId("736865017730-p7ob0buejso3ne8ti302ltpbepm4pimq.apps.googleusercontent.com");
	$gClient->setClientSecret("l8C91j45U_RcUj8wkbjjdKrz");
	$gClient->setApplicationName("VetStore");
	$gClient->setRedirectUri("https://vetstore.com.co/g_login.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
?>