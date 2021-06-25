<?php include "database.php" ?>
<?php
ini_set('display_errors', 0);
$email = $_GET["username"];
$query = "SELECT * FROM users";
$result = mysqli_query($connection,$query);
$ciphering = "AES-256-CBC";
$options = 0;
$encryption_iv = '5489894647979744';
$encryption_key = "therewillbevkcpridemcbcfktu";
$decryption_iv = '5489894647979744';
$decryption_key = "therewillbevkcpridemcbcfktu";

while($row = mysqli_fetch_assoc($result))
{

    $database_username = $row["username"];
    $decrypt = openssl_decrypt($database_username, $ciphering, $decryption_key, $options, $decryption_iv);
    $encript = openssl_encrypt($email, $ciphering,$encryption_key, $options, $encryption_iv);
    if ($email==$decrypt)
    {
        $query = "DELETE FROM users WHERE username = '$encript'";
        $result = mysqli_query($connection,$query);
        if(!$result)
        {
            die("Queary Failed");
        }
        else
            { ?>
            <?php include "header.php"; ?>
            <body class="mw">
            <h4 style="color: #2EC486">Successfully Unsubscribed</h4>
            </div>
            </div>
            </body>
            </html>
    <?php  }
                 }

}
if ($email !=$database_username)
{?>


    <?php include "header.php"; ?>
    <body class="mw">
            <h4 style="color: red">Invalid Email!</h4>
        </div>
    </div>
    </body>
    </html>
    <?php }
?>
