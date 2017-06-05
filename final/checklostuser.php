<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "5119861";
$dbname = "8bullshits";


$fid=$_POST["fid"];
$femail=$_POST["femail"];


$_SESSION["overpass"]=null;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT password FROM users where name LIKE '$fid' AND email LIKE '$femail'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$_SESSION["findit"]=1;
        $_SESSION["overpass"]=$row["password"];
		header("Location:findpass.php");
    }
} else{$_SESSION["cantfind"]=1;
		header("Location:findpass.php");
		}
				
$conn->close();





?>