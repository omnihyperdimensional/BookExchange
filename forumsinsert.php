<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Chat Post</title>
</head>

<body>
<?php
	include("Connect_Database.php");
?>
<?php
	$postInsert = "INSERT INTO forum (poster_id, poster_name, post) VALUES('" .
	$_POST["id"] . "', '" .
	$_POST["name"] . "', '" .
	$_POST["post"] . "')";

	$result = mysqli_query($connect, $postInsert);
	header("Location: forums.php");
?>
</body>
</html>
