<?php
    include './functions.php';
    
    if(!isset($_SESSION['user_id'])){
        $_SESSION['call_back'] = true;
        $_SESSION['call_back_url'] = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        echo "<script type='text/javascript'>alert('Debe iniciar sesión!');</script>";
        echo '<script>window.location.replace("./register.php")</script>';
    }

    if (isset($_GET['user_id_a']) && $_GET['user_id_a'] != $_SESSION['user_id'] ) {
        $user_id_a = $_GET['user_id_a'];
        $user_id_b = $_SESSION['user_id'];
        $friends_relation_id = $_GET['friends_relation_id'];
        $friends_answer_date = time();

        $query_accept = "UPDATE friends SET friends_answer_date = '".$friends_answer_date."' WHERE users_id_a = '".$user_id_a."' AND users_id_b = '".$user_id_b."' AND friends_relation_id = '".$friends_relation_id."';";
        //echo $query_accept;
        mysqli_query($linkli,$query_accept) or die(mysqli_error());
        if (isset($_SESSION['user_id'])) {
            $log_query = $query_accept;
            log_create("accept_friend", $friends_relation_id, $_SESSION['user_id']);
        }
        
        $query_my_friends = "SELECT * FROM users WHERE user_id = '".$user_id_b."';";
        //echo $query_my_friends;
        $result_my_friends = mysqli_query($linkli,$query_my_friends) or die(mysqli_error());
        while ($my_friends_info = mysqli_fetch_array($result_my_friends)){
            $my_friends_user_id = $my_friends_info['user_id'];
            $my_friends_user_user_name = $my_friends_info['user_user_name'];
            $my_friends_user_first_name = $my_friends_info['user_user_name'];
            $my_friends_user_last_name = $my_friends_info['user_last_name'];
            $my_friends_user_email = $my_friends_info['user_email'];
            $my_friends_user_photo = $my_friends_info['user_photo'];
        }
        //Notificacion
        $para = $_SESSION['user_email'];
        $cuerpo = "<div style='text-align: center; background: #01BCC6; height: 80px;'>
                        <img src='https://vetstore.com.co/img/main_logo.png' style='max-width: 100%; max-height: 80px;'>
                    </div>
                    <div style='padding:30px;'>
                        <h2>Solicitud de amistad aceptada</h2>
                        <p>Tu amigo ". $my_friends_user_first_name . " ". $my_friends_user_last_name ." ha aceptado tu solicitud de amistad en <b>VetStore</b></p>
                        <center>
                            <img src='".$my_friends_user_photo."' height='120px'>
                        </center>
                        <div style='text-align: center; margin: 40px;'>
                            <a href='https://vetstore.com.co/welcome.php?perfil=". $my_friends_user_user_name ."' target='new'>
                                <p  style='background: #FAA44F; padding: 25px; border-radius: 7px; font-weight: bold; text-decoration: none; color: #000000; display: inline-block;'>Visita su perfil</p>
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
        $asunto = "VetStore | Solicitud de amistad aceptada";
        $encabezado = "MIME-Version: 1.0" . "\r\n";
        $encabezado .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $encabezado .= "From: VetStore <noreply@vetstore.com>" . "\r\n" .
                        "Reply-To: VetStore <info@vetstore.com>" . "\r\n" .
                        "X-Mailer: PHP/" . phpversion();
        // echo $para."<br>"; 
        // echo $cuerpo;
        mail($para, $asunto, $cuerpo, $encabezado);
        echo "<script type='text/javascript'>alert('Aceptaste la solicitud de amistad!');</script>";
        echo '<script>window.location.replace("./welcome.php?perfil='.$my_friends_user_user_name.'")</script>';
    }
?>
