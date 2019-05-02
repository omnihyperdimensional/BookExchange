<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Profile Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        h3 {
            background-color: #FFCE00;
            border: 1px solid #FFCE00;
            margin: 25px 0 25px 0;
            text-align: center;
        }
        a{
            color: white;
        }
    </style>
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




					
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h3 align="center">YOUR ACCOUNT BALANCE:</h3>
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>BALANCE</th>
                        </tr>
                    </thead>
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

            <div class="col-4">
                <h3 align="center">BOOKS YOU ARE SELLING:</h3>
                <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Title</th>
                        <th>Post Time</th>
                        <th>Picture</th>
                    </tr>
                    </thead>
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
					print $row["pic_path"] . "' height = 75 width = 55>";
					print "</td>";
					print "</tr>";
				}
			?>
                </table>
            </div>

            <div class="col-3">
                <?php
		$bookPrice = 0;
		$selectBooks = "SELECT * FROM books b JOIN cart c where b.isbn10 = c.isbn10;";
		$results = mysqli_query($connect, $selectBooks);
		if($results->num_rows==0){
			print("<h3>EMPTY CART</h3>");
		} else{
			print("IN YOUR CART:<br> <a href=bookBuy.php>Buy</a>");
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
        </div>


    </div>
    </div>




    </div>
    </div>
</body>

</html>
