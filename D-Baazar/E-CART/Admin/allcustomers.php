<?php
include '../db-con.php';
session_start();
if(empty($_SESSION['admin_id'])){
	header('location:index.php');
}
$query_customer = "select * from customers";
$result = mysqli_query($conn,$query_customer);
if(isset($_GET['del_id'])){
	$id=$_GET['del_id'];
	$query="delete from customers where custId='$id'";
	mysqli_query($query);
	header('location:allcustomers.php');
}
 
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
						<th>CUSTOMER USERNAME</th>
						<th>CUSTOMER EMAIL</th>
						<th>CUSTOMER PHONE</th>
						<th>DELETE CUSTOMER</th>
					</tr>
					<?php while($row=mysqli_fetch_array($result)){ ?>
					<tr>
						<td><?php echo $row['fullname'];?></td>
						<td><?php echo $row['username'];?></td>
						<td><?php echo $row['email'];?></td>
						<td><?php echo $row['phone'];?></td>
						<td><a href="?del_id=<?php echo $row['custId'];?>" class="btn btn-outline-danger">DELETE CUSTOMER</a></td>
					</tr><?php }?>
					
				</table>
		</form>

		</div>
	</body>
</html>