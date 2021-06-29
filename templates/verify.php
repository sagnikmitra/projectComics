<?php include "database.php"  ?>
<?php
$username = $_GET["username"];
$ciphering = "AES-256-CBC";
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
$encryption_iv = '5489894647979744';
$encryption_key = "therewillbevkcpridemcbcfktu";
$encript_username = openssl_encrypt($username, $ciphering, $encryption_key, $options, $encryption_iv);
$token = $_GET['token'];
$querys = "SELECT * FROM users";
$result = mysqli_query($connection,$querys);
while ($row = mysqli_fetch_assoc($result)){
    echo "whiles";
    $data_token = $row['token'];
    echo $data_token;
    if ($data_token == $token)
    {
        $query = "UPDATE users SET sub='yes' WHERE username = '$encript_username'";
        $updates = mysqli_query($connection,$query);
        if(isset($updates))
        {?>
            <?php include "header.php"; ?>
                <body>
                    <h4 style="color: #2EC486">You are verified</h4>
                </body>
            </html>
        <?php }
    }
    else{
        echo "Error 404";
    }
}
?>

