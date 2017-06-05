<!DOCTYPE HTML>
<?php session_start();

if($_GET['code']!='x') {    
	header("Location:main.php");
}
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

<h1 align='center'>Welcome Admin!</h1>
<h3 align='center'>(Do not go back from here for security)</h3>
<br><br><hr><br><br>
<h3 align='center'>Admin menu</h3><br>
<h2 align='center'><a href="searcharticle.php?code=x">Articles</a>&emsp;<a href="searchuser.php?code=x">Users</a>&emsp;<a href="admingossip.php?code=x">Gossip Board</a></h2>


<h4 style="font-family:italic" align="center" ><hr>copyright(c) 2014 All rights reserved by Shin<h4>
</BODY>
</HTML>