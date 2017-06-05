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
if($_GET['search']!=""){
$title=$_GET['search'];
$sql= "SELECT * FROM 8BULLSHITS.articles WHERE title LIKE '%$title%' ORDER BY id DESC";
}else {
$sql= "SELECT * FROM 8BULLSHITS.articles ORDER BY id DESC";}
$result = $conn->query($sql);
echo "<h2 align='center' style='background-color:#cccccc'>Result of search '".$title."' by title.</h2>";
echo "<table class='surprise'>";

$x=0;
echo "<tr><td width='20%'></td><td width='20%'></td><td width='20%'></td><td width='20%'></td><td width='20%'></td></tr>";
while($row=$result->fetch_assoc()){

if($x%5==0) echo "<tr>";

echo "<td style='background-color:#".$row['bullshit'].$row['bullshit'].$row['truth'].$row['truth']."00'>";
echo "<a href='#openModal".$row['id']."'><img src='article/".$row['id'].".jpg' width='100%' height='250px'></a>";
echo "</td>";

if($x%5==4) echo "</tr>";


echo "<div id='openModal".$row['id']."' class='modalDialog'>";
echo "<div><a href='#close' title='Close' class='close'>X</a>";
$strings=str_replace("\n","<br>",$row['sentence']);
echo "<h1 align='center'>".$row['title']."</h1>";
echo "<h2 align='center'><img src='article/".$row['id'].".jpg' width='400px' height='500px'></h2><br><h3 align='center'>".$strings."</h3>";
echo "<br><h1 align='center'>TRUTH : ".$row['truth']."&emsp;&emsp;&emsp;&emsp;BULLSHIT : ".$row['bullshit']."<h1>";

echo "</div></div>";



$x++;

}

echo "</table>";


?>