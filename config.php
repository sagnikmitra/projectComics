<?php include 'templates/database.php';?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
require "Exception.php";
require "PHPMailer.php";
require "SMTP.php";

// function mails()
// {
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
        $ciphering = "AES-256-CBC";
        $options = 0;
        $decryption_iv = '5489894647979744';
        $decryption_key = "therewillbevkcpridemcbcfktu";
        $decryptions = openssl_decrypt($database_username, $ciphering, $decryption_key, $options, $decryption_iv);
        $mail = new PHPMailer;
        ?>
        <?php include 'mail functions/mail body.php' ?>
        <?php
        $mail->addAddress("$decryptions");
        $mail->addReplyTo("shuvratcp@gmail.com");
        $mail->addAttachment("myImage.jpg", "image.jpg");
        $mail->addEmbeddedImage("myImage.jpg", "my.image", "my.image", "base64", "image/jpeg");
        $mail->isHTML(true);
        $mail->Subject = "COMICS";
        $mail->Body = "<h3>$sub</h3><em>$body</em><br><img src='cid:my.image' alt='image'/><br><h3><a href='https://projectcomics.herokuapp.com/templates/unsubscribed.php?username=$decryptions'>Unsubscribe</a></h3>";

        $mail->send();

    }
// }
// while(true)
// {
//     mails();
//     sleep(5);
// }
?>


