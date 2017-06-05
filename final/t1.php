<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "5119861";
$dbname = "8bullshits";


	$id=$_GET['idf'];
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



$sqlb= "UPDATE articles SET truth=truth+1 WHERE id='$id'";
$resultb = $conn->query($sqlb); 

header('Location: ' . $_SERVER['HTTP_REFERER']);

?>