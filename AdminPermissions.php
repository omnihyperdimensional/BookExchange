<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>User Balance Zero</title>
</head>

<body>
<?php
	include("Connect_Database.php");
?>
<?php
    $getAdminQuery = "SELECT is_admin FROM users WHERE email='" . $_GET["email"] . "' AND name='" . $_GET["name"] . "';";
    $queryResult = mysqli_query($connect, $getAdminQuery);
    $isAdmin = null;
    while($rowAdmin = mysqli_fetch_assoc($queryResult)){
        $isAdmin = $rowAdmin["is_admin"];
    }
    print $isAdmin;
    if ($isAdmin == 1) {
        $updateQuery = "UPDATE users SET is_admin = " . 0 . " where email='" . $_GET["email"] . "' AND name='" . $_GET["name"] . "'";
        mysqli_query($connect, $updateQuery);
	    print "now is not admin";
    }
    if ($isAdmin == 0) {
        $updateQuery = "UPDATE users SET is_admin = " . 1 . " where email='" . $_GET["email"] . "' AND name='" . $_GET["name"] . "'";
        mysqli_query($connect, $updateQuery);
        print "now is admin";
    }
    header("Location: Admin.php");
?>
</body>
</html>