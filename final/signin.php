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
<br><br>
<h1 align="center" style="color:#000000">Sign in</h1><br><br>
<BODY>

<form action="checknewuser.php" method="post">
<table style="width:100%">
  <tr>
    <td align="right" width="50%">ID: <input type="text" name="id"></td>
    <td align="left" width="50%"><span class="error"><?php if($_SESSION["name"]==1){ echo "* input ID"; $_SESSION["name"]=0;}else if($_SESSION["ename"]==1){echo "* existing name"; $_SESSION["ename"]=0;} ?></span></td>
  </tr>
  
    <tr>
    <td align="right">Password: <input type="password" name="password"></td>
    <td align="left"><span class="error"><?php if($_SESSION["pass"]==1) echo "* input password"; $_SESSION["pass"]=0; ?></span></td>
  </tr>
  
    <tr>
    <td align="right">Confirm Password: <input type="password" name="confirmpassword"></td>
    <td align="left"><span class="error"><?php if($_SESSION["cpass"]==1) echo "* wrong password"; $_SESSION["cpass"]=0; ?></span></td>
  </tr>
  
    <tr>
    <td align="right">E-mail: <input type="text" name="email"></td>
    <td align="left"><span class="error"><?php if($_SESSION["email"]==1) echo "* input email"; $_SESSION["email"]=0; ?></span></td>
  </tr>
  
      <tr>
    <td align="right">age: <input type="text" name="age"></td>
    <td align="left"><span class="error"><?php if($_SESSION["age"]==1) echo "* input age"; $_SESSION["age"]=0; ?></span></td>
  </tr>
  
    <tr>
    <td align="right">gender: <input type="radio" name="sex" value="male">Male&emsp;&emsp;
	 <input type="radio" name="sex" value="female">Female&nbsp;</td>
    <td align="left"><span class="error"><?php if($_SESSION["sex"]==1) echo "* input sex"; $_SESSION["sex"]=0; ?></span></td>
  </tr>

  
  
  <tr>
  <td colspan="2" align="center"><iframe src="descriptions.htm" width="800px" height="200px" style="background-color:#ffffff"></iframe><br>
  <input type="radio" name="checkagree" value="agree">I agree&emsp;&emsp;
  <input type="radio" name="checkagree" value="dontagree">I don't agree&nbsp;<br>
  <span class="error"><?php if($_SESSION["agree"]==1) echo "* you should agree"; $_SESSION["agree"]=0; ?></span>
  </td>
  </tr>
  
    <tr>
  <td colspan="2" align="center"><input type="submit" value="----Sign In!----" style="padding:20px"></form></td>
  </tr>
</table><br>
<div align="center">
<div align="center"></div>






<h4 style="font-family:italic" align="center" ><hr>copyright(c) 2014 All rights reserved by Shin<h4>
</BODY>
</HTML>