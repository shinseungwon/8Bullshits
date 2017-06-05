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
		
		
		<style>
	.modalDialog {
		position: fixed;
		font-family: Arial, Helvetica, sans-serif;
		top: 0;
		right: 0;
		bottom: 0;
		left: 0;
		background: rgba(0,0,0,0.8);
		z-index: 99999;
		opacity:0;
		-webkit-transition: opacity 400ms ease-in;
		-moz-transition: opacity 400ms ease-in;
		transition: opacity 400ms ease-in;
		pointer-events: none;
	}

	.modalDialog:target {
		opacity:1;
		pointer-events: auto;
	}

	.modalDialog > div {
		width: 50%;
		height: 80%;
		position: relative;
		margin: 10% auto;
		padding: 5px 20px 13px 20px;
		
		background: #bbbbbb;

	}

	.close {
		background: #606061;
		color: #FFFFFF;
		line-height: 25px;
		position: absolute;
		right: -12px;
		text-align: center;
		top: -10px;
		width: 24px;
		text-decoration: none;
		font-weight: bold;
		-webkit-border-radius: 12px;
		-moz-border-radius: 12px;
		border-radius: 12px;
		-moz-box-shadow: 1px 1px 3px #000;
		-webkit-box-shadow: 1px 1px 3px #000;
		box-shadow: 1px 1px 3px #000;
	}

	.close:hover { background: #00d9ff; }
	</style>
		
		
						<script>
function text(str) {
  if (str.length==0) { 
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","sub.php?search="+str,true);
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
<h1 align='center' style='background-color:#cccccc'>Search by Title<form><input type='text' onkeyup="text(this.value)"></form></h1>
<span id="txtHint"></span>
<br><h1 align='center'>-All Articles-</h1>
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

$sql= "SELECT * FROM 8BULLSHITS.articles ORDER BY id DESC";
$result = $conn->query($sql);
echo "<table class='surprise'>";

$x=0;
while($row=$result->fetch_assoc()){

if($x%5==0) echo "<tr>";

echo "<td style='background-color:#".color($row['bullshit'],$row['truth']).color($row['bullshit'],$row['truth']).color($row['truth'],$row['bullshit']).color($row['truth'],$row['bullshit'])."00'>";
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

function color($x,$y){
	
	$k=$x/($x+$y);
	return number_format(9*$k);	
}



?>



<h4 style="font-family:italic" align="center" ><hr>copyright(c) 2014 All rights reserved by Shin<h4>
</BODY>
</HTML>