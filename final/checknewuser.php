<?php
session_start();
$newname=$_POST["id"];
$newpass=$_POST["password"];
$newconfirmpass=$_POST["confirmpassword"];
$newemail=$_POST["email"];
$newage=$_POST["age"];
$newsex=$_POST["sex"];
$newprofileimage=$_POST["profileimage"];
$newagree=$_POST["agree"];
$_SESSION["idtemp"]=$_POST["id"];
$_SESSION["name"]=0;
$_SESSION["ename"]=0;
$_SESSION["pass"]=0;
$_SESSION["cpass"]=0;
$_SESSION["email"]=0;
$_SESSION["age"]=0;
$_SESSION["sex"]=0;
$_SESSION["img"]=0;
$_SESSION["agree"]=0;


if(empty($newname)==1){
	$_SESSION["name"]=1;
	header("Location: signin.php");
}

else if(empty($newpass)==1){
	$_SESSION["pass"]=1;
	header("Location: signin.php");
}

else if($newpass!=$newconfirmpass){
	$_SESSION["cpass"]=1;
	header("Location: signin.php");
}

else if(empty($newemail)==1){
	$_SESSION["email"]=1;
	header("Location: signin.php");
}

else if(empty($newage)==1){
	$_SESSION["age"]=1;
	header("Location: signin.php");
}

else if(empty($newsex)==1){
	$_SESSION["sex"]=1;
	header("Location: signin.php");
}

else if($newagree!=0){
	$_SESSION["agree"]=1;
	header("Location: signin.php");
}

else{

$servername = "localhost";
$username = "root";
$password = "5119861";
$dbname="8BULLSHITS";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



 
$sql = "INSERT INTO 8BULLSHITS.users (name,password,email,gender,age) VALUES ('$newname','$newpass','$newemail','$newsex','$newage')";
$result=$conn->query($sql);
$_SESSION["dull"]=$result;

if(!$result==1)
{
header("Location:signin.php");
$_SESSION["ename"]=1;
}else{
header("Location: welcome.php");
}
$conn->close();
}

?>




