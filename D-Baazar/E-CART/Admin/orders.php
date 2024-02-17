<?php
include '../db-con.php';
session_start();

$query_orders = "SELECT * FROM orders JOIN customers on customers.custId=orders.custId";
$result = mysqli_query($conn,$query_orders);

 
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
						<th>CUSTOMER NAME</th>
						<th>ORDER</th>
						<th>BILL</th>
						<th>ORDER DATE</th>
					</tr>
					<?php while($row=mysqli_fetch_array($result)){ ?>
					<tr>
						<td><?php echo $row['fullname'];?></td>
						<td><?php echo $row['items'];?></td>
						<td><?php echo $row['bill'];?></td>
						<td><?php echo $row['orderon'];?></td>
					</tr><?php }?>
					
				</table>
		</form>

		</div>
	</body>
</html>