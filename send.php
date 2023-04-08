<?php
  require 'PHPMailer-master/src/PHPMailer.php';
  require 'PHPMailer-master/src/SMTP.php';
  require 'PHPMailer-master/src/Exception.php';

  if (!error_get_last()) {

    $name = $_POST["first-name"];
    $last = $_POST["last-name"];
    $phone = $_POST["phone-number"];
    $email = $_POST["email"];
    
    $title = "Заголовок письма";
    $body = "
    <h2>Новий лист</h2>
    <b>Імя:</b> $name<br>
    <b>Прізвище:</b> $last<br>
    <b>Телефон:</b> $phone<br>
    <b>Почта:</b> $email<br><br>
    ";
    
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    //$mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['data']['debug'][] = $str;};
    
    $mail->Host       = ''; // SMTP сервера вашої пошти
    $mail->Username   = ''; // Логін на пошті
    $mail->Password   = ''; // Пароль на пошті
    $mail->SMTPSecure = '';
    $mail->Port       = ;
    $mail->setFrom(''); // Адреса пошти та ім'я відправника
    
    // Отримувач листа
    $mail->addAddress('legeza.dmitriy@icloud.com');  
    
    // Відправка повідомлення
    $mail->isHTML(true);
    $mail->Subject = $title;
    $mail->Body = $body;    
    
    // Перевіряємо відправленість повідомлення
    if ($mail->send()) {
        $data['result'] = "success";
        $data['info'] = "Сообщение успешно отправлено!";
    } else {
        $data['result'] = "error";
        $data['info'] = "Сообщение не было отправлено. Ошибка при отправке письма";
        $data['desc'] = "Причина ошибки: {$mail->ErrorInfo}";
    }
    
} else {
    $data['result'] = "error";
    $data['info'] = "В коде присутствует ошибка";
    $data['desc'] = error_get_last();
}

// Овідправка результату
header('Content-Type: application/json');
echo json_encode($data);
?>
