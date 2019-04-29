<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Insert</title>
</head>

<body>
<?php
	include("Connect_Database.php");
?>
<?php


$userInsert = "insert into users (name, email) values('" .
$_POST["name"] .
"', '" .
$_POST["email"] .
"')";

$result = mysqli_query($connect, $userInsert);
	header("Location: Admin.php");

?>
</body>
</html>
