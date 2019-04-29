<!doctype html>
<html>
<head>
<meta charset = "utf-8">
<title>Selling Page</title>
</head>

<body>
<?php
	include("MainMenu.php");
?>
<form action= "sellingInsert.php" enctype="multipart/form-data" method = "post">
<table align="center">
<tr>
<td>
User Name
</td>
<td>
<input type="text" name="name" value="<?php print $_GET['name']?>"/>
</td>
</tr>
<tr>
<td>
Email
</td>
<td>
<input type="text" name= "email" value="<?php print $_GET['email']?>"/>
</td>
</tr>
<tr>
<td>
Title
</td>
<td>
<input type="text" name= "title" />
</td>
</tr>
<tr>
<td>
Description
</td>
<td>
<input type="text" name= "description" />
</td>
</tr>
<tr>
<td>
Book Picture
</td>
<td>
<input type="file" name= "pic" />
</td>
</tr>
<tr>
<td>
<input type="submit" value="submit"/>
</td>
</tr>
</form>
</body>
</html>