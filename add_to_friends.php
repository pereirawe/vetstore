<?php
    include './functions.php';
    if (isset($_GET['user_id']) && $_GET['user_id'] != $_SESSION['user_id'] ) {
        
        $user_id_a = $_SESSION['user_id'];
        $user_id_b = $_GET['user_id'];
        // echo "El user id es : " . $user_id_b;
        $friends_relation_id = "fr_" . uniqid();
        $friends_request_date = time();
        
        $query_user_friend = "select * from users WHERE user_id = '" . $_GET["user_id"] . "'";
        
        $result_query_user_friend = mysqli_query($linkli,$query_user_friend) or die(mysqli_error());
        while ($user_friend_info = mysqli_fetch_array($result_query_user_friend)){
            // $user_id_b = $user_friend_info['user_id'];
            $user_friend_email = $user_friend_info['user_email'];
        }
        
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
            ''
        );";
        if(mysqli_query($linkli,$add_friend_query) or die(mysqli_error())){
            echo "Exito al agregar al user id_id : " . $user_id_b ." como amigo ";
            log_create("ask_friend", $friends_relation_id , $_SESSION['user_id']);
            if (isset($_SESSION['user_id'])) {
                $log_query = $add_friend_query;
            }
        } else{
            echo "Error al agregar al user id_id : " . $user_id_b ." como amigo ";
        }

        //Notificacion
        $para = $user_friend_email;
        $cuerpo = "<div style='text-align: center; background: #01BCC6; height: 80px;'>
                        <img src='https://vetstore.com.co/img/main_logo.png' style='max-width: 100%; max-height: 80px;'>
                    </div>
                    <div style='padding:30px;'>
                        <h2>Nueva solicitud de amistad</h2>
                        <p>Haz recibido una solicitud de amistad de ". $_SESSION['user_first_name'] . " ". $_SESSION['user_last_name'] ."</p>
                        <center>
                            <img src='".$_SESSION['user_photo']."' height='120px'>
                        </center>
                        <div style='text-align: center; margin: 40px;'>
                            <a href='https://vetstore.com.co/accept_to_friends.php?user_id_a=".$user_id_a."&user_id_b=".$user_id_b."&friends_relation_id=".$friends_relation_id."' target='new'>
                                <p  style='background: #FAA44F; padding: 25px; border-radius: 7px; font-weight: bold; text-decoration: none; color: #000000; display: inline-block;'>Aceptar</p>
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
        $asunto = "VetStore | Nueva solicitud de amistad";
        $encabezado = "MIME-Version: 1.0" . "\r\n";
        $encabezado .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $encabezado .= "From: VetStore <noreply@vetstore.com>" . "\r\n" .
                        "Reply-To: VetStore <info@vetstore.com>" . "\r\n" .
                        "X-Mailer: PHP/" . phpversion();
        mail($para, $asunto, $cuerpo, $encabezado);
        echo "<script languaje='javascript' type='text/javascript'>window.close();</script>";
    }
?>