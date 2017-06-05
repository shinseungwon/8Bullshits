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
$pass=$_GET['pass'];
$sql= "SELECT * FROM 8BULLSHITS.users WHERE name LIKE '$id' AND password LIKE '$pass'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    echo "1";
}else echo "0";

?>