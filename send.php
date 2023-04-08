<?php
  require 'PHPMailer-master/src/PHPMailer.php';
  require 'PHPMailer-master/src/SMTP.php';
  require 'PHPMailer-master/src/Exception.php';

# проверка, что ошибки нет
  if (!error_get_last()) {

    // Переменные, которые отправляет пользователь
    // $name = $_POST['name'] ;
    // $email = $_POST['email'];
    // $text = $_POST['text'];
    // $file = $_FILES['myfile'];

    $name = $_POST["first-name"];
    $last = $_POST["last-name"];
    $phone = $_POST["phone-number"];
    $email = $_POST["email"];
    
    
    // Формирование самого письма
    $title = "Заголовок письма";
    $body = "
    <h2>Новий лист</h2>
    <b>Імя:</b> $name<br>
    <b>Прізвище:</b> $last<br>
    <b>Телефон:</b> $phone<br>
    <b>Почта:</b> $email<br><br>
    ";
    
    // Настройки PHPMailer
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    //$mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['data']['debug'][] = $str;};
    
    // Настройки вашей почты
    $mail->Host       = ''; // SMTP сервера вашей почты
    $mail->Username   = ''; // Логин на почте
    $mail->Password   = ''; // Пароль на почте
    $mail->SMTPSecure = '';
    $mail->Port       = ;
    $mail->setFrom(''); // Адрес самой почты и имя отправителя
    
    // Получатель письма
    $mail->addAddress('legeza.dmitriy@icloud.com');  
    
    
    // Прикрипление файлов к письму
    // if (!empty($file['name'][0])) {
    //     for ($i = 0; $i < count($file['tmp_name']); $i++) {
    //         if ($file['error'][$i] === 0) 
    //             $mail->addAttachment($file['tmp_name'][$i], $file['name'][$i]);
    //     }
    // }
    // Отправка сообщения
    $mail->isHTML(true);
    $mail->Subject = $title;
    $mail->Body = $body;    
    
    // Проверяем отправленность сообщения
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

// Отправка результата
header('Content-Type: application/json');
echo json_encode($data);
  
  
  
  
  // use PHPMailer\PHPMailer\PHPMailer;
  // use PHPMailer\PHPMailer\Exception;

  // require "PHPMailer-master/src/PHPMailer.php"
  // require "PHPMailer-master/src/Exception.php"

  // $mail = new PHPMailer(true);
  // $mail->CharSet = "UTF-8";

  // $name = $_POST["first-name"];
  // $last = $_POST["last-name"];
  // $phone = $_POST["phone-number"];
  // $email = $_POST["email"];

  // $mail->addAddress("legezad@gmail.com");
  // $mail->Subject = "Хело еврібаді";
  // $mail->Body = $name . ' ' . $last . ' ' . $phone . ' ' . $email;

  // $mail->send();






// require_once('phpmailer/PHPMailerAutoload.php');

// // Отримуємо дані з форми
// $data = json_decode(file_get_contents('php://input'), true);

// // Відправляємо електронну пошту
// $mail = new PHPMailer();
// $mail->CharSet = 'UTF-8';
// $mail->setFrom('example@example.com', 'My Website');
// $mail->addAddress('legezad@gmail.com');
// $mail->isHTML(true);
// $mail->Subject = 'New Form Submission';
// $mail->Body = 'First Name: ' . $data['firstName'] . '<br>' .
//              'Last Name: ' . $data['lastName'] . '<br>' .
//              'Phone Number: ' . $data['phoneNumber'] . '<br>' .
//              'Email: ' . $data['email'] . '<br>' .
//              'Business Name: ' . $data['businessName'] . '<br>' .
//              'Business Address 1: ' . $data['businessAddress1'] . '<br>' .
//              'Business Address 2: ' . $data['businessAddress2'] . '<br>' .
//              'City: ' . $data['city'] . '<br>' .
//              'State or Province: ' . $data['stateOrProvince'] . '<br>' .
//              'Country: ' . $data['country'] . '<br>' .
//              'Zip or Postal Code: ' . $data['zipOrPostalCode'] . '<br>' .
//              'Years in Business: ' . $data['yearsInBusiness'] . '<br>' .
//              'Tax ID: ' . $data['taxId'] . '<br>' .
//              'Website: ' . $data['website'] . '<br>' .
//              'Other Brands You Sell: ' . $data['otherBrands'] . '<br>' .
//              'Additional Information: ' . $data['additionalInfo'];
// if(!$mail->send()) {
//   http_response_code(500);
//   echo json_encode(array('message' => 'Помилка при відправці електронної пошти: ' . $mail->ErrorInfo));
// } else {
//   http_response_code(200);
//   echo json_encode(array('message' => 'Дані успішно відправлені!'));
// }

  
?>
