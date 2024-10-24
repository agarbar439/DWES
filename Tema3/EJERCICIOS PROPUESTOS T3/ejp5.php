<?php
// Web de referencia: https://github.com/PHPMailer/PHPMailer

// Importar clases de PhpMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Funcion para enviar elemail
function sendEmail($enviarA, $nombre, $subject, $cuerpo) {
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                   
        $mail->isSMTP(); // Enviar usando SMTP
        $mail->Host       = 'smtp.gmail.com';                    
        $mail->SMTPAuth   = true;                                 
        $mail->Username   = 'xx@gmail.com'; // Nombre de usuario 
        $mail->Password   = '@xxx'; // Contraseña 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;        
        $mail->Port       = 587;                                  

        // Destinatarios
        $mail->setFrom('xx@gmail.com', 'Mailer'); // Establecer el remitente
        $mail->addAddress($enviarA, $nombre); // Agregar el destinatario
  
        // Contenido
        $mail->isHTML(true);                                    
        $mail->Subject = $subject; // Asunto del correo
        $mail->Body    = $cuerpo;  // Cuerpo del correo
        $mail->AltBody = strip_tags($cuerpo);

        $mail->send(); // Enviar el correo
        echo 'El mensaje ha sido enviado';
    } catch (Exception $e) {
        // Mostrar error en caso de que no se envíe el mensaje
        echo "El mensaje no pudo ser enviado. Error del Mailer: {$mail->ErrorInfo}";
    }
}

?>