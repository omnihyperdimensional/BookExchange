<!doctype html>
<html>
<head>
<meta charset="UTF-8">
</head>

<body>
<?php
	include("Connect_Database.php");
?>
<?php
  $postInsert = "insert into comments(commenter_id, commenter_name, comment, parent_isbn10, comment_rating) values('" .
    $_POST["id"] .
    "', '" .
    $_POST["name"] .
    "', '" .
    $_POST["comment"] .
    "', '" .
     $_POST["isbn10"] .
    "', '" .
    $_POST["rating"] .
    "')";
    
  mysqli_query($connect, $postInsert);

  $ratings = 0;
  $ratingsSum = 0;
  $selectComments = "SELECT * FROM comments c JOIN books b ON c.parent_isbn10 = b.isbn10 WHERE b.isbn10 = " . $_POST["isbn10"];
  $resultsComments = mysqli_query($connect, $selectComments);
  
  while($rowComments = mysqli_fetch_assoc($resultsComments)){
      $ratingsSum = $ratingsSum + $rowComments["comment_rating"];
      $ratings = $ratings + 1;
  }

  $newRating = number_format(($ratingsSum / $ratings), 1, '.', '');
  $updateRating = "UPDATE books SET rating=" . $newRating . " WHERE isbn10=" . $_POST["isbn10"];
  mysqli_query($connect, $updateRating);
  header("Location: BookInformation.php?isbn10=" . $_POST["isbn10"]);
?>
</body>
</html>
