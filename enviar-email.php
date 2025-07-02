<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = getenv('EMAIL_USUARIO');
    $mail->Password = getenv('EMAIL_SENHA');
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom(getenv('EMAIL_USUARIO'), 'Op.Dados');
    $mail->addAddress('op.dados@g.globo', 'Eduardo');

    $mail->Subject = 'Teste';
    $mail->Body    = 'Este é um teste de email';

    $mail->send();
    echo 'Email enviado com sucesso!';
} catch (Exception $e) {
    echo "Erro: {$mail->ErrorInfo}";
}

