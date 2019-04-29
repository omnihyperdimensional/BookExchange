<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Chat Post</title>
</head>

<body>
<?php
	include("Connect_Database.php");
?>
<?php

$postInsert = "insert into forum values('" .
$_POST["id"] .
"', '" .
$_POST["name"] .
"', '" .
$_POST["post"] .
"', null)";

$result = mysqli_query($connect, $postInsert);
	header("Location: forums.php");

?>
</body>
</html>