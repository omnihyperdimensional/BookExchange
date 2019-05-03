<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Administrator Page</title>
<style>
	body{
		margin: 0;
	}
    	.col-centered {
        	float: none;
        	margin: auto;
	}
	#links{
		background-color: #8a8a8d;
		border: 1px solid #8a8a8d;
		border-radius: 5px;
		color: black;
		padding: 10px;
	}
</style>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<?php
	include("Connect_Database.php");
?>
<?php
	$selectUsers = "SELECT * FROM users;";
	$results = mysqli_query($connect, $selectUsers);
?>
<nav>
</nav>
<h2 align="center" style="margin-top:20px; margin-bottom:20px; text-transform: uppercase;">ADMINISTRATION</h2>
    <div class="container">
        <div class="row">
            <div class="col col-centered">
                <table align="center" class="table table-bordered table-sm">
                    <thead class="thead-light">
                        <tr>
                            	<th>Name</th>
                            	<th>Email</th>
				<th>Delete</th>
				<th>Increase Balance</th>
				<th>Administrator Permissions</th>
				<th>Status</th>
				<th>Balance</th>
                        </tr>
                    </thead>
                    <?php
			while($row = mysqli_fetch_assoc($results)) {
				print "<tr>";
				print "<td>" . ($row["name"]) . "</td>";
				print "<td>" . ($row["email"]). "</td>";
				print "<td><a href='UserDelete.php?email=" . $row["email"] . "'>DELETE</a></td>";
				print "<td><a href='UserIncreaseBalance.php?email=" . $row["email"] . "'>Increase Balance</a></td>";
				if($row["is_admin"] == true ) {
					print "<td><a href='AdminPermissions.php?email=" . $row["email"] . "&name=" . $row["name"] . "'>Revoke Administrator</a>";
				}else {
					print "<td><a href='AdminPermissions.php?email=" . $row["email"] . "&name=" . $row["name"] . "'>Make Administrator</a>";
				}
				print "<td><a href='UserHoldStatus.php?email=" . $row["email"] ."&holdstatus=" . $row["hold_status"] . "'> ". $row["hold_status"] . "</a></td>";
				if($row["balance"]>0 && $row["hold_status"]=='Active'){
					$status = "<div><font color=green>".$row["balance"].", Good Standing</font></div>";
				}elseif($row["balance"] < 0 && $row["hold_status"]=='Active'){
					$status = "<div><font color=blue><em>".$row["balance"].", Required money</em></font></div>";
				}else{
					$status = "<div><font color=red><strong>Hold</strong></font></div>";
				}
				print "<td>$status</td>";
				print "</tr>";
			}
			?>
                </table>
            </div>
        </div>
        <div class="row">
		<div class="col">
            		<a href="UserEnroll.php" id="links" align="center">GO TO ENROLLMENT PAGE</a>
		</div>
		<div class="col" align="right">
			<a href="main.php" id="links" align="center">MAIN MENU</a>
            		<a href="logout.php" id="links">LOGOUT</a>
		</div>
        </div>
    </div>
</body>
</html>
