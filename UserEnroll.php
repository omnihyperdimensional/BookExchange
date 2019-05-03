<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>User Enrollment</title>
    <link href="UserEnroll.css" type="text/css" rel="stylesheet" />
    <style>
    th {
        background-color: #4a4f55;
        color: #ffffff;
        font-weight: normal;
    }

    #loginLink {
        background-color: #8a8a8d;
        border: 1px solid #8a8a8d;
        font-size: 14px;
        text-decoration: none;
        padding: 2px;
    }

    </style>
</head>

<body>
    <div align="center">
        <form action="UserInsert.php" method="post">
            <img src="images/brand_horizontal_logo_4color.png" alt="Cal State LA" id="pic1" align="center;">
            <table>
                <tr>
                    <td>
                        <h2 id="title" align="center">USER ENROLL</h2id>
                    </td>
                </tr>
                <tr>
                    <td align="center">USERNAME: <input type="text" name="name" id="text1" /></td>
                </tr>
                <tr>
                    <td align="center">EMAIL: <input type="text" name="email" id="text2" /></td>
                </tr>
                <tr>
                    <td align="center"><input type="submit" value="REGISTER" id="submit" /></td>
                </tr>

                <tr>
                    <td align="center">
                        <p id="adminLink"><a href="/admin.php">BACK TO ADMIN</a></p>
                    </td>
                </tr>
                <tr>
                    <td align="center"><a href="login.html" id="loginLink">BACK TO LOGIN</a></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>