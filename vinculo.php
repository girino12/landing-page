<?php

$firstname = $_POST['firstname'];
$email = $_POST['email'];
$lastname = $_POST['lastname'];
$message = $_POST['message'];


require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {

	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'lok6379@gmail.com';
	$mail->Password = 'exzzwezrwgtvuvpw';
	$mail->Port = 587;
$mail->setFrom('lok6379@gmail.com');
	$mail->addAddress('lok6379@gmail.com');

	$mail->isHTML(true);
	$mail->Subject = 'email suporte';
	$mail->Body = "Nome: $firstname<br>".
                  "sobrenome: $lastname<br>".
                  "Email: $email<br>".
                  "mensagem: $message<br>"
                  ;

	$mail->AltBody = 'Chegou o email referente ao site';

	if($mail->send()) {

header("Location: index.html?enviado=true");
    exit;
}
} catch (Exception $e) {
	echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}
