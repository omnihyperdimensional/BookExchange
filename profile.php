<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Profile Page</title>
</head>

<body>
	<?php
	include("MainMenu.php");
	?>
	<?php
	include("Connect_Database.php");
	?>
	<div style="float:right">
		<?php
		$bookPrice = 0;
		$selectBooks = "SELECT * FROM books b JOIN cart c where b.isbn10 = c.isbn10;";
		$results = mysqli_query($connect, $selectBooks);

		if($results->num_rows==0){
			print("Empty Cart");
		} else{
			print("In your cart: <a style=float:right href=bookBuy.php>Buy</a>");
			while($row = mysqli_fetch_assoc($results)) 
			{
				print "<p>" . ($row["title"]) . "</p>";
				print "<p>" . ($row["price"]) . "</p>";
				$bookPrice = $bookPrice + $row["price"];
				print "<a href='deleteBook.php?isbn10=".($row["isbn10"]) ."'>Delete</a>";
				print "<p><img src='" . $row["pic_path"] . "' height = 190 width = 150></p>";
			}
		}
		?>
	</div>
	<?php
	$selectBooks = "SELECT * FROM books b JOIN users u ON b.seller_id = u.id where " .
		"email='" . $_SESSION["email"] . "'";
	$results = mysqli_query($connect, $selectBooks);
	$selectProfile = "SELECT * FROM users where " .
		"email='" . $_SESSION["email"] . "'";
	$account = mysqli_query($connect, $selectProfile);
	?>



	<h1>Welcome <?php print $_SESSION['name']?></h1>
	<div>
		<h3>Your account balance:</h3>
		Your Current Balance is:<br>
		<table align="center" border="1" width=400>
			<tr>
				<th>Balance</th>
			</tr>
			<tr>
				<td>
					<?php
					$data = mysqli_fetch_assoc($account);
					print "$" . ($data["balance"] - $bookPrice);
					?>
				</td>
			</tr>
		</table>
	</div>
	<div>


		<h3>Books you are selling:</h3>
		<table align="center" border="2" width=400>
			<tr>
				<th>
					Title
				</th>
				<th>
					Post Time
				</th>
				<th>
					Picture
				</th>
			</tr>
			<?php
			 while($row = mysqli_fetch_assoc($results)) {
					print "<tr>";
					print "<td>";
					print($row["title"]);
					print "</td>";
					print "<td>";
					print($row["post_time"]);
					print "</td>";
					print "<td>";
					print "<img src ='";
					print $row["pic_path"] . "' height = 50 width = 50>";
					print "</td>";
					print "</tr>";
				}
			?>
		</table>
	</div>
</body>

</html>
