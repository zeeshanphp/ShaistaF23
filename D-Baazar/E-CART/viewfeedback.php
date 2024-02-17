<?php

$conn = mysqli_connect('localhost' , 'root' , '' , 'ecart');
	$query = "select * from contact";
	$result=mysqli_query($conn,$query);


?>

<html>
	<head>
		<title>TESTPHASE </title>
		<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
	</head>
	<body style="background:gainsboro;">
		<div class="container-fliud">
			<center><h2 class="primary">ADMIN PANNEL E-CART</h2></center>
		<div class="navbar navbar-expand-lg navbar-dark bg-primary">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active"><a class="nav-link" href="viewfeedback.php">VIEW ALL FEEDBACKS</a></li>
				<li class="nav-item active"><a class="nav-link" href="admin.php">VIEW ALL USERS</a></li>
			</ul>
		</div>
				<form method="post">
			<table class="table table-striped">
				<tr>
					<th>FULL NAME</th>					
					<th>EMAIL</th>
					<th>MESSAGE</th>
				</tr>
				<?php
				while($row=mysqli_fetch_array($result)){
				?>
				<tr>
					<td><?php echo $row["name"]; ?></td>
					<td><?php echo $row["E_mail"]; ?></td>
					<td><?php echo $row["message"]; ?></td>
				</tr>
				<?php } ?>
			</table>
		</form>

		</div>
	</body>
</html>