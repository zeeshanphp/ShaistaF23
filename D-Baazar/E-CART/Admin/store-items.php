<?php
include '../db-con.php';
session_start();
if(empty($_SESSION['admin_id'])){
	header('location:index.php');
}
$sellId=$_GET['store_id'];
$query="select * from products where sellerId='$sellId'";
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
		<div class="row">
			<?php while($row=mysqli_fetch_array($result)){?>
			<div class="col-lg-3" style="float:left;">
				<table>
					<tr rowspan='2'>
						<td><img src="../Seller/images/<?php echo $row['photo'] ?>" height="200px" width="200px"/></td>
					</tr>
					<tr rowspan='2'>
						<td>Name:<?php echo $row['pname'] ?></td>
					</tr>
					<tr rowspan='2'>
						<td>Price:<?php echo $row['pprice'] ?></td>
					</tr>					
				</table>
				</div>
			<?php } ?>	
			</div>	
		</div>
	</body>
</html>