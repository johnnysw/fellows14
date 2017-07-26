<?php
    $username = $_GET["name"];
    $age = $_GET["age"];
    $callback = $_GET["callback"];
//    echo "alert('$age');";
    echo "$callback('$username')";


?>
