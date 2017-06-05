<!DOCTYPE HTML>
<?php session_start();?>
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
		
				<script>
function clicked(e) {
 if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","good.php?id="+e,true);
  xmlhttp.send();
	
}


function clickedf(e) {
 if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","bad.php?id="+e,true);
  xmlhttp.send();
	
}
</script>
		
		
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
$id=$_GET['id'];
$idc=$_GET['idc'];
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sqlb= "SELECT * FROM 8BULLSHITS.notice WHERE id LIKE '$id'";
$resultb = $conn->query($sqlb);
$row = $resultb->fetch_assoc();
$strings=str_replace("\n","<br>",$row['body']);

echo "<table align='center' style='width:50%' class='table1'><tr><td align='center'><h2>"; 
echo $row['title'];
echo "</h2></td></tr>";
echo "<tr><td align='left'><h3>Prepared by: <img src='userprofile/".$row['creator'].".jpg' width='40px' height='40px'> ".$row['creator']."&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Date of preparation: ".$row['createdate']."</h3></td></tr>";
echo "<tr><td><hr>";
echo $strings;
echo "<hr></td></tr>";
echo "<tr><td align='center'><span class='buttong'><a href='' onclick='clicked(".$id.")'>GOOD :) -".$row['good']."-</a></span>&emsp;&emsp;<span class='buttonb'><a href='' onclick='clickedf(".$id.")'>GOOD :) -".$row['bad']."-</a></span>";
echo "<br><br></td></tr>";


$sqlc= "SELECT * FROM 8BULLSHITS.gossipcomment WHERE gossipnumber LIKE '$id'";
$resultc = $conn->query($sqlc);
while($rowc = $resultc->fetch_assoc()){
echo "<tr>";
echo "<td align='left'>";

echo "<img src='userprofile/".$rowc['creator'].".jpg' width='40px' height='40px'>".$rowc['creator']." : ".$rowc['body']."<div align='right'><a href='noticebody.php?idc=".$rowc['id']."&id=".$row['id']."'>Reply</a><hr></div>";

$scid=$rowc['id'];
$sqld= "SELECT * FROM 8BULLSHITS.subcomment WHERE commentid LIKE '$scid'";
$resultd = $conn->query($sqld);
while($rowd = $resultd->fetch_assoc()){
echo "&emsp;&emsp;&nbsp;<img src='sign.jpg' width='40px' height='40px'>&ensp;<img src='userprofile/".$rowd['creator'].".jpg' width='40px' height='40px'>".$rowd['creator']." : ".$rowd['body']."<hr>";
}


if(isset($_GET['idc']))
	if($_GET['idc']==$rowc['id'])
		echo "<div align='right'><form action='subcomment.php?id=".$rowc['id']."' method='post'>ㄴ<input type='text' name='scomment' size='70'>&ensp;<input type='submit' name='submit' value='Reply'></form><div><hr></td>";

echo "</tr>";
}



echo "<tr><td align='center'><form action='gossipcomment.php?id=".$row['id']."' method='post'><input type='text' name='gcomment' size='70'>&ensp;<input type='submit' name='submit' value='Reply'></form></td></tr>";
echo "</table>";


?>
<h1 align='center'><a href='notices.php'>VIEW LIST</a></h1>


<h4 style="font-family:italic" align="center" ><hr>copyright(c) 2014 All rights reserved by Shin<h4>
</BODY>
</HTML>