<?php
$connection = mysqli_connect("remotemysql.com",
    "LydSLSny7j",
    "hOWxQIyzud",
    "LydSLSny7j");
if($connection){
    echo "connected";
    }
else{
    echo "not connected";
}

?>
