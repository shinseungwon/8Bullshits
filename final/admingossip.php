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
    
	<td align="right"><img src="userprofile/admin.jpg" width="40px" height="40px">Welcome&nbsp;admin!&emsp;<a href="logout.php" style="error">Log out</a>&emsp;&emsp;</td>
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

$sqln= "SELECT * FROM 8BULLSHITS.notice ORDER BY id DESC";
$resultn = $conn->query($sqln); 
echo "<table id='customers'>";
echo "<tr><td align='center' colspan='5'><h1 align='center'>GOSSIP</h1><br></td></tr>";
echo "<tr><th>ID</td><th>DATE OF PREPARATION</td><th width='60%'>TITLE</td><th>PREPARED BY</th><th>delete</th></tr>";


if(!isset($_GET['var2'])) $m=0;
else $m=$_GET['var2']+1;
if(!isset($_GET['var1'])) $l=0;

$q=0;
if ($resultn->num_rows > 0) {
    // output data of each row
    while($rown = $resultn->fetch_assoc()) {
	
	if($q%2==0)
		echo "<tr>";
	else echo "<tr class='alt'>";
	echo "<td width='5%'>";
	echo $rown['id'];
	echo "</td>";
	echo "<td width='10%'>";
	echo $rown['createdate'];
	echo "</td>";	
	echo "<td>";
	echo "<a href='adminnoticebody.php?id=".$rown['id']."'>".$rown['title']."</a>";
	echo "</td>";
	echo "<td>";
	echo "<img src='userprofile/".$rown['creator'].".jpg' width='20px' height='20px'> ".$rown['creator']."</a>";
	echo "</td>";	
	echo "<td align='right' width='5%'><a href='deletenotice.php?id=".$rown['id']."'>delete</a></td>";
	echo "</tr>";
	
	$q++;
	
}

}
echo "</table>";

echo "<h4 align='center'>";
for($v=0;$v<10;$v++){
	echo "<a href='notices.php?var1=".$v."&var2=".($m-1)."'>[".($v+1)."]</a>&nbsp;";
}
echo "<a href='notices.php?var2=".$m."'>next</a>";

echo "</h4>";

?>

<h4 style="font-family:italic" align="center" ><hr>copyright(c) 2014 All rights reserved by Shin<h4>
</BODY>
</HTML>