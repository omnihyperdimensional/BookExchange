<!doctype html>
<html>
<head>
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
	$resultsBooks = mysqli_query($connect, $selectBooks);
?>

<?php
while($row = mysqli_fetch_assoc($resultsBooks)) {
	print "<div class='container-fluid'>";
	print "<h1 class='display-4 text-center m-4'>" . $row["title"] . "</h1>";
	print "<p class='text-center mb-lg-5'> by ". $row['author'] . "</p>";
	print "</div>";
	print "<div class='container'>";
	print "<div class='row'>";
	print "<div class='col ml-5 pl-5'>";
	print "<img src='" . $row["pic_path"] . "' style='margin-left: 50px; width: 347px; height: 446px;'/>";
	print "</div>";
	print "<div class='col m-0 pl-0'>";
	print "<p>Price</p>";
	print "<div style='font-size: 30px;'>$" . $row["price"] . "</div>";
	print "<a href='bookCart.php?isbn10=" . ($row["isbn10"]) . "' style='font-size: 20px;'>Add to Cart</a>";
	print "<table class='table table-bordered table-sm' style='margin-top: 10px;'>";
	print "<thead class='thead-light'>";
	print "<tr><td style='font-size: 18px;'>ISBN-10: </td><td style='font-size: 18px;'>" . $row["isbn10"] . "</td>";
	print "<tr><td style='font-size: 18px;'>ISBN-13: </td><td style='font-size: 18px;'>978-" . $row["isbn10"] . "</td>";
	print "<tr><td style='font-size: 18px;'>Publication Date: </td><td style='font-size: 18px;'>" . substr($row["post_time"], 0, 10) . "</td>";
	print "<tr><td style='font-size: 18px;'>Sold by: </td><td style='font-size: 18px;'>" . $row["name"] . "</td>";
	print "<tr><td style='font-size: 18px;'>Book Rating: </td><td style='font-size: 18px;'>" . $row["rating"] . " Stars</tr> ";
	print "</thread>";
	print "</table>";
	print "<table class='table table-bordered table-sm' style='margin-top: 10px;'>";
	print "<thead class='thead-light'>";
	print "<tr><td style='background-color: #d9dddc;'><div style='font-size: 18px;'>Description</div></td></tr>";
	print "<tr><td><div style='font-size: 18px; text-align: right;'>" . $row["description"] . "</div></td></tr>";
	print "</thread>";
	print "</table>";
	print "</div>";
	print "</div>";
	print "</div>";
	print "</div>";
}
?>

<?php
	$selectComments = "SELECT * FROM comments c JOIN books b ON c.parent_isbn10 = b.isbn10 WHERE b.isbn10 = " . $_GET["isbn10"];
	$resultsComments = mysqli_query($connect, $selectComments);
?>

<div class="container">
        <div class="col" style="position">
            <table class="table table-bordered table-sm" style="margin-left: 50px; margin-top: 50px;">
                <thead class="thead-light">
                    <tr>
                        <th>NAME</th>
                        <th>COMMENT</th>
			<th>RATING</th>
                    </tr>
                    <?php
                    while($rowComments = mysqli_fetch_assoc($resultsComments)){
                        print "<tr>";
                        print "<td>";
                        print ($rowComments["commenter_name"]);
                        print "</td>";
                        print "<td>";
                        print ($rowComments["comment"]);
			print "</td>";
			print "<td style='text-align: center;'>";
                        print ($rowComments["comment_rating"]);
                        print "</td>";
			print "</tr>";
                    }
                    ?>
		</thead>
	</table>
	<table style="margin-left: 50px; margin-top: 50px; margin-bottom: 100px;">
	<form action='commentinsert.php' method='post'>
		<tr>
			<td style='text-align: left;'>COMMENT</td>
			<input type='hidden' name='id' value='<?php print $_SESSION["id"] ?>'/>
			<input type='hidden' name='name' value='<?php print $_SESSION["name"] ?>'/>
			<input type='hidden' name='isbn10' value='<?php print $_GET["isbn10"] ?>'/>
		</tr>
		<tr>
			<td colspan='3'><textarea rows='2' cols='130' name='comment' ></textarea></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td style='text-align: right;'> 
				Rating: &nbsp;&nbsp; 1 <input name="rating" type="radio" value="1"> 
				<input name="rating" type="radio" value="2"> 
				<input name="rating" type="radio" value="3" required checked> 
				<input name="rating" type="radio" value="4"> 
				<input name="rating" type="radio" value="5"> 5 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
				<input class="btn btn-primary" type="submit" value="Submit">
			</td>
		</tr>
	</form>
	</table>
        </div>
    </div>
</body>
</html>
