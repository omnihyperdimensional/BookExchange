<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Forums</title>
</head>

<body>
<?php
	include("MainMenu.php");
?>
<?php
	include("Connect_Database.php");
?>
<?php
	$selectForums = "select * from forum;";
	$results = mysqli_query($connect, $selectForums);
?>
<nav>
</nav>
	<table align="center" border="2" width=400>
	<tr>
		<th>
			Name
		</th>
		<th>
			User ID
		</th>
		<th>
			Post
		</th>
	</tr>
<?php
while($row = mysqli_fetch_assoc($results))
{
	print "<tr>";
	print "<td>";
	print ($row["poster_name"]);
	print "</td>";
	print "<td>";
	print ($row["poster_id"]);
	print "</td>";
	print "<td>";
	print ($row["post"]);
	print "</td>";
	
	
	/*Print "<td>";
	Print "<a href='UserDelete.php?";
	Print "email=" . $row["email"] . "'>";
	Print "DELETE";
	Print "</a>";
	Print "</td>";
	*/
	print "</tr>";
}
?>

</table>
<form action= "forumsinsert.php" method = "post">
<table align="center">
<tr>
<td>
User Name
</td>
<td>
<input type="text" name="name" value="<?php print $_SESSION['name']?>"/>
</td>
</tr>
<tr>
<td>
Id
</td>
<td>
<input type="text" name= "id" value="<?php print $_SESSION['id']?>"/>
</td>
</tr>
<tr>
<td>
Post
</td>
<td>
<input type="text" name= "post" />
</td>
</tr>
<tr>
<td>
<input type="submit" value="submit"/>
</td>
</tr>
</form>
</body>
</html>