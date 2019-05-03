<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Book Exchange Login Page</title>
<link href="login.css" type="text/css" rel="stylesheet" />
</head>
<body>
<div align="center">
<form action="UserInsert.php" method="post" style="
    width: 340px; 
    height: 260px; 
    background: rgba(255, 254, 254, 0.80);
    top: 50%;
    left: 50%;
    position: absolute;
    transform: translate(-50%, -50%);
    border-radius: 5%;">
<a href="Login.html"><img src="images/brand_horizontal_logo_4color.png" alt="Cal State LA" id="pic1" align="center;"></a>
<table align="center">
    <tr>
        <td align="center">NAME: <input type="text" name="name" id="text1" required/></td>
    </tr>
    <tr>
        <td align="center">EMAIL: <input type="email" name="email" id="text2" required/></td>
    </tr>
    <tr>
        <td align="center" colspan="2"><input type="submit" name="submit" value="REGISTER" id="submit"/></td>
    </tr>
</table>
</form>
</div>
</body>
</html>
