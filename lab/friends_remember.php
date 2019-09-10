<?php
    include ('../functions.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require '../PHPMailer/Exception.php';
    require '../PHPMailer/PHPMailer.php';
    require '../PHPMailer/SMTP.php';

    $q_date =  date('Y-m-d', strtotime("-7 days"));
    $log_last_date = strtotime($q_date);
    $q_user = "SELECT * FROM users WHERE user_verified_token = 'true' AND user_registration_date  <= '".$q_date."';";
    $r_user = mysqli_query($linkli,$q_user) or die(mysqli_error());
    $i = 0;
    while ($a_users = mysqli_fetch_array($r_user)){
        $activate = 1;
        $user_id = $a_users['user_id'];
        $user_email = $a_users['user_email'];
        $q_in_log = "SELECT * FROM logs WHERE log_query = 'Remember' AND user_id = '".$user_id."' ;";
        $r_in_log = mysqli_query($linkli,$q_in_log) or die(mysqli_error());
        while ($a_in_friend = mysqli_fetch_array($r_in_log)){
            $activate = 0;
        };
        if($activate == 1){
            $q_in_friend = 'SELECT * FROM friends WHERE friends_answer_date = "" and users_id_b = "'.$user_id.'";';
            $r_in_friend = mysqli_query($linkli,$q_in_friend) or die(mysqli_error());
            $user_email_cache = "";
            $pending_friends = 0;
            while ($a_in_friend = mysqli_fetch_array($r_in_friend)){
                if ($user_email_cache != $user_email){
                    // echo $q_in_log . "<br>";
                    // echo $user_email;     
                }
                $pending_friends = $pending_friends + 1;
                $user_email_cache = $user_email;
            }
            if($i < 19){
                if ($pending_friends > 0) {
                    // echo " tiene " .$pending_friends. " solicitudes de amistad<br>\n";

                    $mailbody = "<div style='text-align: center; background: #01BCC6; height: 80px;'>
                                <img src='https://vetstore.com.co/img/main_logo.png' style='max-width: 100%; max-height: 80px;'>
                            </div>
                            <div style='padding:30px;'>
                                <h2>Entra a Vet Store y sigue disfutando de la comunidad de los ¡Pet Lovers!</h2>

                                <p>Tienes ". $pending_friends ." solicitudes de amistad pendientes.<br>
                                Solo tienes que regresar y aceptar para disfrutar de todas sus publicaciones. </p>

                                <div style='text-align: center; margin: 40px;'>
                                    <a href='https://vetstore.com.co/' target='new'>
                                        <p  style='background: #FAA44F; padding: 25px; border-radius: 7px; font-weight: bold; text-decoration: none; color: #000000; display: inline-block;'>CLICK AQUÍ IR A VETSTORE</p>
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
                            $mail->Password = '$1708Hicompany$';
                            $mail->SMTPSecure = 'ssl';
                            $mail->Port = 465;
                            $mail->Timeout = 30;
                            $mail->AuthType = 'LOGIN';
                            $mail->setFrom('vetstorecol@gmail.com');     //Direccion de correo remitente (DEBE SER EL MISMO "Username")
                            $mail->addReplyTo('vetstorecol@gmail.com');     //Direccion de correo para respuestas     
                            $mail->addAddress($user_email);     // Agregar el destinatario
                            $mail->isHTML(true);                                  
                            $mail->Subject = '¡Tus amigos en VetStore te esperan!';
                            $mail->Body = $mailbody;
                            $mail->send();
                            log_create("ask_friend", "Remember" , $user_id );
                            echo "Mensaje enviado al correo " . $user_email . " de " .  $user_id ."<br>";
                            //echo $mailbody . "<br>";
                        } catch (Exception $e) {
                            echo 'El mensaje no pudo ser enviado. Mailer Error: ', $mail->ErrorInfo;
                        }
                    $i = $i + 1;
                }
            }
            else{
                //echo $i;
                die;
            }
        }
    }
?>