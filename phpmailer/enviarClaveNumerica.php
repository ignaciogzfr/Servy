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
$claveNumerica = ""; //llamada a funcion de random number
try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smpt.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'serbyayuda@gmail.com';                     // SMTP username
    $mail->Password   = 'M4r14C0l0nV3r1t4sIntr1ns3c0';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('serbyayuda@gmail.com', 'Servy ayuda');  
    $mail->addAddress($destinatario);               // Name is optional

    //Si queremos enviar reportes o algun archivo para un futuro
    //$mail->addAttachment('/var/tmp/file.tar.gz');         
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    

    // contenido de lcoreo
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Codigo numerico de confirmación';
    $mail->Body    = '<h2>Estimado '.$nombreDestinatario.'</h2> <br> <br> <h5>Su codigo numerico de confirmacion es : '.$claveNumerica.'</h5>';
    $mail->AltBody = 'su codigo numerico es: ---->'.$claveNumerica.'<-----';

    $mail->send();
    echo 'El mensaje fue enviado';
} catch (Exception $e) {
    echo "El mensaje no se pudo enviar. Mailer Error: {$mail->ErrorInfo}";
}
//fin de el envio y verificacion de parametros




?>