<?php

// Connect to MySQL
$con = mysqli_connect("localhost","root","","shoutout");

// Test connection
if(mysqli_connect_errno()){
    die("Failed to connect to MySQL DB: " . mysqli_connect_error());
}

?>