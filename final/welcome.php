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
    <td style="padding:10px"><h2 style="font-size:150%">&emsp;</td></h2>
   

  </tr>

</table>

<BODY>
<br><br><br>
<h1 style="color:#333333" align="center">Welcome <?php echo $_SESSION["idtemp"];?></h1>
<br>
<h1 style="color:#333333; font-size:12" align="center"><a href="main.php">Click here</a> and log in and enjoy!</h1>

<h4 style="font-family:italic" align="center" ><hr>copyright(c) 2014 All rights reserved by Shin<h4>
</BODY>
</HTML>