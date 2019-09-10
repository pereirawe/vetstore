<?php 

    $mailbody = "<div style='text-align: center; background: #01BCC6; height: 80px;'>
                <img src='https://vetstore.com.co/img/main_logo.png' style='max-width: 100%; max-height: 80px;'>
            </div>
            <div style='padding:30px;'>
                <h2>Regresa a VetStore y continua disfutando de la comunidad de los ¡Pet Lovers!</h2>

                <p>Estamos creciendo más y más, por lo que vale la pena que vuelvas y sigas disfrutando de toda la actividad que se esta generando en la primera red social para mascotas.</p>

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

    // $mailbody= "Hola Mundo";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require '../PHPMailer/Exception.php';
    require '../PHPMailer/PHPMailer.php';
    require '../PHPMailer/SMTP.php';

    $mail = new PHPMailer(true);                              
    try {
        //$mail->SMTPDebug = 4;                               // Habilitar el debug
        $mail->CharSet = 'UTF-8';
        $mail->isSMTP();                                      // Usar SMTP
        $mail->Host = 'smtp.gmail.com';  // Especificar el servidor SMTP reemplazando por el nombre del servidor donde esta alojada su cuenta
        $mail->SMTPAuth = true;                               // Habilitar autenticacion SMTP
        $mail->Username = 'vetstorecol@gmail.com';                 // Nombre de usuario SMTP donde debe ir la cuenta de correo a utilizar para el envio
        $mail->Password = '$1708Hicompany$';                           // Clave SMTP donde debe ir la clave de la cuenta de correo a utilizar para el envio
        $mail->SMTPSecure = 'ssl';                            // Habilitar encriptacion
        $mail->Port = 465;                                    // Puerto SMTP                     
        $mail->Timeout       =   30;
        $mail->AuthType = 'LOGIN';

        //Recipients   

        $mail->setFrom('vetstorecol@gmail.com');     //Direccion de correo remitente (DEBE SER EL MISMO "Username")
        $mail->addReplyTo('vetstorecol@gmail.com');     //Direccion de correo para respuestas     
        //$mail->addAddress('pereirawe@gmail.com');     // Agregar el destinatario
        $mail->AddBCC('pereirawe@gmail.com');     // Agregar el destinatario
        $mail->AddBCC('marioyanez@lifes.com.co');     // Agregar el destinatario
        $mail->AddBCC('ledcreativoai@gmail.com');     // Agregar el destinatario

        //Content
        $mail->isHTML(true);                                  
        $mail->Subject = '¡No te sigas perdiendo la diversión!';
        $mail->Body    = $mailbody;
        
        // $mail->send();
        // echo 'El mensaje ha sido enviado';
        // echo $mailbody;

    } catch (Exception $e) {
        // echo 'El mensaje no pudo ser enviado. Mailer Error: ', $mail->ErrorInfo;
    }


    
?>