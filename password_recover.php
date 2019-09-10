<?php
    include './functions.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require './PHPMailer/Exception.php';
    require './PHPMailer/PHPMailer.php';
    require './PHPMailer/SMTP.php';

    if (isset($_POST['submit'])) {
        $user_email = $_POST['user_email'];
        $query_user = "select * from users WHERE user_email = '" .$user_email. "'";
        $result_email = mysqli_query($linkli,$query_user) or die(mysqli_error());
        $registered_user=0;
        while ($users_recovery = mysqli_fetch_array($result_email)){
            //var_dump($users_session);
            $recovery_user_id = $users_recovery['user_id'];
            $recovery_security_token = $users_recovery['user_security_token'];
			$recovery_user_user_name = $users_recovery['user_user_name'];
            $recovery_user_password = $users_recovery['user_password'];
            $recovery_key = dechex( date("Ymd"));
            $recovery_token_status = $users_recovery['user_verified_token'];
            $decryptedpassword = substr(base64_decode($recovery_user_password), 0,-11);
            //echo $decryptedpassword;
            //echo $decryptedpassword;
            $registered_user =  $registered_user + 1;
        }
        if ($registered_user > 0) {

            $mailbody = "<div style='text-align: center; background: #01BCC6; height: 80px;'>
            <img src='https://vetstore.com.co/img/main_logo.png' style='max-width: 100%; max-height: 80px;'>
        </div>
        <div style='padding:30px;'>
            <h2>Estos son los datos de tu cuenta en VetStore</h2>
            <p>Su usuario es: <b>". $recovery_user_user_name ."</b></p>
            <p>Su Contraseña es: <b>". $decryptedpassword ."</b></p>
            <div style='text-align: center; margin: 40px;'>
            <a href='https://vetstore.com.co/' target='new'>
            <p  style='background: #FAA44F; padding: 25px; border-radius: 7px; font-weight: bold; text-decoration: none; color: #000000; display: inline-block;'>
                Iniciar sesión <br>
            </p>
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
            
            
            $mail = new PHPMailer(true);                              
            try {
                //$mail->SMTPDebug = 4;
                $mail->CharSet = 'UTF-8';
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'vetstorecol@gmail.com';
                $mail->Password = 'Hi1708company$$';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;
                $mail->Timeout = 30;
                $mail->AuthType = 'LOGIN';
                $mail->setFrom('vetstorecol@gmail.com');     //Direccion de correo remitente (DEBE SER EL MISMO "Username")
                $mail->addReplyTo('vetstorecol@gmail.com');     //Direccion de correo para respuestas     
                $mail->addAddress($user_email);     // Agregar el destinatario
                $mail->isHTML(true);                                  
                $mail->Subject = '¿Olvidaste tu contraseña de VetStore?';
                $mail->Body = $mailbody;
                $mail->send();
                //echo "Mensaje enviado al correo " . $user_email . "<br>";
                //log_create("login", "Remember", $user_id);
                //echo $mailbody;
            } catch (Exception $e) {
                echo 'El mensaje no pudo ser enviado. Mailer Error: ', $mail->ErrorInfo;
            }



            /*
            $para = $user_email;
            $cuerpo ="";
            $cuerpo .=" <div style='text-align: center; background: #01BCC6; height: 80px;'>
                            <img src='https://vetstore.com.co/img/main_logo.png' style='max-width: 100%; max-height: 80px;'>
                        </div>
                        <div style='padding:30px;'>
                            <h2>Recupera tu contraseña de VetStore</h2>
                            <p>Para recuperar tu contraseña haz 
                                <a href='https://vetstore.com.co/' target='new'>clic aquí</a>.
                            </p>
                            <p>Su usuario es: <b>". $recovery_user_user_name ."</b></p>
                            <p>Su Contraseña es: <b>". $decryptedpassword ."</b></p>
                            <div style='text-align: center; margin: 40px;'>
                            <a href='https://vetstore.com.co/' target='new'>
                            <p  style='background: #FAA44F; padding: 25px; border-radius: 7px; font-weight: bold; text-decoration: none; color: #000000; display: inline-block;'>
                                Iniciar sesión <br>
                            </p>
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
            $asunto = "Recupera tu contraseña de VetStore";
            $encabezado = "MIME-Version: 1.0" . "\r\n";
            $encabezado .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $encabezado .= "From: VetStore <noreply@vetstore.com>" . "\r\n" .
                            "Reply-To: VetStore <info@vetstore.com>" . "\r\n" .
                            "X-Mailer: PHP/" . phpversion();
            //echo $cuerpo;
            mail($para, $asunto, $cuerpo, $encabezado);
            */
            echo "<script type='text/javascript'>alert('Sus datos se enviaron al correo!');</script>";
            echo '<script>window.location.replace("./login.php")</script>';
        }
    }
    $header_action = '<a class="btn btn-secondary" href="./login.php">Iniciar sesión</a>';
    $header_action .= ' <a class="btn btn-secondary" href="./register.php">Registro</a>';
    el_header();
    // include $app_screen;
?>
    <div id="main_app_screen">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                </div>
                <div id="home_form" class="col-md-6">
                    <h3>Recuperar contraseña</h3>
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="user_email">Email</label>
                            <input type="email" class="form-control" id="user_email" name="user_email" aria-describedby="emailHelp" placeholder="Escribe tu email" required>
                        </div>
                        <button type="submit" id="submit" name="submit" class="btn btn-primary">Entrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php el_footer(); ?>