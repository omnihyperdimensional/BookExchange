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
    $userBalanceQuery = "SELECT balance FROM users WHERE email='" . $_GET["email"] . "';";
    $userBalanceObject = mysqli_query($connect, $userBalanceQuery);
    $userBalanceArray = mysqli_fetch_assoc($userBalanceObject);
    
    $b = $userBalanceArray["balance"]+100;

	$uIBQuery = "UPDATE users set balance = " . $b . " where email='" . $_GET["email"] . "'";
    $uIBObject = mysqli_query($connect, $uIBQuery);
	header("Location: Admin.php");
?>
</body>
</html>