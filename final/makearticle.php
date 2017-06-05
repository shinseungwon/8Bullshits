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
    <td style="padding:10px"><h3 style="font-size:150%">&emsp;</td></h3>
	<td align="right"><img src="userprofile/<?php echo $_SESSION['user']; ?>.jpg" width="50px" height="50px">Welcome&nbsp;<?php echo $_SESSION["user"]; ?>!&emsp;<a href="logout.php" style="error">Log out</a>&emsp;<a href="insertimg.php" style="error">Insert profile image!</a>&emsp;<a href="makearticle.php" style="error">POST</a></td>
  </tr>

</table>

<BODY>
<br><br><b><br><br>

<table style="width:50%" class="table1" align="center">
<tr>
<td align="center"><form action="makearticle.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form></td>
</tr>
<form action="uploadarticle.php" method="post" enctype="multipart/form-data" id="usrform">
<tr>
<td align="center"><img src="article/<?php echo $_SESSION['user']; ?>.jpg" width="500px" height="500px"></td>
</tr><tr>
<td align="center">TITLE:<input type="text" name="title" size="50%">
</td>
</tr>
<tr><td align="center">DESCRIPTION(<300 letters)</td></tr>
<tr>
<td align="center"><textarea rows="5" cols="65" name="comment" form="usrform" style="resize:none">
Enter text here...</textarea>
</td>
</tr>

<tr>
<td align="center"><input type="submit" value="----UPLOAD----"   style="padding:10px"></form></td>
</tr>
</table>
<h4 style="font-family:italic" align="center" ><hr>copyright(c) 2014 All rights reserved by Shin<h4>
</BODY>
</HTML>


<?php

$target_dir = "article/";
$target_file = $target_dir .$_SESSION['user'].".jpg";
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {

		unlink($target_file);
        $uploadOk = 1;
    } else {

        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
   
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
   
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        
    } else {
      
    }
}

?>

