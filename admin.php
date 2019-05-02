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
	<a style="float:right" href = "logout.php">Logout</a>
</nav>
<table align="center" border="2" width=400>
	<tr>
		<th>Name</th>
		<th>Email</th>
		<th>Delete</th>
		<th>Increase Balance</th>
		<th>Status</th>
		<th>Balance</th>
	</tr>
<?php
	while($row = mysqli_fetch_assoc($results)) {
		print "<tr>";
		print "<td>" . ($row["name"]) . "</td>";
		print "<td>" . ($row["email"]). "</td>";
		print "<td><a href='UserDelete.php?email=" . $row["email"] . "'>DELETE</a></td>";
		print "<td><a href='UserIncreaseBalance.php?email=" . $row["email"] . "'>Increase Balance</a></td>";
		print "<td><a href='UserHoldStatus.php?email=" . $row["email"] ."&holdstatus=".$row["hold_status"] . "'> ". $row["hold_status"] . "</a></td>";
		if($row["balance"]>0 && $row["hold_status"]=='Active'){
			$status = "<div><font color=green>".$row["balance"].", Good Standing</font></div>";
		}elseif($row["balance"] == 0 && $row["hold_status"]=='Active'){
			$status = "<div><font color=blue><em>".$row["balance"].", Required money</em></font></div>";
		}else{
			$status = "<div><font color=red><strong>Hold</strong></font></div>";
		}
		print "<td>$status</td>";
		print "</tr>";
	}
?>
</table>
</body>
</html>