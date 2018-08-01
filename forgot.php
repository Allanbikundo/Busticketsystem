<?php
use PHPMailer\PHPMailer\PHPMailer;
include "header.php";
if(isset($_POST['forgot'])){
    $email = $_POST['email'];
    $stmt = $dbh->prepare('SELECT * FROM user_login WHERE email=?');
    $stmt->bindParam(1,$email);
    $stmt->execute();
    $row = $stmt->fetch();
    $email2 = $row['email'];
    $hash = $row['hash'];
    $un = $row['username'];
    if($email==$email2){

              require 'assets/libs/phpmailer/vendor/autoload.php';
              //Create a new PHPMailer instance
              $mail = new PHPMailer;
              //Tell PHPMailer to use SMTP
              $mail->isSMTP();
              $mail->SMTPDebug = 2;
              $mail->Host = 'smtp.gmail.com';

              $mail->Port = 587;
              //Set the encryption system to use - ssl (deprecated) or tls
              $mail->SMTPSecure = 'tls';
              //Whether to use SMTP authentication
              $mail->SMTPAuth = true;
              //Username to use for SMTP authentication - use full email address for gmail
              $mail->Username = "allanbmageto@gmail.com";
              //Password to use for SMTP authentication
              $mail->Password = "fksbjgkfczywscgl";
              //Set who the message is to be sent from
              $mail->setFrom('allanbmageto@gmail.com', 'First Last');
              //Set an alternative reply-to address
              $mail->addReplyTo('allanbikundo@gmail.com', 'First Last');
              //Set who the message is to be sent to
              $mail->addAddress( $email, 'John Doe');
              //Set the subject line
              $mail->Subject = 'Forgot password multi login';
              //Read an HTML message body from an external file, convert referenced images to embedded,
              //convert HTML into a basic plain-text alternative body
              $mail->body = '

                    Forgot your password

                    ------------------------
                    Username: '.$un.'
                    ------------------------

                    Please click this link to set new password:
                    http://kautube.com/demo/user_login/newpassword.php?email='.$email.'&hash='.$hash.'';
              //Replace the plain text body with one created manually
              $mail->AltBody = 'This is a plain-text message body';
              //Attach an image file

              //send the message, check for errors
              if (!$mail->send()) {
                echo '<div class="alert alert-success" role="alert">Email has been sent to your email</div>';
              } else {
                echo '<div class="alert alert-danger" role="alert">Your email is not registered</div>';

              }

    }
}
?>
<div class="panel panel-default" style="margin-top:80px;">
    <div class="panel-body">
        <h3 class="text-center" style="font-weight:bolder;margin:10px 0;">Forgot Password</h3>
        <form method="post">
            <div class="form-group">
                <label for="email">Enter your email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan Surel Anda" required/>
            </div>
            <button type="submit" name="forgot" class="btn btn-primary btn-block">Kirim</button>
            <p style="clear:both;">
                <div style="float:left;"><a href="index.php">Login Area</a></div>
                <div style="float:right;"><a href="register.php">Register New User</a></div>
            </p>
        </form>
    </div>
</div>
<?php
include "footer.php";
?>
