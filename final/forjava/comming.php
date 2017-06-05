<?php

$servername = "localhost";
$username = "root";
$password = "5119861";
$dbname = "8bullshits";
$id=$_GET['id'];
$pass=$_GET['pass'];
$cpass=$_GET['cpass'];
$email=$_GET['email'];
$gender=$_GET['gender'];
$age=$_GET['age'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO 8BULLSHITS.users (name,password,email,gender,age) VALUES ('$id','$pass','$email','$gender','$age')";
if($pass==$cpass){
$result = $conn->query($sql);
echo "1";
}
else echo "0";
				
$conn->close();



?>