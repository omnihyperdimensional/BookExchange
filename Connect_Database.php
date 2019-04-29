<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Connect</title>
</head>

<body>
<?php
    $connect = mysqli_connect("localhost","root","123456");
    mysqli_select_db($connect, "cs3337");
?>
</body>
</html>