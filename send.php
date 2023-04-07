<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require "PHPMailer-master/src/PHPMailer.php"
  require "PHPMailer-master/src/Exception.php"

  $mail = new PHPMailer(true);
  $mail->CharSet = "UTF-8";

  $name = $_POST["first-name"];
  $last = $_POST["last-name"];
  $phone = $_POST["phone-number"];
  $email = $_POST["email"];

  $mail->addAddress("legezad@gmail.com");
  $mail->Subject = "Хело еврібаді";
  $mail->Body = $name . ' ' . $last . ' ' . $phone . ' ' . $email;

  $mail->send();
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
