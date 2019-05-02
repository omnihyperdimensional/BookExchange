<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Selling</title>
    <style>
    #label {
        background-color: #e9ecef;
    }

    .col-centered {
        float: none;
        margin: auto;
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
            <div class="col-6 col-centered">
                <div class="form-group">
                    <table align="center" class="table table-bordered table-sm">
                        <tr>
                            <th id="label">SELLING AS</th>
                            <td><input type="hidden" name="name"
                                    value="<?php print $_GET['name']?>" />&nbsp;&nbsp;&nbsp;<?php print $_GET['name']?>
                            </td>
                        </tr>
                        <tr>
                            <td id="label">TITLE</td>
                            <td>
                                <input type="text" name="title" maxlength="100" size="50" required />
                                <input type="hidden" name="email" value="<?php print $_GET['email']?>" />
                            </td>
                        </tr>
                        <tr>
                            <th id="label">ISBN-10</th>
                            <td><input type="text" name="isbn10" maxlength="10" size="50" required /></td>
                        </tr>
                        <tr>
                            <th id="label">AUTHOR</th>
                            <td><input type="text" name="author" maxlength="50" size="50" required /></td>
                        </tr>
                        <tr>
                            <th id="label">PRICE</th>
                            <td>$ <input type="number" min="0.01" step="0.01" max="2500" name="price" maxlength="6"
                                    size="5" required /></td>
                        </tr>
                        <tr>
                            <th id="label">DESCRIPTION</th>
                            <td><textarea rows="5" cols="52" name="description" maxlength="500" required></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th id="label">PICTURE</th>
                            <td><input type="file" name="pic" required /></td>
                        </tr>
                        <tr style="border: none">
                            <td style="border: none"></td>
                            <td style="text-align: right; border: none" width="50"><input class="btn btn-primary btn-secondary"
                                    style="width: 100px; height: 40px;" type="submit" value="SELL"></td>
                        </tr>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
