<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer();
$mail->setFrom('exemplo@seudominio.com', 'Seu Nome');
$mail->addAddress('destino@exemplo.com', 'Destinatário');
$mail->Subject = 'Teste';
$mail->Body = 'Corpo do e-mail';

if (!$mail->send()) {
    echo 'Erro ao enviar: ' . $mail->ErrorInfo;
} else {
    echo 'E-mail enviado com sucesso!';
}
?>
