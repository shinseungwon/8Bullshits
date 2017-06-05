<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "5119861";
$dbname = "8bullshits";
$id=$_GET['id'];

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



$sqlo= "UPDATE notice SET bad=bad+1 WHERE id='$id'";
$resulto = $conn->query($sqlo); 


header('Location: ' . $_SERVER['HTTP_REFERER']);


?>