<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Profile Page</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
	h3 {
		background-color: #4a4f55;
		color: #ffffff;
		border: 1px solid #4a4f55;
		margin: 25px 0 25px 0;
		text-align: center;
	}
	a {
		color: white;
	}
	#center {
  		vertical-align: middle;
	}
	table {
		margin: auto auto 25px auto;
	}
	title {
		height: 50px;
	}
</style>
</head>

<body>
<?php
	include("MainMenu.php");
	include("Connect_Database.php");
?>
<h2 align="center" style="margin-top:20px; margin-bottom:20px; text-transform: uppercase;">WELCOME <?php print $_SESSION['name'] ?>!</h2>
<div class="col-3">
<?php
	$bookPrice = 0;
	$totalBookPriceInCart = 0;
	$lowBalance = null;
	$selectBooksForCartArray = null;

	//selecting the user and taking and storing the balance in a variable
	$selectProfile = "SELECT * FROM users where " .	"email='" . $_SESSION["email"] . "'";
	$account = mysqli_query($connect, $selectProfile);
	$data = mysqli_fetch_assoc($account);
	$profileBalance = $data["balance"];

			//
	$selectBooksForCartQuery = "SELECT * FROM books b JOIN cart c where b.isbn10 = c.isbn10;";
	$selectBooksForCartObject = mysqli_query($connect, $selectBooksForCartQuery);

	if (isset($_GET["isbn10"])) {
		$priceForBalanceCheckQuery = "SELECT price from books where isbn10 = '" . $_GET["isbn10"] . "';";
		$priceForBalanceCheckObject = mysqli_query($connect, $priceForBalanceCheckQuery);
		$priceForBalanceCheckArray = mysqli_fetch_assoc($priceForBalanceCheckObject);
		if (!($selectBooksForCartObject->num_rows == 0)) {
			while ($selectBooksForCartArray = mysqli_fetch_assoc($selectBooksForCartObject)) {
					$totalBookPriceInCart = $totalBookPriceInCart + $selectBooksForCartArray["price"];
				}
		}
		if (($profileBalance - $totalBookPriceInCart) >= $priceForBalanceCheckArray["price"]) {
			$bookInsertToCartQuery = "insert into cart values('" . $_GET["isbn10"] . "');";
			$bookInsertToCartObject = mysqli_query($connect, $bookInsertToCartQuery);
			$totalBookPriceInCart = $totalBookPriceInCart + $priceForBalanceCheckArray["price"];
		} else {
			$lowBalance = "Low Balance to purchase";
		}
	} else{
		$selectBooksForCartQuery = "SELECT * FROM books b JOIN cart c where b.isbn10 = c.isbn10;";
		$selectBooksForCartObject = mysqli_query($connect, $selectBooksForCartQuery);
		while($selectBooksForCartArray = mysqli_fetch_assoc($selectBooksForCartObject)) {
			$totalBookPriceInCart = $totalBookPriceInCart + $selectBooksForCartArray["price"];
		}
	}	
?>
</div>   		
<?php
	$selectBooks = "SELECT * FROM books b JOIN users u ON b.seller_id = u.id where " . "email='" . $_SESSION["email"] . "'";
	$results = mysqli_query($connect, $selectBooks);
?>
<div class="container">
	<div class="row">
		<div class="col-4">
			<h3 align="center">YOUR ACCOUNT BALANCE</h3>
			<table class="table table-bordered">
				<thead class="thead-light">
					<tr>
						<th>BALANCE</th>
					</tr>
				</thead>
					<tr>
						<td>
						<?php

							if ($lowBalance != null) {

							if ($lowBalance == null) {

								print "<h6><font color=red><strong>$" . number_format(($data["balance"] - $totalBookPriceInCart), 2) . "  " . $lowBalance . "</strong></font></h6>";
							} else {
								print "$" . number_format(($data["balance"] - $totalBookPriceInCart), 2);
							}
						?>
						</td>
					</tr>
			</table>
		</div>
		<div class="col-4">
			<h3 align="center">BOOKS YOU ARE SELLING</h3>
				<?php
					while ($row = mysqli_fetch_assoc($results)) {
						print "<table width='350' align='center'>";
						print "<tr>";
						print "<td colspan=2  style='height: 70px;'>" . ($row["title"]) . "</td>";
						print "</tr>";
						print "<tr>";
						print "<td rowspan=3 align='center'><a href='BookInformation.php?isbn10=" . ($row["isbn10"]) . "'><img src='" . $row["pic_path"] . "' height = 190 width = 150></a></td>";
						print "<td rowspan=2 align='center'><img src='" . $row["pic_path"] . "' height = 190 width = 150></td>";
						print "<td id='center'> $ " . ($row["price"]) . "</td>";
						print "<tr>";
						print "<td id='center'><a href='#'>Delete Item</a></td>";
						print "</tr>";
						print "</table>";
					}
				?>
		</div>
		<div class="col-3">
			<?php
				$bookPrice = 0.0;
				$selectBooks = "SELECT * FROM books b JOIN cart c where b.isbn10 = c.isbn10;";
				$results = mysqli_query($connect, $selectBooks);
				if ($results->num_rows == 0) {
					print("<h3>EMPTY CART</h3>");
				} else {
					print("<h3>ITEMS IN YOUR CART<br></h3>");
					
					while ($row = mysqli_fetch_assoc($results)) {
						print("<table width='255'>");
						print "<tr>";
						print "<td colspan=2 style='height: 70px;'>" . ($row["title"]) . "</td>";
						print "</tr>";
						print "<tr>";
						print "<td rowspan=3 align='center'><a href='BookInformation.php?isbn10=" . ($row["isbn10"]) . "'><img src='" . $row["pic_path"] . "' height = 190 width = 150></a></td>";
						print "<td rowspan=2 align='center'><img src='" . $row["pic_path"] . "' height = 190 width = 150></td>";
						print "<td id='center'> $ " . ($row["price"]) . "</td>";
						print "<tr>";
						print "<td id='center'><a href='deleteBook.php?isbn10=" . ($row["isbn10"]) . "'>Remove</a></td>";
						print "</tr>";
						print("</table>");
						$bookPrice = number_format($bookPrice + $row["price"], 2);
					}
					print("<table width='255'>");
					print("<tr>");
					print("<td style='text-align: center'>Total: $$bookPrice</td>");
					print("<td style='text-align: right'><a href=bookBuy.php><input class='btn btn-primary' style='width: 100px; height: 40px;' type='button' value='Buy'></a></td>");
					print("</tr>");
					print("</table>");
				}
			?>
		</div>
	</div>
</div>
</body>
</html>
