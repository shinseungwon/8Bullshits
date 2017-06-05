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
	<td align="right"><img src="userprofile/<?php echo $_SESSION['user']; ?>.jpg" width="40px" height="40px">Welcome&nbsp;<?php echo $_SESSION["user"]; ?>!&emsp;<a href="logout.php" style="error">Log out</a>&emsp;<a href="insertimg.php" style="error">Insert profile image!</a>&emsp;<a href="uploadnotice.php" style="error">POST GOSSIP</a></td>
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

$sqln= "SELECT * FROM 8BULLSHITS.notice ORDER BY id DESC";
$resultn = $conn->query($sqln); 
echo "<table id='customers'>";
echo "<tr><td align='center' colspan='4'><h1 align='center'>GOSSIP</h1><br></td></tr>";
echo "<tr><th>ID</td><th width='20%'>DATE OF PREPARATION</td><th width='60%'>TITLE</td><th>PREPARED BY</td></tr>";


if(!isset($_GET['g'])) $m=0;
else $m=$_GET['g'];

if(!isset($_GET['pp'])) $pp=1;
else $pp=$_GET['pp'];

$itemperpage=13;


$q=0;
if ($resultn->num_rows > 0) {
    // output data of each row
    while($rown = $resultn->fetch_assoc()) {
		if($q>=($itemperpage*$pp)-$itemperpage && $q<($itemperpage*$pp)){
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
	echo "<a href='noticebody.php?id=".$rown['id']."'>".$rown['title']."</a>";
	echo "</td>";
	echo "<td>";
	echo "<img src='userprofile/".$rown['creator'].".jpg' width='20px' height='20px'> ".$rown['creator']."</a>";
	echo "</td>";	
	echo "</tr>";
	}else if($q>20*$pp) break;
		
	
	$q++;
	
}

}


echo "</table>";








echo "<h4 align='center'>";

if($m>0) echo "<a href='notices.php?g=".($m-1)."&pp=".((($m)*10))."'>prev </a>";

for($v=0;$v<10;$v++){
	
	echo "<a href='notices.php?pp=".(($m*10)+($v+1))."&g=".($m)."'>[".(($m*10)+($v+1))."]</a>&nbsp;";
}

echo "<a href='notices.php?g=".($m+1)."&pp=".((($m+1)*10)+1)."'>next</a>";

echo "</h4>";

?>

<h4 style="font-family:italic" align="center" ><hr>copyright(c) 2014 All rights reserved by Shin<h4>
</BODY>
</HTML>