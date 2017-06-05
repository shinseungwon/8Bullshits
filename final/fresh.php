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
    <td style="padding:10px"><h2 style="font-size:150%"><a href="Fresh.php?var=fresh">Fresh</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="fresh.php?var=bullshit">Bullshit</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="fresh.php?var=truth" >Truth</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="notices.php" >Gossip</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="surprise.php" >Surprise</a></td></h2>
	<?php if(isset($_SESSION['user'])){ ?>
	<td align="right"><img src="userprofile/<?php echo $_SESSION['user']; ?>.jpg" width="40px" height="40px">Welcome&nbsp;<?php echo $_SESSION["user"]; ?>!&emsp;<a href="logout.php" style="error">Log out</a>&emsp;<a href="insertimg.php" style="error">Insert profile image!</a>&emsp;<a href="makearticle.php" style="error">POST</a></td>
    <?php }else{ ?>
	<td align="right"><form action="checkuser.php" method="post"><span class="error"><?php if($_SESSION["faildlogin"]==1) echo "* something wrong with your log in..."; $_SESSION["faildlogin"]=0; ?></span>
	ID: <input type="text" name="id">
	Password: <input type="password" name="password">
	<input type="submit" value="Log in"></form>
	<a href="findpass.php">Forgot Password?</a>&emsp;<a href="signin.php">Wanna join us?</a></td>	
	<?php } ?>




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



if(!isset($_GET['var'])){
$sqlb= "SELECT * FROM 8BULLSHITS.articles ORDER BY id DESC";
echo "<h1 align='center'>FRESH</h1>";
}
else if($_GET['var']=='fresh'){
$sqlb= "SELECT * FROM 8BULLSHITS.articles ORDER BY id DESC";
echo "<h1 align='center'>FRESH</h1>";
}
else if($_GET['var']=='bullshit'){
$sqlb= "SELECT * FROM 8BULLSHITS.articles ORDER BY bullshit DESC";
echo "<h1 align='center' style='color:red'>BULLSHIT</h1>";
}
else if($_GET['var']=='truth'){
$sqlb= "SELECT * FROM 8BULLSHITS.articles ORDER BY truth DESC";
echo "<h1 align='center' style='color:green'>TRUTH</h1>";
}
else{
$sqlb= "SELECT * FROM 8BULLSHITS.articles ORDER BY id DESC";
echo "<h1 align='center'>FRESH</h1>";
}
echo "<br><hr><br>";
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
echo "<tr><td width='50%'><h2>".$row['title']."</h2><h4><img src='userprofile/".$row['creater'].".jpg' width='40px' height='40px'>&nbsp;".$row['creater']."</h4></td><td align='center'><h1>COMMENTS</h1></td></tr>";
$strings=str_replace("\n","<br>",$row['sentence']);
echo "<tr><td  align='center'><img src='article/".$row['id'].".jpg' width='300px' height='400px'><br><div align='left'><p1>".$strings."<hr></p1></div>";
echo "</td><td valign='top'>";


echo "<iframe src='commentwindow.php?id=".$row['id']."' frameborder='0' width='100%' height='100%'></iframe>";

echo "</td></tr>";
echo "<tr><td><p1><h2 align='left' style='color:green'>Truth&nbsp;".$row['truth']."</h2><img src='bar/".checker($row['truth'],$row['bullshit']).".jpg' width='100%' height='50px'><h2 align='right' style='color:red'>".$row['bullshit']."&nbsp;Bullshit</h2></p1></td><td>";



echo "<hr>";
if(isset($_SESSION['user']))
echo "<form action='comment.php?id=".$row['id']."' method='post'>Leave a Comment<br><input type='text' name='comment' size='45%'><input type='submit' value='Submit'></form></td></tr>";
else echo "Log in for leave a comment";
echo "<tr>";
echo "<td>";
echo "<h3 align='center'>";
echo "<a href='t1.php?idf=".$row['id']."' style='color:green'>It's TRUTH</a>";
echo "&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;";
echo "<a href='b1.php?idf=".$row['id']."' style='color:red'>It's BULLSHIT</a>";
echo "</h3>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "<br>";
echo "<br>";
}else if($i>=$max) break;

	$i++;		

    }
}



echo "<h1 align='center'>";
if(isset($_GET['fmax'])) echo "<a href='javascript:history.back()'>PREV</a>";
echo "&emsp;<a href='fresh.php?fmax=".$max."'>NEXT</a></h1>";
$conn->close();


function checker($x,$y){

return (int)(($x/($x+$y))*20);

}

?>



<h4 style="font-family:italic" align="center" ><hr>copyright(c) 2014 All rights reserved by Shin<h4>
</BODY>
</HTML>