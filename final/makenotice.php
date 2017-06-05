<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "5119861";
$dbname = "8bullshits";
$title=$_POST['title'];
$body=$_POST['body'];
$user=$_SESSION['user'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO 8BULLSHITS.notice (title,body,creator) VALUES ('$title','$body','$user')";
$result = $conn->query($sql);

				
$conn->close();

header("Location:notices.php");

?>