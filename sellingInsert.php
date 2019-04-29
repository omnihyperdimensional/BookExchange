<!doctype html>
<html>
<head>
<meta charset="uft-8">
<title></title>
</head>
<body>
<?php
date_default_timezone_set("America/Los_Angeles");
$currentTime = date("Y-m-d H:i:s");
print ($currentTime);
?>
<?php
if ($_FILES["pic"])
{
	$pathname="images/" . $_FILES['pic']['name'];
	move_uploaded_file($_FILES['pic']['tmp_name'], $pathname);
}
print ($pathname);
?>
<?php
	include("Connect_Database.php")
?>
<?php

$bookInsert = "insert into books values(null, '" .
$_POST["name"] . 
"', '" .
$_POST["email"] . 
"', '" .
$_POST["title"] .
"', '" .
$_POST["description"] . 
"', '" . 
$currentTime . 
"', '" . 
$pathname .  
"')";

$result = mysqli_query($connect, $bookInsert);
	header("Location: shopping.php")
?>

</body>
</html> 