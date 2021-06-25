<?php
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Username = "";#your email
$mail->Password = "";#your password
$mail->setFrom("shuvratcp@gmail.com");
?>
