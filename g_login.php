<?php
	include './functions.php';
	require_once "./config.php";

	if (isset($_SESSION['access_token']))
		$gClient->setAccessToken($_SESSION['access_token']);
	else if (isset($_GET['code'])) {
		$token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
		$_SESSION['access_token'] = $token;
	} else {
		header('Location: login.php');
		exit();
	}

	$oAuth = new Google_Service_Oauth2($gClient);
	$userData = $oAuth->userinfo_v2_me->get();

	// GOOGLE PLUS ID
	$user_google_id = $userData['id'];

	// Datos Recogidos
	$_SESSION['user_first_name'] = $userData['givenName'];
	$_SESSION['user_last_name'] =  $userData['familyName'];
	$_SESSION['user_email'] =  $userData['email'];
	$_SESSION['user_photo'] =  $userData['picture'];

		// Comparacion con Base de datos
		$query_email = "select * from users WHERE user_email = '" .$_SESSION['user_email']."'";
		$result_email = mysqli_query($linkli,$query_email) or die(mysqli_error());
		$registered_user = 0;
		while ($user_id = mysqli_fetch_array($result_email)){
			$user_id_exist = $user_id['user_email'];
			$registered_user =  $registered_user +1;
			$_SESSION['user_id'] = $user_id['user_id'];
			$_SESSION['user_user_name'] = $user_id['user_user_name'];
			$_SESSION['user_email'] = $user_id['user_email'];
			$_SESSION['user_password'] = $user_id['user_password'];
			$_SESSION['date'] = date("Y-m-d h:i:sa");
			$_SESSION['token_status'] = $user_id['user_verified_token'];
			$_SESSION['user_email'] = $user_id['user_email'];

			$user_first_name = $user_id['user_first_name'];
			$user_last_name = $user_id['user_last_name'];
			$user_photo = $user_id['user_photo'];
			$user_google_id = $user_id['user_google_id'];
			
			if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
				$_SESSION['ip'] = $_SERVER['HTTP_CLIENT_IP'];
			} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
				$_SESSION['ip'] = $_SERVER['HTTP_X_FORWARDED_FOR'];
			} else {
				$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
			}
			$_SESSION['user_rol'] = $user_id['user_rol'];
		}
		if ($registered_user == 1){
			if($_SESSION['token_status'] == "false"){
				$update_query = "UPDATE users SET user_verified_token = 'true' WHERE user_id = '".$_SESSION['user_id']."';";
				mysqli_query($linkli,$update_query) or die(mysqli_error());
			}
			if($user_first_name == ""){
				$update_query = "UPDATE users SET user_first_name = '".$userData['givenName']."' WHERE user_id = '".$_SESSION['user_id']."'; ";
				mysqli_query($linkli,$update_query) or die(mysqli_error());
			}
			if($user_last_name == ""){
				$update_query = "UPDATE users SET user_last_name = '".$userData['familyName']."' WHERE user_id = '".$_SESSION['user_id']."'; ";
				mysqli_query($linkli,$update_query) or die(mysqli_error());
			}
			if($user_photo == ""){
				$update_query = "UPDATE users SET user_photo = '".$userData['picture']."' WHERE user_id = '".$_SESSION['user_id']."'; ";
				mysqli_query($linkli,$update_query) or die(mysqli_error());
			}
			if($user_google_id == ""){
				$update_query = "UPDATE users SET user_google_id = '".$userData['id']."' WHERE user_id = '".$_SESSION['user_id']."'; ";
				mysqli_query($linkli,$update_query) or die(mysqli_error());
			}
		}
		// Registro de usuario con datos de Facebook
		if ($registered_user == 0) {
			$user_id = "u_" . uniqid();
			$user_registration_date =  date("Y-m-d");
			$user_security_token = substr( number_format(hexdec($user_id . $user_registration_date),0, '', ''), -11);
			$user_password = generarContrasena(6);			    
			$encryptedpassword = base64_encode($user_password. $user_security_token);
			$decryptedpassword = substr(base64_decode($encryptedpassword), 0,-11);	
			$user_user_name_p = strpos($_SESSION['user_email'], "@") + 1;
			$user_user_name = substr($_SESSION['user_email'], 0, -$user_user_name_p);
			$_SESSION['user_user_name'] = $user_user_name;
			$_SESSION['user_id'] = $user_id;
				$user_registration_query = "INSERT INTO users (
						user_id,
						user_security_token,
						user_registration_date,
						user_user_name,
						user_password,
						user_email,
						user_phone,
						user_birthdate,
						user_verified_token,
						user_first_name,
						user_last_name,
						user_about_me,
						user_work_place,
						user_address,
						user_website,
						user_facebook_id,
						user_instagram_id,
						user_twitter_id,
						user_google_id,
						user_relationship,
						user_photo,
						user_banner,
						user_rol,
						user_gender,
						user_location,
						pet_main_photo,
						privacy_send_messages,
						privacy_see_my_friends,
						privacy_post_in_wall,
						privacy_see_my_birthdate,
						user_links_facebook,
						user_links_twitter,
						user_links_instagram,
						user_links_google_plus,
						user_links_linkedin,
						user_links_youtube
					) VALUES (
						'".$user_id."',
						'".$user_security_token."',
						'".$user_registration_date."',
						'".$user_user_name."',
						'".$encryptedpassword."',
						'".$_SESSION['user_email']."',
						'',
						'',
						'true',
						'".$_SESSION['user_first_name']."',
						'".$_SESSION['user_last_name']."',
						'',
						'',
						'',
						'',
						'',
						'', '',
						'".$user_google_id."', '',
						'".$_SESSION['user_photo']."', 
						'https://vetstore.com.co/img/profile_banner.jpg',
						'0',
						'',
						'',
						'https://vetstore.com.co/img/default_pet.png',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						''
					);";
				//echo $user_registration_query;
				mysqli_query ($linkli, $user_registration_query) or die;
				
				//Envio de Correo con informacion de nueva cuenta
				$para = $_SESSION['user_email'];
				$cuerpo = "<div style='text-align: center; background: #01BCC6; height: 80px;'>
								<img src='https://vetstore.com.co/img/main_logo.png' style='max-width: 100%; max-height: 80px;'>
							</div>
							<div style='padding:30px;'>
								<h2>Bienvenido a VetStore</h2>
								<p>Su usuario es: <b>". $user_user_name ."</b></p>
								<p>Su contraseña es: <b>". $decryptedpassword ."</b></p>
								<p>Atentamente,</p>
								<a href='https://vetstore.com.co'>
									<img src='https://vetstore.com.co/img/logo-vetstore.png' height='65px'>
								</a>
								<br>
								<p><small style=' color: #666666;'>El contenido de este mensaje es información privilegiada y confidencial. Si usted no es el destinatario real del mismo, por favor informe de ello a quien lo envía y destrúyalo en forma inmediata. Está prohibida su retención, grabación, utilización o divulgación con cualquier propósito. Este mensaje ha sido verificado con software antivirus, en consecuencia, el remitente de este no se hace responsable por la presencia en él o en sus anexos de algún virus que pueda generar daños en los equipos o programas del destinatario.</small></p>
							</div>
							<div style='margin-top: 20px; padding:30px; color: #ffffff; background-color: #54687A;'><strong>Copyright © 2018 VetStore.</strong> Todos los derechos reservados.</div>";
				$asunto = "Bienvenido a VetStore";
				$encabezado .= "MIME-Version: 1.0" . "\r\n";
				$encabezado .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$encabezado .= "From: VetStore <noreply@vetstore.com>" . "\r\n" .
								"Reply-To: VetStore <info@vetstore.com>" . "\r\n" .
								"X-Mailer: PHP/" . phpversion();
				mail($para, $asunto, $cuerpo, $encabezado);

		}

	unset($userData);
	header('Location: ./welcome.php');
	exit();
?>