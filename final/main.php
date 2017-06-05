<!DOCTYPE HTML>
<HTML>
<?php session_start();
$_SESSION["way"]=0;

 ?>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="UTF-8">
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
	ID :&nbsp;<input type="text" name="id">&ensp;
	Password :&nbsp;<input type="password" name="password">
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

	
echo "<table><td style='padding:20px;' width='30%' height='500px' valign='center' style='background-color:#cccccc; padding:10px;'>";	
$sqlb= "SELECT * FROM 8BULLSHITS.articles ORDER BY truth DESC";
$resultb = $conn->query($sqlb); 	
	
	$i=0;
if ($resultb->num_rows > 0) {

    while($row = $resultb->fetch_assoc()) {
    if($i==1) break;
echo "<table style='width:100%' height='100%' class='table1' align='center'>";
echo "<tr><td align='center'><h2 style='color:green'>BEST TRUTH</h2></td></tr>";
echo "<tr><td align='left'><hr><h3>".$row['title']."<hr></h3></td>";
$strings=str_replace("\n","<br>",$row['sentence']);
echo "<tr><td  align='center'><img src='article/".$row['id'].".jpg' width='300px' height='300px'><br><hr><p1><div align='left'>".$strings."<hr></div></p1>";
echo "</td></tr>";
echo "<tr><td><p1><h2 align='left' style='color:green'>Truth&nbsp;".$row['truth']."</h2><img src='bar/".checker($row['truth'],$row['bullshit']).".jpg' width='100%' height='50px'><h2 align='right' style='color:red'>".$row['bullshit']."&nbsp;Bullshit</h2></p1></td>";
echo "</table>";
echo "<br>";
	$i++;		

    }
}
	
echo "</td><td style='padding:20px;' width='30%' height='500px' valign='center' style='background-color:#cccccc; padding:10px;'>";
$sqlc= "SELECT * FROM 8BULLSHITS.articles ORDER BY bullshit DESC";
$resultc = $conn->query($sqlc); 
$k=0;
if ($resultc->num_rows > 0) {

    while($row = $resultc->fetch_assoc()) {
    if($k==1) break;
echo "<table width='100%' height='100%' class='table1' align='center'>";
echo "<tr><td align='center'><h2 style='color:red'>BEST BULLSHIT</h2></td></tr>";
echo "<tr><td align='left'><hr><h3>".$row['title']."<hr></h3></td>";
$strings=str_replace("\n","<br>",$row['sentence']);
echo "<tr><td  align='center'><img src='article/".$row['id'].".jpg' width='300px' height='300px'><br><hr><p1><div align='left'>".$strings."<hr></div></p1>";
echo "</td></tr>";
echo "<tr><td><p1><h2 align='left' style='color:green'>Truth&nbsp;".$row['truth']."</h2><img src='bar/".checker($row['truth'],$row['bullshit']).".jpg' width='100%' height='50px'><h2 align='right' style='color:red'>".$row['bullshit']."&nbsp;Bullshit</h2></p1></td>";
echo "</table>";
echo "<br>";

	$k++;		

    }
}

echo "</td><td style='padding:20px;' width='40%' height='500px' valign='center' style='background-color:#cccccc; padding:10px;'>";

$sqln= "SELECT * FROM 8BULLSHITS.notice ORDER BY good DESC";
$resultn = $conn->query($sqln); 
echo "<table id='customers' height='100%'>";
echo "<tr><td align='center' colspan='3' style='background-color:#eeeeee'><h2 style='font-size:40px'>BEST GOSSIP<h2></td></tr>";

echo "<tr><th>GOOD</th><th width='25%'>DATE</th><th>TITLE</th></tr>";
$j=0;
if ($resultn->num_rows > 0) {
	
    while($rown = $resultn->fetch_assoc()) {
	if($j==20) break;
	if($j%2==0)
		echo "<tr>";
	else echo "<tr class='alt'>";
	echo "<td width='10%'>";
	echo $rown['good'];
	echo "</td>";
	echo "<td>";
	$date=explode(" ",$rown['createdate']);
	echo "<span title='".$date[1]."'>";
	echo $date[0];
	echo "</span>";
	echo "</td>";
	echo "<td>";
	echo "<a href='noticebody.php?id=".$rown['id']."'>".$rown['title']."</a>";
	echo "</td>";
	echo "</tr>";
	$j++;
}

}

echo "</td></table>";
echo "<br>";
echo "</td></table>";


	
$conn->close();


function checker($x,$y){

return (int)(($x/($x+$y))*20);

}




?>

<h4 style="font-family:italic" align="center" ><hr>copyright(c) 2014 All rights reserved by Shin<h4>
</BODY>
</HTML>