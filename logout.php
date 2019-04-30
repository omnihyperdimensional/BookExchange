<?php
    include("Connect_Database.php");
?>

<?php
session_start();
unset($_SESSION[$name_email]);
session_destroy();

$bookDelete = "delete from cart;";
$result = mysqli_query($connect, $bookDelete);
header("Location: login.html");
exit;
?>