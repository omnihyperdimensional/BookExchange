<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Administrator Page</title>
</head>

<body>
<?php
	include("Connect_Database.php");
?>
<?php
	$selectUsers = "SELECT * FROM users;";
	$results = mysqli_query($connect, $selectUsers);
?>
<nav>
	<a href = "UserEnroll.php">Go to Enrollment Page</a>
</nav>
<table align="center" border="2" width=400>
	<tr>
		<th>Name</th>
		<th>Email</th>
		<th>Delete</th>
	</tr>
<?php
	while($row = mysqli_fetch_assoc($results)) {
		print "<tr>";
		print "<td>" . ($row["name"]) . "</td>";
		print "<td>" . ($row["email"]). "</td>";
		print "<td><a href='UserDelete.php?email=" . $row["email"] . "'>DELETE</a></td>";
		print "</tr>";
	}
?>
</table>
</body>
</html>