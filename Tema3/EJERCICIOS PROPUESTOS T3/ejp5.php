<?php
use PHPMailer\PHPMailer\PHPMailer;
require "vendor/autoload.php";

//$mail = new PHPMailer();
$mail->IsSMTP();

//Cambiar a 0 para no ver mensajes de error
$mail->SMTPDebug = 2;
$mail->SMTPAuth = true;
$mail->SMTPSecure = "tls";
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;

// Introducir usuario de google
$mail->Username = "";
//Introducir clave
$mail->Password = "";
$mail->setFrom("user@gmail.com","Test");
//Asunto
$mail->Subject = "Correo de prueba";
//Cuerpo
$mail->MsgHTML("");
// Adjuntos
$mail->addAttachment("");
//Destinatario
$address = "destino@servidor.com";
$mail->AddAddress($address, "Test");

//Enviar
$resul = $mail->Send();
if(!$resul ) {
    echo "Error". $mail->ErrorInfo;
} else{
    echo "Enviado";
}

?>