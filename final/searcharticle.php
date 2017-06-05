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

echo "<div align='center'><h2>Search articles</h2><form action='searcharticle.php' method='post'><input type='radio' name='option' value='title'>Title<input type='radio' name='option' value='body'>Body<input type='radio' name='option' value='user'>User&emsp;<input type='text' name='para'><input type='submit' name='submit' value='Search'></form></div><br><hr>";

$para=$_POST['para'];
if(!isset($_POST['para']))
$sqlb= "SELECT * FROM 8BULLSHITS.articles ORDER BY id DESC";
else if($_POST['option']=='title')
$sqlb= "SELECT * FROM 8BULLSHITS.articles WHERE title LIKE '%$para%' ORDER BY id DESC" ;
else if($_POST['option']=='body')
$sqlb= "SELECT * FROM 8BULLSHITS.articles WHERE sentence LIKE '%$para%' ORDER BY id DESC" ;
else if($_POST['option']=='user')
$sqlb= "SELECT * FROM 8BULLSHITS.articles WHERE creater LIKE '%$para%' ORDER BY id DESC" ;
else{
echo "<h1 align='center'>SELECT RADIO BUTTON</h1>";
$sqlb= "SELECT * FROM 8BULLSHITS.articles ORDER BY id DESC";
}
$resultb = $conn->query($sqlb);
if(!isset($_GET['fmax']) || $_GET['fmax']==0) $max=5; 
$max=$_GET['fmax']+5;

if($max==5) $min=0;
else $min=$max-5;

	$i=0;
if ($resultb->num_rows > 0) {
    // output data of each row
    while($row = $resultb->fetch_assoc()) {
    if($i>=$max-5 && $i<$max) {
echo "<table style='width:70%' border='0px'  align='center' class='table1'>";
echo "<tr><td width='50%'>".$row['title']."&emsp;name:".$row['creater']."</td><td>Comments</td></tr>";
$strings=str_replace("\n","<br>",$row['sentence']);
echo "<tr><td  align='center'><img src='article/".$row['id'].".jpg' width='300px' height='400px'><br><hr><div align='left'><p1>".$strings."</p1></div>";
echo "</td><td valign='top'>";


echo "<iframe src='commentwindow.php?id=".$row['id']."' frameborder='0' width='100%' height='100%'></iframe>";

echo "</td></tr>";
echo "<tr><td><p1><div align='left'>Truth&nbsp;".$row['truth']."</div><img src='bar/".checker($row['truth'],$row['bullshit']).".jpg' width='100%' height='50px'><div align='right'>".$row['bullshit']."&nbsp;Bullshit</div></p1></td><td>";





echo "<div align='right'><a href='deletearticle.php?id=".$row['id']."'>delete article</a></div></td></tr>";
echo "</table>";
echo "<br>";
echo "<h3 align='center'>";
echo "<a href='t1.php?idn=".$row['id']."'>It's TRUTH</a>";
echo "&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;";
echo "<a href='b1.php?idn=".$row['id']."'>It's BULLSHIT</a>";
echo "</h3>";
echo "<br>";
}else if($i>=$max) break;

	$i++;		

    }
}





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