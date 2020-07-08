<?php
//carga de componentes de la api
require_once('SMTP.php');
require_once('Exception.php');
require_once('PHPMailer.php');
//fin de la carga de componentes
/**
 * 
 */
class envioCorrespondencia
{
    public function enviarClave(){
        
        //inicio de el envio y verificacion de parametros
        $mail = new PHPMailer(true);
        $mailDestinatario = $_SESSION['email'];
        $nombreDestinatario = $_SESSION['nombre'];
        $claveNumerica = $_SESSION['verificacion']; 
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
            $mail->isSMTP();                                            
            $mail->Host       = 'smpt.gmail.com';                    
            $mail->SMTPAuth   = true;                                  
            $mail->Username   = 'serbyayuda@gmail.com';                    
            $mail->Password   = 'M4r14C0l0nV3r1t4sIntr1ns3c0';                              
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
            $mail->Port       = 587;                                    

            //Recipients
            $mail->setFrom('serbyayuda@gmail.com', 'Servy ayuda');  
            $mail->addAddress($destinatario);               

            // contenido de lcoreo
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Codigo numerico de confirmación';
            $mail->Body    = '<h2>Estimado '.$nombreDestinatario.'</h2> <br> <br> <h5>Su codigo numerico de confirmacion es : '.$claveNumerica.'</h5>';
            $mail->AltBody = 'su codigo numerico es: ---->'.$claveNumerica.'<-----';

            $mail->send();

        } catch (Exception $e) {
            echo "El mensaje no se pudo enviar. Mailer Error: {$mail->ErrorInfo}";
        }
        //fin de el envio y verificacion de parametros

    }
    //fin funcion

    //inicio funcion
    public function enviarLink(){
        $mail = new PHPMailer(true);
        $mailDestinatario = $_SESSION['email'];
        $nombreDestinatario = $_SESSION['nombre'];
        $linkReseteo =  //
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
            $mail->addAddress($destinatario);              

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
    }
}
//fin clase

 ?>