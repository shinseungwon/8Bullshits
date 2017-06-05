<!DOCTYPE HTML>
<?php session_start();?>
<HTML>

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
	ID: <input type="text" name="id">
	Password: <input type="password" name="password">
	<input type="submit" value="Log in"></form>
	<a href="findpass.php">Forgot Password?</a>&emsp;<a href="signin.php">Wanna join us?</a></td>	
	<?php } ?>




  </tr>

</table>

<BODY>
<br><br><b><br><br>
<form action="makenotice.php" method="post" id="usrform">
<table style="width:50%" class="table1" align="center">
<tr>
<td align="center">TITLE:<input type="text" name="title" size="50%">
</td>
</tr>
<tr><td align="center">BODY(<500 letters)</td></tr>
<tr>
<td align="center"><textarea rows="25" cols="100" name="body" form="usrform" style="resize:none">
Enter text here...</textarea>
</td>
</tr>

<tr>
<td align="center"><input type="submit" value="----UPLOAD----" style="padding:10px"></form></td>
</tr>
</table>
<h4 style="font-family:italic" align="center" ><hr>copyright(c) 2014 All rights reserved by Shin<h4>
</BODY>
</HTML>


<?php


?>

