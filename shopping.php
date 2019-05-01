<!doctype html>
<html>
<head>
  <!-- Meta Tags -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Styles -->
  <style>

  </style>
  <title>Shopping Page</title>
</head>

<body>
<?php
	include("MainMenu.php");
?>
<?php
	include("Connect_Database.php");
?>
<?php
	$selectBooks = "SELECT * FROM books b JOIN users u ON b.seller_id = u.id;";
	$results = mysqli_query($connect, $selectBooks);
?>
<table align="center" border="2" width=400>
	<tr>
		<th>Seller</th>
		<th>Title</th>
		<th>Price</th>
		<th>Date Posted</th>
		<th>Picture</th>
		<th>Table of Content</th>
	</tr>
<?php
while($row = mysqli_fetch_assoc($results)) {
	print "<tr>";
	print "<td>" . ($row["name"]) . "</td>";
	print "<td>" . "<a href='BookInformation.php?isbn10=" . ($row["isbn10"]) . "'>";
	print ($row["title"]) . "</a>" . "</td>";
	print "<td>$" . ($row["price"]) . "</td>";
	print "<td>" . substr($row["post_time"], 0, 10) . "</td>";
	print "<td>" . "<img src='" . $row["pic_path"] . "' height = 190 width = 150>" . "</td>";
	print "<td>" . "<img src='" . $row["toc_path"] . "' height = 190 width = 150>" . "</td>";
	print "</tr>";
}
?>
</table>
</body>
</html>
