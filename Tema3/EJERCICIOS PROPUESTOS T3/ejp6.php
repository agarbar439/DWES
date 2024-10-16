<?php
// Web de referencia: https://github.com/PHPMailer/PHPMailer

// Importar clases de PhpMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//require 'vendor/autoload.php';

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

// Procesar el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
    $email = $_POST['email'];
    $nombreDesti = $_POST['nombre'];
    $subject = $_POST['subject'];
    $mensaje = $_POST['mensaje'];

    // Llamar a la función para enviar el correo
    sendEmail($email, $nombreDesti, $subject, $mensaje);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio Propuesto 6</title>
</head>
<body>
    <h2>Envía un mensaje</h2>
    <form method="POST" action="">
        <label for="nombre">Nombre: <input type="text" name="nombre" id="nombre" required></label><br><br>
        <label for="email">Email: <input type="email" name="email" id="email" required></label><br><br>
        <label for="subject">Sujeto: <input type="text" name="subject" id="subject" required></label><br><br>
        <label for="mensaje">Mensaje: <textarea name="mensaje" id="mensaje" rows="8" cols="20" required></textarea></label><br><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
