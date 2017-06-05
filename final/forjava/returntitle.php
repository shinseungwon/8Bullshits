<?php
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
$sql= "SELECT * FROM 8BULLSHITS.notice WHERE id LIKE '$id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();
	$output=$row['title'];
}
echo $output;
?>