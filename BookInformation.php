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
  <title>My Bargains</title>
</head>

<body>
<?php
	include("MainMenu.php");
?>
<?php
	include("Connect_Database.php");
?>
<?php
	$selectBooks = "SELECT * FROM books b JOIN users u ON b.seller_id = u.id WHERE b.isbn10 = " . $_GET['isbn10'] . ";";
	$results = mysqli_query($connect, $selectBooks);
?>

<?php
while($row = mysqli_fetch_assoc($results)) {
	print "<div class='container-fluid'>";
	print "<h1 class='display-4 text-center m-4'>" . $row["title"] . "</h1>";
	print "<p class='text-center mb-lg-5'> by ". $row['author'] . "</p>";
	print "</div>";
	print "<div class='container'>";
	print "<div class='row'>";
	print "<div class='col ml-5 pl-5'>";
	print "<img src='" . $row["pic_path"] . "'>";
	print "<p class='mt-3'> ISBN-10: " . $row["isbn10"] . "</p>";
	print "<p> ISBN-13: " . $row["isbn13"] . "</p>";
	print "<p> Publication Date: " . substr($row["post_time"], 0, 10) . "</p>";
	print "</div>";
	print "<div class='col m-0 pl-0'>";
	print "<p>Price</p>";
	print "<h3>$" . $row["price"] . "</h3>";
	print "<a href='bookCart.php?isbn10=".($row["isbn10"]) ."'>Add to Cart</a>";
	print "<div>Sold by " . $row["name"] . "</div>";
	print "<div>Book Rating " . $row["rating"] . "</div> ";
	print "<p class='mt-4'><strong>Description</strong></p>";
	print "<p class='m-4'>" . $row["description"] . "</p>";
	print "</div>";
	print "</div>";
	print "</div>";
	print "<div class='container-fluid'>";
	print "<p class='text-center'>Chat GOES HERE</p>";
	print "</div>";
}
?>
</table>
</body>
</html>
