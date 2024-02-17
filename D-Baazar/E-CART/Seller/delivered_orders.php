<?php
session_start();
if(empty($_SESSION['sell_id'])){
	header('location:index.php');
}
include '../db-con.php';
$sid=$_SESSION['sell_id'];
	$query="SELECT * FROM customers JOIN order_item on customers.custId=order_item.custId WHERE order_item.sellerId='$sid' AND order_item.status='Delivered'";
	$result=mysqli_query($conn, $query);
?>
<html>
	<head>
		<title>E-CART PROJECT </title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">	
	
	</head>
	<body style="background:azure;">
		<div class="container-fliud">
			<center><h2 class="primary">SELLER PANNEL E-CART</h2></center>
		<div class="navbar navbar-expand-lg navbar-dark bg-primary">
			<?php include 'sell-nav.php'; ?>
		</div>
			<form method="post">
			<center><h3>ALL DELIVERED ORDERS</h3></center>
				<table class="table">
					<tr>
						<th>USERNAME</th>
						<th>PHONE</th>
						<th>PRODUCT</th>
						<th>DELIVER ORDER</th>
					</tr>
					<?php while($row=mysqli_fetch_array($result)){?>
					<tr>
						<td style="vertical-align:middle;"><?php echo $row['fullname'] ?></td>
						<td style="vertical-align:middle;"><?php echo $row['phone'] ?></td>
						<td style="vertical-align:middle;"><?php echo $row['product'] ?></td>
						<td style="vertical-align:middle;">PRODUCT DELIVERED</td>
					</tr>								
					</tr>								
					<?php } ?>
				</table>
			</form>	

		</div>
	</body>
</html>