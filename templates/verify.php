<?php include "database.php"  ?>
<?php
$username = $_GET["username"];
$connection = mysqli_connect("remotemysql.com",
    "LydSLSny7j",
    "hOWxQIyzud",
    "LydSLSny7j");
$ciphering = "AES-256-CBC";
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
$encryption_iv = '5489894647979744';
$encryption_key = "therewillbevkcpridemcbcfktu";
$encript_username = openssl_encrypt($username, $ciphering,
    $encryption_key, $options, $encryption_iv);
$otp = $_GET['otp'];
$querys = "SELECT * FROM users";
$result = mysqli_query($connection,$querys);
while ($row = mysqli_fetch_assoc($result)){

    $data_otp = $row['otp'];
    if ($otp == $data_otp)
    {
        $query = "UPDATE users SET sub='yes' WHERE username = '$encript_username'";
        $updates = mysqli_query($connection,$query);
        if(isset($updates))
        {?>
            <?php include "header.php"; ?>
                <body class="mw">
                    <h4 style="color: #2EC486">You are verified</h4>
                </body>
            </html>
        <?php }
}}
?>
