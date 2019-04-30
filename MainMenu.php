<link href="MainMenu.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<?php
	session_start();
	$name_email = 'name=' . $_SESSION['name'] . '&email=' . $_SESSION['email'];
?>

<div id="img-head">
    <img src="images/brand_horizontal_logo_4color.png">
    <a href="login.html" id="logout">LOG OUT</a>
</div>

<!--<ul class="ul_css">
    <li class="li_css">
        <a class="li_css_a" href="shopping.php?<?php print $name_email; ?>">SHOPPING</a>
    </li>
    <li class="li_css">
        <a class="li_css_a" href="selling.php?<?php print $name_email; ?>">SELLING</a>
    </li>
    <li class="li_css">
        <a class="li_css_a" href="selling.php?<?php print $name_email; ?>">FORUMS</a>
    </li>
    <li class="li_css">
        <a class="li_css_a" href="forums.php?<?php print $name_email;?>">pROFILE</a>
    </li>
</ul>-->

<div class="container-fluid">
    <div class="row nav">
        <div class="col">
            <a class="li_css_a" href="shopping.php?<?php print $name_email; ?>">SHOP</a>
        </div>
        <div class="col">
            <a class="li_css_a" href="selling.php?<?php print $name_email; ?>">SELL</a>
        </div>
        <div class="col">
            <a class="li_css_a" href="forums.php?<?php print $name_email; ?>">FORUMS</a>
        </div>
        <div class="col">
        <a class="li_css_a" href="profile.php?<?php print $name_email;?>">PROFILE</a>
        </div>
    </div>
</div>
