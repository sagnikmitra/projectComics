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
    $encript = openssl_encrypt($email, $ciphering,
    $encryption_key, $options, $encryption_iv);
    if ($email==$decript)
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
            <?php include "body.php"; ?>
            <h4 class="text-success">Successfully Unsubscribed</h4>
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
    <?php include "body.php"; ?>
            <h4 class="text-danger">Invalid Email!</h4>
        </div>
    </div>
    </body>
    </html>
    <?php }
?>
