<?php
session_start();


$servername = "localhost";
$username = "root";
$password = "5119861";
$dbname = "8bullshits";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$id=$_GET['id'];


$sqln= "DELETE FROM 8bullshits.subcomment WHERE id LIKE '$id'";
$resultn = $conn->query($sqln); 




header('Location: ' . $_SERVER['HTTP_REFERER']);

?>