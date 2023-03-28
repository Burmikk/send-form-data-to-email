<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';

$mail = new PHPMailer(true);
$mail ->CharSet = 'UTF-8';
$mail ->IsHTML(true);

//От кого письмо
$mail ->setFrom('byrmik@gmail.com', 'Отправка Формы')
//Кому отпраиивть
$mail -> addAddress('byrmik@gmail.com')
//Тема письма
$mail->Subject = 'Привет! Это данные формы'

// Тело письма
$body = '<h1>Встречайте супер письмо!</h1>'


$body.='<p>Имя: '.$_POST['name']. '</p>'

$mail->Body = $body;

//Отправляем форму
if (!$mail->send()){
  $message = 'Ошибка'
}
else {
   $message = 'Данные отправлены'
}
$response = ['message' => $message];

header('Content-type: application/json')
echo json_encode($response)
?>