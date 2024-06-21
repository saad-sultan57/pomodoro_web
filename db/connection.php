<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pomodoro";

// Create connection
$connect = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($connect) {
   echo "";
}else{
    echo "Connection Not Established Successfully"; 
}


// $connect->close();
?>
