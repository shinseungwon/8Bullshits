<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "5119861";
$dbname = "8bullshits";

$id=$_POST["id"];
$pass=$_POST["password"];
$_SESSION["id"]=$id;
$_SESSION["faildlogin"]=0;



if($id=="admin" && $pass=="sungwon530"){
	header("Location:admin.php?code=x");
}else{
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT name, password FROM users where name LIKE '$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($row["password"]==$pass){
			
			$_SESSION['user']=$row['name'];
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			
			}
		else{
			$_SESSION["faildlogin"]=1;
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			}
    }
} else{$_SESSION["faildlogin"]=1;
		header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
				
$conn->close();



}

?>