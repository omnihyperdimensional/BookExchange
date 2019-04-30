<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Forum</title>
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
    <h2 align="center" style="margin-top:5px; margin-bottom:5px;">FORUM</h2>
    <div class="fluid-container">
        <div class="row">
            <div class="col-8">
                <table class="table table-bordered table-sm">
                    <thead class="thead-light">
                        <tr>
                            <th>NAME</th>
                            <th>USER ID</th>
                            <th>POST</th>
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
                            
                            print "</tr>";
                        }
                        ?>
                    </thead>
                </table>
            </div>

            <div class="col-4">
                <form action="forumsinsert.php" method="post">
                    <table align="center">
                        <tr>
                            <td>USERNAME</td>
                            <td><input type="text" name="name" value="<?php print $_SESSION['name']?>" /></td>
                        </tr>
                        <tr>
                            <td>ID</td>
                            <td><input type="text" name="id" value="<?php print $_SESSION['id']?>" /></td>
                        </tr>
                        <tr>
                            <td>POST</td>
                            <td><input type="text" name="post" /></td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="SUBMIT" /></td>
                        </tr>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
