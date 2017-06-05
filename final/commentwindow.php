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




$sqld= "SELECT * FROM 8BULLSHITS.comment WHERE articlenumber LIKE '".$_GET['id']."' ORDER BY id DESC";
$resultd = $conn->query($sqld);
$k=0; 

while($rows=$resultd->fetch_assoc()){
$rid=$rows['id'];
echo "<p1><img src='userprofile/".$rows['name'].".jpg' width='50px' height='50px'> ".$rows['name']."&nbsp;:&nbsp;".$rows['comment']."&emsp;";
if(isset($_GET['code']))
	echo "<a href='delete.php?id=".$rid."'>delete</a>";

echo "</p1>";

echo "<br><hr>";
$k++;
}


?>