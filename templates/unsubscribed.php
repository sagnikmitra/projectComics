<?php include "database.php" ?>
<?php
ini_set('display_errors', 0);
$email = $_POST["email"];
$query = "SELECT * FROM users";
$result = mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc($result))
{

    $database_username = $row["username"];
    if ($email==$database_username)
    {
        $query = "DELETE FROM users WHERE username = '$email'";
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
