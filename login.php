<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Administrator Page</title>
</head>

<body>
<?php
	include("Connect_Database.php");
?>
<?php
	$searchUsers = "select * from users where " .
		"name='" . $_POST["name"] . "' and " .
		"email='" . $_POST["email"] . "'";
		#print $searchUsers;
	$results = mysqli_query($connect, $searchUsers);
	
	if (mysqli_num_rows($results) == 0)
	{
		header("Location: login.html");
		exit;
	}
	if (mysqli_num_rows($results) > 0)
	{
		$data = mysqli_fetch_assoc($results);
		session_start();
		$_SESSION['name'] = $_POST["name"];
		$_SESSION['email'] = $_POST["email"];
		$_SESSION['id'] = $data["id"];
		$_SESSION['isAdmin'] = $data["is_admin"];

		if ($_SESSION['isAdmin'] == 1){
			header("Location: admin.php");
		}else{
			header("Location: main.php");
		}
		exit;
	}
?>
<nav>
<a href = "UserEnroll.php">Go to Enrollment Page</a>
</nav>
	<table align="center" border="2" width=400>
	<tr>
		<th>
			Name
		</th>
		<th>
			Email
		</th>
		<th>
			Delete
		</th>
	</tr>
<?php
while($row = mysqli_fetch_assoc($results))
{
	print "<tr>";
	print "<td>";
	print ($row["name"]);
	print "</td>";
	print "<td>";
	print ($row["email"]);
	print "</td>";
	Print "<td>";
	Print "<a href='UserDelete.php?";
	Print "email=" . $row["email"] . "'>";
	Print "DELETE";
	Print "</a>";
	Print "</td>";
	print "</tr>";
}
?>

</table>
</body>
</html>