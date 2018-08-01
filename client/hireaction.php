<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();
include_once '../bus/db.php';
if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
  if ($_REQUEST['action'] == 'quotation30' && !empty($_SESSION['userid'])) {
    $query = "INSERT INTO hires VALUES ('', '".$_SESSION['userid']."','30', '".$_SESSION['number_of_buses_30']."','".$_SESSION['number_of_days']."', '".$_SESSION['price30']."','0' )";
    mysqli_query($MySQLiconn, $query);
    //send mail
    if (isset($_SESSION['userid'],$_SESSION['number_of_buses_30'],$_SESSION['number_of_days'],$_SESSION['price30'])) {
      $fields = [
        'number_of_buses' => $_SESSION['number_of_buses_30'],
        'no_of_days'  => $_SESSION['number_of_days'],
        'price' => $_SESSION['price30']
      ];
    }
    require '../assets/libs/PHPMailer/vendor/autoload.php';
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = "busreservationkenya@gmail.com";
    $mail->Password = "nelly123456";
    $mail->setFrom(' busreservationkenya@gmail.com', 'Bus Reservation System');
    $mail->addReplyTo('gathoninelly5@gmail.com', 'Nelly Gathoni');
    $mail->addAddress('noo@gmail.com','name');
    $mail->Subject = 'BUS RESERVATION SYSTEM';
    $mail->Body    = <<<EOT
                      This is the quotation details of a 30 bus seater
                      Number of buses {$fields['number_of_buses']}
                      Number of days  {$fields['no_of_days']}
                      Price {$fields['price']}
EOT;
    $mail->AltBody = 'This is a plain-text message body';
    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message sent!";
    }
    printf("New record has id %d.\n", mysqli_insert_id($MySQLiconn));
  }
  if ($_REQUEST['action'] == 'quotation60' && !empty($_SESSION['userid'])) {
    $query = "INSERT INTO hires VALUES ('', '".$_SESSION['userid']."','60', '".$_SESSION['number_of_buses_60']."','".$_SESSION['number_of_days']."', '".$_SESSION['price60']."','0' )";
    mysqli_query($MySQLiconn, $query);
    if (isset($_SESSION['userid'],$_SESSION['number_of_buses_60'],$_SESSION['number_of_days'],$_SESSION['price60'])) {
      $fields = [
        'number_of_buses' => $_SESSION['number_of_buses_60'],
        'no_of_days'  => $_SESSION['no_of_days'],
        'price' => $_SESSION['price60']
      ];
    }
    require '../assets/libs/PHPMailer/vendor/autoload.php';
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = "busreservationkenya@gmail.com";
    $mail->Password = "nelly123456";
    $mail->setFrom(' busreservationkenya@gmail.com', 'Bus Reservation System');
    $mail->addReplyTo('noo@gmail.com', 'Nelly Gathoni');
    $mail->addAddress('gathoninelly5@gmail.com','name');
    $mail->Subject = 'BUS RESERVATION SYSTEM';
    $mail->Body    = <<<EOT
                      This is the quotation details of a 60 bus seater
                      Number of buses {$fields['number_of_buses']}
                      Number of days  {$fields['number_of_days']}
                      Price {$fields['price']}
EOT;
    $mail->AltBody = 'This is a plain-text message body';
    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message sent!";
    }
    printf("New record has id %d.\n", mysqli_insert_id($MySQLiconn));
  }
  }
else {
  header("Location: hire.php");
}
