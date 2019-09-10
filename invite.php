<?php
    session_start();
    include './functions.php';
    if(isset($_POST['invite_friend_submit'])){
        $invite_friend_contact = $_POST['invite_friend_contact'];
        $pos = strpos($invite_friend_contact, "@");
        echo $pos;
        if( $pos == ""){

            $invite_friend_contact = str_replace(" ", "", $invite_friend_contact);
            $invite_friend_contact = str_replace("-", "", $invite_friend_contact);
            $invite_friend_contact = str_replace("+", "", $invite_friend_contact);
            
            $invite_message = "Te%20invito%20a%20unirte%20y%20seguirme%20a%20la%20red%20social%20de%20mascotas%20VetStore.%20https://vetstore.com.co/register.php";

            // $whatsapp_url = "https://api.whatsapp.com/send?phone=57".$invite_friend_contact."&text=".$invite_message;
            $whatsapp_url = "https://wa.me/57".$invite_friend_contact."?text=". $invite_message;
            //echo $whatsapp_url;
            echo "<script type='text/javascript'>
                alert('Su navegador debe permitir ventanas emergentes para abrir aplicación de Whatsapp');
                window.open('".$whatsapp_url."', '_blank' );
                window.location.replace('". $_POST['invite_friend_back_url']."');
            </script>";
        } else {
            $user_id = "";
            $user_user_name = "";
            $user_id = "";
            $decryptedpassword = "";
            $user_security_token = "";
            $para = $invite_friend_contact;
            $cuerpo = "<div style='text-align: center; background: #01BCC6; height: 80px;'>
                            <img src='https://vetstore.com.co/img/main_logo.png' style='max-width: 100%; max-height: 80px;'>
                        </div>
                        <div style='padding:30px;'>
                            <h2>Invitación a VetStore</h2>
                            <p>Un amigo te invitó a seguirlo en VetStore</p>
                            <!--
                            <p>Tu cuenta solo estará disponible después de ser activada: Para activarla, haz 
                                <a href='https://vetstore.com.co/activation_new_user.php?user_id=". $user_id ."&user_security_token=". $user_security_token ."' target='new'>clic aquí</a>
                            </p>
                            <p>Su usuario es: <b>". $user_user_name ."</b></p>
                            <p>Su contraseña es: <b>". $decryptedpassword ."</b></p>
                            <div style='text-align: center; margin: 40px;'>
                                <a href='https://vetstore.com.co/activation_new_user.php?user_id=". $user_id ."&user_security_token=". $user_security_token ."' target='new'>
                                    <p  style='background: #FAA44F; padding: 25px; border-radius: 7px; font-weight: bold; text-decoration: none; color: #000000; display: inline-block;'>CLICK AQUÍ PARA ACTIVAR</p>
                                </a>
                            </div>-->
                            <p>Atentamente,</p>
                            <a href='https://vetstore.com.co'>
                                <img src='https://vetstore.com.co/img/logo-vetstore.png' height='65px'>
                            </a>
                            <br>
                            <p><small style=' color: #666666;'>El contenido de este mensaje es información privilegiada y confidencial. Si usted no es el destinatario real del mismo, por favor informe de ello a quien lo envía y destrúyalo en forma inmediata. Está prohibida su retención, grabación, utilización o divulgación con cualquier propósito. Este mensaje ha sido verificado con software antivirus, en consecuencia, el remitente de este no se hace responsable por la presencia en él o en sus anexos de algún virus que pueda generar daños en los equipos o programas del destinatario.</small></p>
                        </div>
                        <div style='margin-top: 20px; padding:30px; color: #ffffff; background-color: #54687A;'><strong>Copyright © 2018 VetStore.</strong> Todos los derechos reservados.</div>";
            $asunto = "Invitación a VetStore";
            $encabezado = "MIME-Version: 1.0" . "\r\n";
            $encabezado .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $encabezado .= "From: VetStore <noreply@vetstore.com>" . "\r\n" .
                            "Reply-To: VetStore <info@vetstore.com>" . "\r\n" .
                            "X-Mailer: PHP/" . phpversion();
            //echo $cuerpo;
            mail($para, $asunto, $cuerpo, $encabezado);
            echo "<script type='text/javascript'>alert('La invitación se envió'); window.location.replace('". $_POST['invite_friend_back_url']."'); </script>";
        }
    };
?>