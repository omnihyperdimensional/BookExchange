<?php
    include("Connect_Database.php");
?>

<?php
    
    $bookInsert = "delete from cart where isbn10='" . $_GET["isbn10"] . "';";
    $result = mysqli_query($connect, $bookInsert);
    
    header("Location: profile.php");
?>