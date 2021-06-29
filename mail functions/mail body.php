<?php
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Username = "shuvratcp@gmail.com";
$mail->Password = "iamacool";
$mail->setFrom("shuvratcp@gmail.com");
?>
