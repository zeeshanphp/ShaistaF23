<?php
session_start();
if(empty($_SESSION['sell_id'])){
	header('location:index.php');
}
include '../db-con.php';
$sid=$_SESSION['sell_id'];
	$query="SELECT * FROM customers JOIN order_item on customers.custId=order_item.custId WHERE order_item.sellerId='$sid' AND order_item.status='PENDING'";
	$result=mysqli_query($conn, $query);
	$count = mysqli_num_rows($result);
if(isset($_GET['id'])){
	$id = $_GET['id'];
	//echo $id; die();
	$query_update="update order_item set status='Delivered' where id='$id'";
	mysqli_query($conn, $query_update);
	header('location:delivered_orders.php');
}

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
    <link rel="stylesheet" href="../css/custom.css">	</head>
	<body style="background:azure;">
		<div class="container-fliud">
			<center><h2 class="primary">SELLER PANNEL E-CART</h2></center>
		<div class="navbar navbar-expand-lg navbar-dark bg-primary">
			<?php include 'sell-nav.php'; ?>
			</ul>
		</div>
			<form method="post">
			<center><h3>ALL PENDING ORDERS</h3></center>
				<table class="table">
					<tr>
						<th>USERNAME</th>
						<th>PHONE</th>
						<th>PRODUCT</th>
						<th>DELIVER ORDER</th>
					</tr>
					<?php if($count==0){?>
					<marquee>
					<tr>
						<td style="horizental-align:middle;" colspan='4'>NO PENDING ORDERS</td>
					</tr></marquee>
					<?php
					}
					else{
					while($row=mysqli_fetch_array($result)){?>
					<tr>
						<td style="vertical-align:middle;"><?php echo $row['fullname'] ?></td>
						<td style="vertical-align:middle;"><?php echo $row['phone'] ?></td>
						<td style="vertical-align:middle;"><?php echo $row['product'] ?></td>
						<td style="vertical-align:middle;"><a href="pending_orders.php?id=<?php echo $row['id'];?>" class="btn btn-outline-success">DELIVER ITEM</a></td>
					</tr>								
					<?php }
					} ?>
				</table>
			</form>	

		</div>
	</body>
</html>