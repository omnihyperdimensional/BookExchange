<?php
    include("Connect_Database.php");
    include("MainMenu.php");
    
    $bookPrice = 0;

    $selectBooks = "SELECT * FROM books b JOIN cart c where b.isbn10 = c.isbn10";
    $results = mysqli_query($connect, $selectBooks);
    while($row = mysqli_fetch_assoc($results))
    {
        $bookPrice = $bookPrice + $row["price"];
    }

    print "Book: ".($bookPrice);
    print "<br>";

    $selectProfile = "SELECT * FROM users where email='" . $_SESSION["email"] . "'";
    $account = mysqli_query($connect, $selectProfile);   
    $data = mysqli_fetch_assoc($account);
    $bal = $data["balance"];

    print "User bal: ".($bal);
    print "<br>";

    $userNewBalance = $bal - $bookPrice;
    print "User new Bal: " . $userNewBalance ;
    print "<br>";

    $userBalanceUpdateQuery = "UPDATE users SET balance = $userNewBalance WHERE EMAIL = '" . $_SESSION["email"] . "';";
    $userBalanceUpdateResult = mysqli_query($connect, $userBalanceUpdateQuery);
    
    $selectSellerIDPriceQuery = "SELECT seller_id, price from books inner join cart on books.isbn10=cart.isbn10";
    $selectSellerIDPrice = mysqli_query($connect, $selectSellerIDPriceQuery);
    while($selectSellerIDPriceArray = mysqli_fetch_assoc($selectSellerIDPrice))
    {
        $sellerCurrentBalanceQuery = "SELECT balance from users where id = " . $selectSellerIDPriceArray["seller_id"] . ";";
        print "<br> seller current balance query : $sellerCurrentBalanceQuery";
        print "<br> Seller Id: " . $selectSellerIDPriceArray["seller_id"];
        $sellerCurrentbalance = mysqli_fetch_assoc(mysqli_query($connect, $sellerCurrentBalanceQuery))["balance"];
        $sellerNewCurrentBalance = $sellerCurrentbalance + $selectSellerIDPriceArray["price"];
        print "Seller New Bal: ". $sellerNewCurrentBalance;

        $sellerNewBalanceUpdateQuery = "UPDATE users set Balance = $sellerNewCurrentBalance WHERE id = " . ($selectSellerIDPriceArray["seller_id"]). ";";
        print "<br> seller new balance query : $sellerNewBalanceUpdateQuery";
        $sellerNewBalanceUpdateResult = mysqli_query($connect, $sellerNewBalanceUpdateQuery);
    }

    
    $bookDeleteBooks = "DELETE books FROM books inner join cart on books.isbn10 = cart.isbn10 where books.isbn10 = cart.isbn10;";
    $result = mysqli_query($connect, $bookDeleteBooks);

    $bookDelete = "delete from cart;";
    $result = mysqli_query($connect, $bookDelete);

    header("Location: profile.php");
?>

