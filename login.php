<?php include "templates/database.php"; ?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
require "Exception.php";
require "PHPMailer.php";
require "SMTP.php";
$username= $_GET['username'];
$ciphering = "AES-256-CBC";
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
$encryption_iv = '5489894647979744';
$encryption_key = "therewillbevkcpridemcbcfktu";
$encript_username = openssl_encrypt($username, $ciphering,
    $encryption_key, $options, $encryption_iv);
$token = md5(uniqid($username, true));
$query = "INSERT INTO users(username,otp,sub)";
$query .= "VALUES ('$encript_username','$token','no')";
$results = mysqli_query($connection,$query);
$mail = new PHPMailer;
?>
<?php include 'mail functions/mail body.php' ?>
<?php
$mail->addAddress("$username");
$mail->addReplyTo("shuvratcp@gmail.com");
$mail->isHTML(true);
$mail->Subject = "COMICS";
$mail->Body = "<h3 style='color: aqua'>Verification Mail</h3><p style='color: darkseagreen'><em>Click here for verifications</em></p></nr><h3><a href='https://projectcomics.herokuapp.com/templates/verify.php?username=$username&otp=$token'>verification</a></h3>";

if (!$mail->send()) { ?>
    <?php include "templates/header.php" ?>
    <body>
        <div class="jumbotron">
            <h3>Something went wrong!</h3>
        </div>
    </body>


<?php }  else { ?>

    <?php include "templates/header.php" ?>
    <body>
        <div class="jumbotron">
            <div class="container">
                <h2>Verification Link Send to your Email</h2>
            </div>

        </div>
    </body>


<?php }

?>