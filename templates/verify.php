<?php include "database.php"  ?>
<?php
$username = $_GET["username"];
echo $username;
$ciphering = "AES-256-CBC";
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
$encryption_iv = '5489894647979744';
$encryption_key = "therewillbevkcpridemcbcfktu";
$encript_username = openssl_encrypt($username, $ciphering,
    $encryption_key, $options, $encryption_iv);
echo $encript_username;

$otp = $_GET['otp'];
 echo "<br>";
    echo $otp;
$querys = "SELECT * FROM users";
$result = mysqli_query($connection,$querys);
while ($row = mysqli_fetch_assoc($result)){

    $data_otp = $row['otp'];
    echo "<br>";
    echo $data_otp;
    if ($otp == $data_otp)
    {
        $query = "UPDATE users SET sub='yes' WHERE username = '$encript_username'";
        echo "<br>";
    echo $query;
        $updates = mysqli_query($connection,$query);
        if(isset($updates))
        {?>
            <?php include "header.php"; ?>
                <body>
            <div  class="jumbotron">
                <div class="container">
                    <h4>You are verified</h4>
                    <form method="POST" action="https://projectcomics.herokuapp.com/config.php">
                        <input class="btn btn-primary" type="submit" name="submit" value="Send Comics">
                    </form>
                </div>
            </div>
                </body>
            </html>
        <?php }
}}
?>
