<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->setLanguage('ru', 'phpmailer/language');
$mail->isHTML(true);
$mail->setFrom('mail@sopulit.com');
$mail->addAddress('yehico7613@sopulit.com');
$mail->Subject = 'Данные';


$title = "Заголовок письма";
$body = '<h3>Заявка с сайта </h3>';

if (trim(!empty($_POST['name']))) {
  $body .= '<p><strong>Имя:</strong> ' . $_POST['name'] . '</p>';
}
if (trim(!empty($_POST['phone']))) {
  $body .= '<p><strong>Телефон:</strong> ' . $_POST['phone'] . '</p>';
}
if (trim(!empty($_POST['email']))) {
  $body .= '<p><strong>Почтовый ящик:</strong> ' . $_POST['email'] . '</p>';
}



$mail->isHTML(true);
$mail->Subject = $title;
$mail->Body = $body;



if (!$mail->send()) {
  $message = 'Произошла ошибка';
} else {
  $message =  'Данные отправлены!';
}

$response = ['message' => $message];
header('Content-type: application/json');
echo json_encode($response);
