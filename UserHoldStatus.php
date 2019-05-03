<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>User Balance Zero</title>
</head>

<body>
<?php
	include("Connect_Database.php");
?>
<?php
	if($_GET["holdstatus"] == "Active"){
		$holdStatus = "Hold";
	}else{
		$holdStatus = "Active";
	}
	$uHSQuery = "update users set hold_status = '" . $holdStatus . "' where email='" . $_GET["email"] . "';";
	print($uHSQuery);
	$uIBObject = mysqli_query($connect, $uHSQuery);

	header("Location: Admin.php");
?>
</body>
</html>