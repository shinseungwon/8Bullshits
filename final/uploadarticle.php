<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "5119861";
$dbname = "8bullshits";
$title=$_POST['title'];
$description=$_POST['comment'];
$user=$_SESSION['user'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO 8BULLSHITS.articles (creater,title,sentence,truth,bullshit) VALUES ('$user','$title','$description','0','0')";
$result = $conn->query($sql);

$sqla= "SELECT id FROM 8BULLSHITS.articles WHERE title LIKE '$title'";
$resulta = $conn->query($sqla);
$row=$resulta->fetch_assoc();
rename("article/".$_SESSION['user'].".jpg","article/".$row['id'].".jpg");

				
$conn->close();

header("Location:fresh.php?var=fresh");

?>