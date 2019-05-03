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
$userInsert = "INSERT INTO users (name, email) VALUES('" .
$_POST["name"] .
"', '" .
$_POST["email"] .
"')";

$result = mysqli_query($connect, $userInsert);
header("Location: Login.html");
?>
</body>
</html>
