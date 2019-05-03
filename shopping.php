<!doctype html>
<html>

<head>
    <title>Shopping</title>
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
<h2 align="center" style="margin-top:20px; margin-bottom:20px;">SHOP</h2>
<div class="container">
    <div class="col">
        <table align="center" class="table table-bordered table-sm">
            <thead class="thead-light">
                <tr>
                    <th>SELLER</th>
                    <th>TITLE</th>
                    <th style='text-align: center;'>PRICE</th>
                    <th style='text-align: center;'>DATE POSTED</th>
                    <th style='text-align: center;'>COVER</th>
                </tr>
                <?php
                    while($row = mysqli_fetch_assoc($results)) {
                        print "<tr>";
                        print "<td>" . ($row["name"]) . "</td>";
                        print "<td><a href='BookInformation.php?isbn10=" . ($row["isbn10"]) . "'>";
                        print ($row["title"]) . "</a></td>";
                        print "<td style='text-align: center;'>" . ($row["price"]) . "</td>";
                        print "<td style='text-align: center;'>" . substr($row["post_time"], 0, 10) . "</td>";
                        print "<td width = 150><a href='BookInformation.php?isbn10=" . ($row["isbn10"]) . "'><img src='" . $row["pic_path"] . "' height = 190 width = 150></a></td>";
                        print "</tr>";
                    }
                ?>
            </thead>
        </table>
    </div>
</div>
</body>
</html>
