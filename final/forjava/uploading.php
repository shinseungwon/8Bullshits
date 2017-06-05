<?php

$servername = "localhost";
$username = "root";
$password = "5119861";
$dbname = "8bullshits";
$title=$_GET['title'];
$body=$_GET['body'];
$creator=$_GET['creator'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO 8BULLSHITS.notice (title,body,creator) VALUES ('$title','$body','$creator')";
$result = $conn->query($sql);

				
$conn->close();



?>