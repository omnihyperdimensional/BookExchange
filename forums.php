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
    <h2 align="center" style="margin-top:20px; margin-bottom:20px;">FORUM</h2>
    <div class="fluid-container">
        <div class="row">
            <div class="col-8">
                <table class="table table-bordered table-sm" style="margin-left: 50px;">
                    <thead class="thead-light">
                        <tr>
                            <th>NAME</th>
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
                    <table align="center" style="margin-left: 50px;">
                        <tr>
                            <td>Posting as: </td>
                            <td style="text-align: left;"><input type="hidden" name="name" value="<?php print $_SESSION['name']?>"/> <?php print $_SESSION['name']?></td>
                            <input type="hidden" name="id" value="<?php print $_SESSION['id']?>" />
                        </tr>
                        <tr>
                            <td colspan="2"><textarea rows="6" cols="40" name="post" ></textarea></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align: right;"><input type="submit" value="POST" style="width: 100px; background: #4a4f55; color: #ffffff;"/></td>
                        </tr>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
