<?php

$conn = mysqli_connect('localhost' , 'root' , '' , 'ecart');
	$query = "select * from users";
	$result=mysqli_query($conn,$query);


?>

<html>
	<head>
		<title>E-CART </title>
		<link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css"/>
	</head>
	<body style="background:gainsboro;">
		<div class="container-fliud">
			<center><h2 class="primary">ADMIN PANNEL E-CART</h2></center>
		<div class="navbar navbar-expand-lg navbar-dark bg-primary">
			<?php include 'admin-nav.php'; ?>
		</div>
				<form method="post">
			<table class="table table-striped">
				<tr>
					<th>FULL NAME</th>
					<th>USERNAME</th>
					<th>PASSWORD</th>
					<th>CONTACT</th>
					<th>EMAIL</th>
					<th>USER TYPE</th>
				</tr>
				<?php
				while($row=mysqli_fetch_array($result)){
				?>
				<tr>
					<td><?php echo $row["fullname"]; ?></td>
					<td><?php echo $row["username"]; ?></td>
					<td><?php echo $row["pass"]; ?></td>
					<td><?php echo $row["phone"]; ?></td>
					<td><?php echo $row["E_mail"]; ?></td>
					<td><?php echo $row["userType"]; ?></td>
				</tr>
				<?php } ?>
			</table>
		</form>

		</div>
	</body>
</html>