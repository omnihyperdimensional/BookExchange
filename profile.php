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
		$totalBookPriceInCart = 0;
		$lowBalance = null;

		$selectProfile = "SELECT * FROM users where " .	"email='" . $_SESSION["email"] . "'";
		$account = mysqli_query($connect, $selectProfile);
		$data = mysqli_fetch_assoc($account);
		$profileBalance = $data["balance"];

		$selectBooksForCartQuery = "SELECT * FROM books b JOIN cart c where b.isbn10 = c.isbn10;";
		$selectBooksForCartObject = mysqli_query($connect, $selectBooksForCartQuery);

		if(isset($_GET["isbn10"])){
			$priceForBalanceCheckQuery = "SELECT price from books where isbn10 = '". $_GET["isbn10"] ."';";
    		$priceForBalanceCheckObject = mysqli_query($connect, $priceForBalanceCheckQuery);
    		$priceForBalanceCheckArray = mysqli_fetch_assoc($priceForBalanceCheckObject);
			if(!($selectBooksForCartObject->num_rows==0)){
				while($selectBooksForCartArray = mysqli_fetch_assoc($selectBooksForCartObject)) 
				{
					$totalBookPriceInCart = $totalBookPriceInCart + $selectBooksForCartArray["price"];
				}
			}
			if(($profileBalance - $totalBookPriceInCart) >= $priceForBalanceCheckArray["price"]){
				$bookInsertToCartQuery = "insert into cart values('" . $_GET["isbn10"] . "');";
				$bookInsertToCartObject = mysqli_query($connect, $bookInsertToCartQuery);
			}else{
				$lowBalance = "Low Balance to purchase";
			}
		}

		$totalBookPriceInCart = 0;
		
		if(!($selectBooksForCartObject->num_rows==0)){
			$selectBooksForCartQuery = "SELECT * FROM books b JOIN cart c where b.isbn10 = c.isbn10;";
			$selectBooksForCartObject = mysqli_query($connect, $selectBooksForCartQuery);

			while($selectBooksForCartArray = mysqli_fetch_assoc($selectBooksForCartObject)) 
			{
				$totalBookPriceInCart = $totalBookPriceInCart + $selectBooksForCartArray["price"];
			}
			print("<p>Total$: $totalBookPriceInCart </p>");
			print("In your cart: <a style=float:right href=bookBuy.php>Buy</a>");
			$selectBooksForCartArray = null;

			$selectBooksForCartQuery = "SELECT * FROM books b JOIN cart c where b.isbn10 = c.isbn10;";
			$selectBooksForCartObject = mysqli_query($connect, $selectBooksForCartQuery);

			while($selectBooksForCartArray = mysqli_fetch_assoc($selectBooksForCartObject)) 
			{
				print "<p>" . ($selectBooksForCartArray["title"]) . "</p>";
				print "<p>$" . ($selectBooksForCartArray["price"]) . "</p>";
				$bookPrice = $bookPrice + $selectBooksForCartArray["price"];
				print "<a href='deleteBook.php?isbn10=".($selectBooksForCartArray["isbn10"]) ."'>Delete</a>";
				print "<p><img src='" . $selectBooksForCartArray["pic_path"] . "' height = 190 width = 150></p>";
			}
		}

		if($selectBooksForCartObject->num_rows==0){
			print("Empty Cart");
		}
		?>
	</div>
	<?php
	$selectBooks = "SELECT * FROM books b JOIN users u ON b.seller_id = u.id where " . "email='" . $_SESSION["email"] . "'";
	$results = mysqli_query($connect, $selectBooks);
	
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
					if($lowBalance!=null){
						print "<h6><font color=red><strong>$" . ($data["balance"] - $bookPrice) . "  " . $lowBalance . "</strong></font></h6>";
					} else {
						print "$" . ($data["balance"] - $bookPrice);
					}
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
