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
    <h2 align="center" style="margin-top:20px; margin-bottom:20px; text-transform: uppercase;">WELCOME
        <?php print $_SESSION['name']?>!</h2>


    <!--<div style="float:right; margin-right: 150px;">
        <?php
		$bookPrice = 0;
		$selectBooks = "SELECT * FROM books b JOIN cart c where b.isbn10 = c.isbn10;";
		$results = mysqli_query($connect, $selectBooks);
		if($results->num_rows==0){
			print("EMPTY CART");
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
    </div>-->

    <?php
	$selectBooks = "SELECT * FROM books b JOIN users u ON b.seller_id = u.id where " .
		"email='" . $_SESSION["email"] . "'";
	$results = mysqli_query($connect, $selectBooks);
	$selectProfile = "SELECT * FROM users where " .
		"email='" . $_SESSION["email"] . "'";
	$account = mysqli_query($connect, $selectProfile);
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
					$data = mysqli_fetch_assoc($account);
					print "$" . ($data["balance"] - $bookPrice);
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
