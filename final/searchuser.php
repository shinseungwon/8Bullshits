<!DOCTYPE HTML>
<?php session_start();




?>
<HTML>

<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="UTF-8">
		
		<meta name="viewport" content="width=device-width, initial-scale=1">


		
		
		<title>8BULLSHITS.COM</title>
		<div  class="table2">
		<link href="styles.css" type="text/css" rel="stylesheet">
		<link rel="shortcut icon" href="icon.jpg">
		<h1><a href="main.php"><img src="string.jpg" width="300px" height="50px"></a></h1>
		</div>
</HEAD>


<table style="width:100%" class="table1">
  <tr>
    <td style="padding:10px"><h3 style="font-size:150%">&emsp;</td></h3>
	<td align="right"><img src="userprofile/admin.jpg" width="40px" height="40px">Welcome&nbsp;admin!&emsp;<a href="logout.php" style="error">Log out</a>&emsp;&emsp;<a href="uploadnotice.php" style="error">POST NOTICE</a></td>
  </tr>

</table>

<BODY>
<br><br><br>
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

echo "<div align='center'><h2>Search users</h2><form action='searchuser.php' method='post'><input type='radio' name='option' value='name'>Name<input type='radio' name='option' value='email'>Email&emsp;<input type='text' name='para'><input type='submit' name='submit' value='Search'></form></div><br><hr>";

$para=$_POST['para'];
if(!isset($_POST['para']))
$sqlb= "SELECT * FROM 8BULLSHITS.users ORDER BY id DESC";
else if($_POST['option']=='name')
$sqlb= "SELECT * FROM 8BULLSHITS.users WHERE name LIKE '%$para%' ORDER BY id DESC" ;
else if($_POST['option']=='email')
$sqlb= "SELECT * FROM 8BULLSHITS.users WHERE email LIKE '%$para%' ORDER BY id DESC" ;
else{
echo "SELECT RADIO BUTTON";
$sqlb= "SELECT * FROM 8BULLSHITS.users ORDER BY id DESC";
}
$resultb = $conn->query($sqlb);
if(!isset($_GET['fmax']) || $_GET['fmax']==0) $max=5; 
$max=$_GET['fmax']+5;

if($max==5) $min=0;
else $min=$max-5;


echo "<table class='table1'>";

echo "<tr>";

echo "<td>image</td><td>id</td><td>name</td><td>password</td><td>email</td><td>gender</td><td>age</td>";

echo "</tr>";

	$i=0;
if ($resultb->num_rows > 0) {
    // output data of each row
    while($row = $resultb->fetch_assoc()) {
    if($i>=$max-5 && $i<$max) {
echo "<tr>";
echo "<td><img src='userprofile/".$row['name'].".jpg' width='50px' height='50px'></td>";
echo "<td>".$row['id']."</td>";
echo "<td>".$row['name']."</td>";
echo "<td>".$row['password']."</td>";
echo "<td>".$row['email']."</td>";
echo "<td>".$row['gender']."</td>";
echo "<td>".$row['age']."</td>";
echo "<td><a href='deleteuser.php?id=".$row['id']."'>ban</a></td>";
	
}else if($i>=$max) break;

	$i++;		

    }
}

echo "</table>";


echo "</td></tr></table>";



if($max>5) echo "<h1 align='center'><a href='searcharticle.php?fmax=".$min."'>PREV</a>&emsp;<a href='searcharticle.php?fmax=".$max."'>NEXT</a></h1>";
else echo "<h1 align='center'>&emsp;<a href='searcharticle.php?fmax=".$max."'>NEXT</a></h1>";
$conn->close();


function checker($x,$y){

return (int)(($x/($x+$y))*20);

}

?>



<h4 style="font-family:italic" align="center" ><hr>copyright(c) 2014 All rights reserved by Shin<h4>
</BODY>
</HTML>