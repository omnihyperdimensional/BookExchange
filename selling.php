<!doctype html>
<html>
<head>
<meta charset = "utf-8">
<title>Selling Page</title>
<style>
	th {
		background-color: #4a4f55;
		color: #ffffff;
		font-weight:normal;
	}
</style>
</head>

<body>
<?php
	include("MainMenu.php");
?>
<h2 align="center" style="margin-top:20px; margin-bottom:20px;">SELL</h2>

<div class="container">
	<div class="row justify-content-md-center">
    	<div class="col col-lg-2">
    	</div>
    	<div class="col-md-auto">
			<form action="sellingInsert.php" enctype="multipart/form-data" method ="post">
			<table class="table table-bordered table-sm">
				<tr>
					<th>SELLING AS</th>
					<td width="50"><input type="hidden" name="name" value="<?php print $_GET['name']?>"/>&nbsp;&nbsp;&nbsp;<?php print $_GET['name']?></td>
				</tr>
				<tr>
					<th>TITLE</th>
					<td width="50">
						<input type="text" name="title" maxlength="100" size="50" required/>
						<input type="hidden" name="email" value="<?php print $_GET['email']?>"/>
					</td>
				</tr>
				<tr>
					<th>ISBN-10</th>
					<td width="50"><input type="text" name="isbn10" maxlength="10" size="50" required/></td>
				</tr>
				<tr>
					<th>AUTHOR</th>
					<td width="50"><input type="text" name="author" maxlength="50" size="50" required/></td>
				</tr>
				<tr>
					<th>PRICE</th>
					<td width="50">$ <input type="number" min="0.01" step="0.01" max="2500" name="price" maxlength="6" size="5" required/></td>
				</tr>
				<tr>
					<th>DESCRIPTION</th>
					<td width="50"><textarea rows="6" cols="52" name="description" maxlength="500" required></textarea></td>
				</tr>
				<tr>
					<th>PICTURE</th>
					<td width="50"><input type="file" name="pic" required/></td>
				</tr>
				<tr style="border: none">
					<td style="border: none"></td>
					<td style="text-align: right; border: none" width="50"><input class="btn btn-primary" style="width: 100px; height: 40px;" type="submit" value="Sell"></td>
				</tr>
			</table>
			</form>
    	</div>
    	<div class="col col-lg-2">
    	</div>
  	</div>
</div>
</body>
</html>
