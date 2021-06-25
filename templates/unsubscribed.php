<?php include  "database.php" ?>
<?php
ini_set('display_errors', 0);
$email = $_GET["username"];
$query = "SELECT * FROM users";
$result = mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc($result))
{
    $database_username = $row["username"];
    $encryption_iv = '5489894647979744';
    $encryption_key = "therewillbevkcpridemcbcfktu";
    $ciphering = "AES-256-CBC";
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
    $decryption_iv = '5489894647979744';
    $decryption_key = "therewillbevkcpridemcbcfktu";
    $decryptions = openssl_decrypt($database_username, $ciphering, $decryption_key, $options, $decryption_iv);
    if ($email==$decryptions)
    {
        $encript_username = openssl_encrypt($email, $ciphering,$encryption_key, $options, $encryption_iv);
        $query = "DELETE FROM users WHERE username = '$encript_username'";
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