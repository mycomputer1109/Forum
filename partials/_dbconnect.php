<?php
// code to conncet to the database

$servername = "localhost";
$username = "root";
$password = "";
$database_name = "idiscuss_db";

$conn = mysqli_connect($servername, $username, $password, $database_name);
if(!$conn){
    die("Unable to conncet");
}else{
    // echo "Connected to the database.";
}

?>