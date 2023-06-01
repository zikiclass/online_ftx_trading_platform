<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'vendor/autoload.php';
$mail = new PHPMailer(true);
try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'tor101.truehost.cloud';
    $mail->SMTPAuth = true;
    $mail->Username = 'support@onlineftxtrading.com';
    $mail->Password = 'onlineftx@23';
    $mail->SMTPSecure = 'startls';
    $mail->Port = 587;
    $mail->setFrom('support@onlineftxtrading.com', 'Online FTX Trading');
    $mail->addAddress('rosafetrade@gmail.com');
    $mail->addReplyTo('fizjerry9@gmail.com', 'Online FTX Trading');
    $mail->isHTML(true);
    $mail->Subject = 'Registration Successful';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
