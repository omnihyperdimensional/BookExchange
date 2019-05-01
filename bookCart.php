<?php
    include("Connect_Database.php");
?>

<?php
    
    $bookInsert = "insert into cart values('" . $_GET["isbn10"] . "');";
    $result = mysqli_query($connect, $bookInsert);
    
    header("Location: profile.php");
?>