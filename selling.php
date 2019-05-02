<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Selling</title>
    <style>
    .fluid-container {
        margin-top: 25px;
    }

    form {
        margin: 0px 25px 0 25px 0;
    }

    #label {
        background-color: #8a8a8d;
    }

    .col-centered {
        float: none;
        margin: 0 auto;
    }
    </style>
</head>

<body>
    <?php
	include("MainMenu.php");
?>
    <h2 align="center" style="margin-top:20px; margin-bottom:20px; text-transform: uppercase;">SELL BOOK</h2>
    <div class="fluid-container">
        <form action="sellingInsert.php" align="center" enctype="multipart/form-data" method="post">
            <div class="col-4 col-centered">
                <div class="form-group">
                    <table align="center" class="table table-bordered table-sm">
                        <tr>
                            <td id="label">USERNAME</td>
                            <td><input type="text" name="name" value="<?php print $_GET['name']?>" /></td>
                        </tr>
                        <tr>
                            <td id="label">EMAIL</td>
                            <td><input type="email" name="email" value="<?php print $_GET['email']?>" /></td>
                        </tr>
                        <tr>
                            <td id="label">TITLE</td>
                            <td><input type="text" name="title" /></td>
                        </tr>
                        <tr>
                            <td id="label">DESCRIPTION</td>
                            <td><input type="text" name="description" /></td>
                        </tr>
                        <tr>
                            <td id="label">BOOK PICTURE</td>
                            <td><input type="file" name="pic" /></td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="SUBMIT" /></td>
                        </tr>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
