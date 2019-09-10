<?php include './functions.php';
    if (isset($_POST['submit'])) {
        $user_user_name = $_POST['reg_user_user_name'];
        $user_user_name = strtolower($user_user_name);
        $user_email = $_POST['user_email'];
        /* Validacion de nombre y correo de usuario no registrado */
        $query_email = "select * from users WHERE user_email = '" .$user_email. "' OR user_user_name = '" .$user_user_name. "'";
        $result_email = mysqli_query($linkli,$query_email) or die(mysqli_error());
        $registered_user = 0;
        while ($user_id = mysqli_fetch_array($result_email)){
			$user_id_exist = $user_id['user_email'];
			$registered_user =  $registered_user +1;
        }
        if ($registered_user > 0) {
			echo '<img src="https://vetstore.com.co/mail/mailtop.png" width="100%"><h1>¡El correo usuario ya esta registrado! </h1><br>
			<p>.</p><br>
			<a href="https://vetstore.com.co/password_recover.php" title=""><small>Recuperar contraseña</small></a>';
		} else {
            $user_id = "u_" . uniqid();
            $user_registration_date =  date("Y-m-d");
            $user_security_token = substr( number_format(hexdec($user_id . $user_registration_date),0, '', ''), -11);
            $user_password = $_POST['user_password'];
            $user_phone = $_POST['user_phone'];
            $user_birthdate = $_POST['user_birthdate'];        
            $user_first_name = $_POST['user_first_name'];
            $user_last_name = $_POST['user_last_name'];
            $encryptedpassword = base64_encode($_POST['user_password']. $user_security_token);
            $decryptedpassword = substr(base64_decode($encryptedpassword), 0,-11);
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
                    '".$user_email."',
                    '".$user_phone."',
                    '".$user_birthdate."',
                    'true',
                    '".$user_first_name."',
                    '".$user_last_name."',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    'https://vetstore.com.co/img/default_profile.png',
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

            if (isset($_SESSION['user_id'])) {
                log_create("Register", "From site", $_SESSION['user_id']);
            }
            $user_id_a = "u_5c5e5308b04ef";
            $user_id_b = $user_id;
            $friends_relation_id = "fr_" . uniqid();
            $friends_request_date = time();
            $add_friend_query = "INSERT INTO friends (
                friends_relation_id,
                users_id_a,
                users_id_b,
                friends_request_date,
                friends_answer_date
            ) VALUES (
                '".$friends_relation_id."',
                '".$user_id_a."',
                '".$user_id_b."',
                '".$friends_request_date."',
                '".$friends_request_date."'
            );";
            $result_query_user_friend = mysqli_query($linkli,$add_friend_query) or die(mysqli_error());
            
            mysqli_query ($linkli, $user_registration_query) or die;
            /* Correo a nuevos usuarios */
            $para = $user_email;
            $cuerpo ="";
            $cuerpo .= "<div style='text-align: center; background: #01BCC6; height: 80px;'>
                            <img src='https://vetstore.com.co/img/main_logo.png' style='max-width: 100%; max-height: 80px;'>
                        </div>
                        <div style='padding:30px;'>
                            <h2>Bienvenido a VetStore</h2>
                            <p>Tu cuenta solo estará disponible después de ser activada: Para activarla, haz 
                                <a href='https://vetstore.com.co/activation_new_user.php?user_id=". $user_id ."&user_security_token=". $user_security_token ."' target='new'>clic aquí</a>
                            </p>
                            <p>Su usuario es: <b>". $user_user_name ."</b></p>
                            <p>Su contraseña es: <b>". $decryptedpassword ."</b></p>
                            <div style='text-align: center; margin: 40px;'>
                                <a href='https://vetstore.com.co/activation_new_user.php?user_id=". $user_id ."&user_security_token=". $user_security_token ."' target='new'>
                                    <p  style='background: #FAA44F; padding: 25px; border-radius: 7px; font-weight: bold; text-decoration: none; color: #000000; display: inline-block;'>CLICK AQUÍ PARA ACTIVAR</p>
                                </a>
                            </div>
                            <p>Atentamente,</p>
                            <a href='https://vetstore.com.co'>
                                <img src='https://vetstore.com.co/img/logo-vetstore.png' height='65px'>
                            </a>
                            <br>
                            <p><small style=' color: #666666;'>El contenido de este mensaje es información privilegiada y confidencial. Si usted no es el destinatario real del mismo, por favor informe de ello a quien lo envía y destrúyalo en forma inmediata. Está prohibida su retención, grabación, utilización o divulgación con cualquier propósito. Este mensaje ha sido verificado con software antivirus, en consecuencia, el remitente de este no se hace responsable por la presencia en él o en sus anexos de algún virus que pueda generar daños en los equipos o programas del destinatario.</small></p>
                        </div>
                        <div style='margin-top: 20px; padding:30px; color: #ffffff; background-color: #54687A;'><strong>Copyright © 2018 VetStore.</strong> Todos los derechos reservados.</div>";
            $asunto = "Bienvenido a VetStore";
            $encabezado = "MIME-Version: 1.0" . "\r\n";
            $encabezado .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $encabezado .= "From: VetStore <noreply@vetstore.com>" . "\r\n" .
                            "Reply-To: VetStore <info@vetstore.com>" . "\r\n" .
                            "X-Mailer: PHP/" . phpversion();
            //echo $cuerpo;
            mail($para, $asunto, $cuerpo, $encabezado);
            echo "<script type='text/javascript'>alert('Sus datos se enviaron al correo!');</script>";
            echo '<script>window.location.replace("./login.php")</script>';
        }
    } else {
        header('Location: https://vetstore.com.co/');
    }
?>