<?php 

// code to connect to the database

$host = 'localhost';
$user = 'root';
$password = '';
$db = '';

$conn = mysqli_connect($host, $user, $password, $db);

if(!$conn)
    echo "Connection problem";
