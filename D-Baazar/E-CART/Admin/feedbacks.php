<?php
include '../db-con.php';
session_start();
if(empty($_SESSION['admin_id'])){
	header('location:index.php');
}
$query_orders = "SELECT * FROM products JOIN feedback on products.pId=feedback.pId";
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
						<th>PRODUCT NAME</th>
						<th>PRODUCT CATEGORY</th>
						<th>FEEDBACK</th>
					</tr>
					<?php while($row=mysqli_fetch_array($result)){ ?>
					<tr>
						<td><?php echo $row['pname'];?></td>
						<td><?php echo $row['pcat'];?></td>
						<td><?php echo $row['feedback'];?></td>
					</tr><?php }?>
					
				</table>
		</form>

		</div>
	</body>
</html>