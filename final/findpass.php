<!DOCTYPE HTML>
<?php session_start(); ?>
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
    <td style="padding:10px"><h3 style="font-size:150%">&emsp;</td></h3>
  </tr>

</table>

<BODY>
<br><br><br>
<h1 align="center">Find Password</h1>
<b>
<br>
<h3 align="center">You should input ID and email</h3>
<form action="checklostuser.php" method="post">
<table width="50%" height="50%" align="center">
<tr>
    <td align="right" width="50%">ID: <input type="text" name="fid"></td>
    <td align="left" width="50%"><span class="error"></span></td>
  </tr>
    
    <tr>
    <td align="right">E-mail: <input type="text" name="femail"></td>
    <td align="left"><span class="error"></span></td>
  </tr>
  <tr>
  <td colspan="2" align="center"><input type="submit" value="----Find It!----" style="padding:20px"></form></td>
  </tr><tr>
  <td colspan="2" align="center"><h3><?php if($_SESSION['cantfind']==1){ echo "Can't find password. Try again!"; $_SESSION['cantfind']=0;}
  else if($_SESSION['findit']==1){ echo "Your password is ".$_SESSION['overpass']. ".&nbsp;Click&nbsp;". "<a href='main.php'>here</a>&nbsp;" . "and Log in!"; $_SESSION['findit']=0;}?></h3></td>
  </tr>
</table>

<h4 style="font-family:italic" align="center" ><hr>copyright(c) 2014 All rights reserved by Shin<h4>
</BODY>
</HTML>