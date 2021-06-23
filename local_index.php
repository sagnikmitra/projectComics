<?php
use PHPMailer\PHPMailer\PHPMailer;
require "Exception.php";
require "PHPMailer.php";
require "SMTP.php";

function mails()
{

    $connection = mysqli_connect("localhost",
        "root",
        "",
        "loginapp");
    if ($connection) {
        echo "we are connected";
    } else {
        die("database connection faild");
    }

    $random = rand(1, 100);
    $ch = curl_init();
    $url = "https://xkcd.com/$random/info.0.json";
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $resp = curl_exec($ch);
    if ($e = curl_errno($ch)) {
        echo "$e";

    } else {

        $data = json_decode($resp, true);
        $url = $data["img"];
        $img = 'myImage.jpg';
        file_put_contents($img, file_get_contents($url));
        $sub = $data["safe_title"];
        $body = $data["transcript"];
    }

    $query = "SELECT * FROM users";
    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $database_username = $row["username"];
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Username = "shuvratcp@gmail.com";
        $mail->Password = "iamacool";
        $mail->setFrom("shuvratcp@gmail.com");
        $mail->addAddress("$database_username");
        $mail->addReplyTo("shuvratcp@gmail.com");
        $mail->addAttachment("myImage.jpg", "image.jpg");
        $mail->addEmbeddedImage("myImage.jpg", "my.image", "my.image", "base64", "image/jpeg");
        $mail->isHTML(true);
        $mail->Subject = "COMICS";
        $mail->Body = "<h3 style='color: aqua'>$sub</h3><p style='color: darkseagreen'><em>$body</em></p><br><img src='cid:my.image' alt='image'/><br></nr><h3><a href='http://localhost:63342/email/templates/unsubscribe.php'>Unsubscribe</a></h3>";

        $mail->send();

    }
}
while(true)
{
    mails();
    sleep(5);
}
?>


