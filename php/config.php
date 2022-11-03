<?php
$host = "localhost";
$username = "sarmad";
$password = "sarmad";
$database = "myclinic";
$conn = new mysqli($localhost, $username, $password, $database);
if( $conn->connect_error){
    die('Error: ' . $conn->connect_error);
}
?>
