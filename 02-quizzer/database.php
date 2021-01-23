<?php

// Create Connection Credentials
$db_host = 'localhost';
$db_name = 'quizzer';
$db_user = 'root';
$db_pass = '';


// Create the MySQLi Object (OO version rather than procedural version)
$mysqli = new mysqli($db_host,$db_user,$db_pass,$db_name);

// Error handler
if($mysqli->connect_error){
    printf("Connect Failed: %s\n", $mysqli->connect_error);
    exit();
}


