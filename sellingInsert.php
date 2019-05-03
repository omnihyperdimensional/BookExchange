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
if ($_FILES["pic"]){
	$pathname="images/" . $_FILES['pic']['name'];
	move_uploaded_file($_FILES['pic']['tmp_name'], $pathname);
}
?>
<?php
	include("Connect_Database.php")
?>
<?php
	$selectUser = "SELECT * FROM users WHERE name ='"
	. $_POST['name'] .  "'AND email='"
	. $_POST['email'] . "'";

	$results = mysqli_query($connect, $selectUser);
	$id = 0;
	
	while($row = mysqli_fetch_assoc($results)) {
		$id = $row["id"];
	}

	$bookInsert = "INSERT INTO books (seller_id, isbn10, title, author, price, description, post_time, pic_path)" . 
	" VALUES(" .
	$id . ", " . 
	$_POST["isbn10"] . ", '" . 
	$_POST["title"] . "', '" .
	$_POST["author"] . "', " . 
	$_POST["price"] . ", '" . 
	$_POST["description"] . "', '" . 
	$currentTime . "', '" . 
	$pathname . "')";

	$result = mysqli_query($connect, $bookInsert);
	header("Location: shopping.php")
?>

</body>
</html> 
