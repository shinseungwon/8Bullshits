<?php
session_start();

$id= $_GET['id'];
$comment= $_POST['comment'];
$user=$_SESSION['user'];


$servername = "localhost";
$username = "root";
$password = "5119861";
$dbname = "8bullshits";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sqlc= "INSERT INTO 8BULLSHITS.comment (name,articlenumber,comment) VALUES ('$user','$id','$comment')";
$resultc = $conn->query($sqlc); 


			
$conn->close();
header('Location: ' . $_SERVER['HTTP_REFERER']);

?>