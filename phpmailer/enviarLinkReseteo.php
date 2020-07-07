<?php
//carga de componentes de la api
require_once('SMTP.php');
require_once('Exception.php');
require_once('PHPMailer.php');
//fin de la carga de componentes


//inicio de el envio y verificacion de parametros
$mail = new PHPMailer(true);
$mailDestinatario = $_SESSION['email'];
$nombreDestinatario = $_SESSION['nombre'];
$linkReseteo = ""  //
try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                    // Enable verbose debug output
    $mail->isSMTP();                                          // Send using SMTP
    $mail->Host       = 'smpt.gmail.com';                     // servidor smtp de google
    $mail->SMTPAuth   = true;                                  
    $mail->Username   = 'serbyayuda@gmail.com';                     
    $mail->Password   = 'M4r14C0l0nV3r1t4sIntr1ns3c0';                              
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;        
    $mail->Port       = 587;                                   

    //Recipients
    $mail->setFrom('serbyayuda@gmail.com', 'Servy ayuda');  
    $mail->addAddress($destinatario);               // Name is optional

    //Si queremos enviar reportes o algun archivo para un futuro
    //$mail->addAttachment('/var/tmp/file.tar.gz');         
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    

    // contenido del coreo
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Link de reseteo para contraseña';
    $mail->Body    = '<h2>Estimado '.$nombreDestinatario.'</h2> <br> <br> <h5> : ingrese al siguiente link para cambiar contraseña: '.$linkReseteo.'</h5>';
    $mail->AltBody = 'Link de reseteo: ---->'.$linkReseteo.'<-----';
    //envio de correo
    $mail->send();
    echo 'El mensaje fue enviado';
} catch (Exception $e) {
    echo "El mensaje no se pudo enviar. Mailer Error: {$mail->ErrorInfo}";
}
//fin de el envio y verificacion de parametros
 ?>