<?php
include '../db-con.php';
session_start();
if(empty($_SESSION['admin_id'])){
	header('location:index.php');
}
$query_seller = "select * from seller";
$result = mysqli_query($conn,$query_seller);

 
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
						<th>SELLER NAME</th>
						<th>SELLER EMAIL</th>
						<th>SELLER PHONE</th>
						<th>VIEW STORE</th>
					</tr>
					<?php while($row=mysqli_fetch_array($result)){ ?>
					<tr>
						<td><?php echo $row['fullname'];?></td>
						<td><?php echo $row['email'];?></td>
						<td><?php echo $row['phone'];?></td>
						<td><a href="store-items.php?store_id=<?php echo $row['sellId'];?>" class="btn btn-success">VIEW STORE</a></td>
					</tr><?php }?>
					
				</table>
		</form>

		</div>
	</body>
</html>