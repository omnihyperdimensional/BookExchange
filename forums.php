<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Forum</title>
    <!--style-->
    <style>
    * {
        margin: 0;
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
    <?php
	$selectForums = "SELECT * FROM forum;";
	$results = mysqli_query($connect, $selectForums);
    ?>

    <h2 align="center" style="margin-top:20px; margin-bottom:20px;">FORUM</h2>

    <div class="container">
        <div class="row">
            <div class="col-10">
                <table class="table table-bordered">
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

            <div class="col-2">
                <form action="forumsinsert.php" method="post">
                    <tr>
                        <td>POSTING AS: <input type="hidden" name="name" value="<?php print $_SESSION['name']?>" />
                            <?php print $_SESSION['name']?></td>
                        <input type="hidden" name="id" value="<?php print $_SESSION['id']?>" />
                    </tr>
                    <tr>
                        <td><textarea rows="6" cols="30" name="post"></textarea></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="POST"
                                style="width: 100px; background: #4a4f55; color: #ffffff;border:1px solid #ffffff;" />
                        </td>
                    </tr>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
