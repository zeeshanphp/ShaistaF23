<?php
include 'db-con.php';
//check user is logged in  or not
if (empty($_SESSION['cust_id'])) {
	echo "<script> alert('LOGIN TO CONTINUE'); window.location.replace('login.php');</script>";
	die();
}

//declarre array to store products name
$prod_name = array();
//declarre array to store products price
$prod_price = array();
$prod_vendor = array();
//fetch items and bill from cart
foreach ($_SESSION['cart'] as $key => $value) {
	//query to get products from database
	$ss = mysqli_query($conn, "SELECT pname,pprice,sellerId FROM  products WHERE pId = '" . $value . "'");
	//fetching products from database table 
	while ($row = mysqli_fetch_array($ss)) {
		array_push($prod_name, $row['pname']);
		array_push($prod_price, $row['pprice']);
		array_push($prod_vendor, $row['sellerId']);
	}
	//implode is used to convert array into string
	$all =  implode(",", $prod_name);
	//array_sum is used to sum up whole array
	$bill = array_sum($prod_price);
	$_SESSION['items'] = $all;
	$_SESSION['bill'] = $bill;
	$_SESSION['sellerId'] = $prod_vendor;
}
if (isset($_GET['cancel'])) {

	$_SESSION['cart'] = "";

	echo "<script> alert('YOUR ORDER IS CANCELED');window.location.replace('products.php');</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

	<!-- Site Metas -->
	<title>E CART STORE CHECKOUT</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Site CSS -->
	<link rel="stylesheet" href="css/style.css">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="css/responsive.css">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="css/custom.css">

</head>

<body>

	<div class="container">

		<header class="main-header">
			<!-- Start Navigation -->
			<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
				<div class="container">
					<!-- Start Header Navigation -->
					<div class="navbar-header">

						<a class="navbar-brand" href="index.html">
							<h1>E-CART</h1>
						</a>
					</div>

					<div class="collapse navbar-collapse">
						<?php include 'top-nav.php'; ?>
					</div>

				</div>

			</nav>
			<!-- End Navigation -->
		</header>
		<div class="row">
			<table class="table table-striped table-sm " style="margin-top:70px;">
				<tr>
					<th>ORDER ITEMS</th>
					<th> BILL</th>

				</tr>
				<tr>
					<td><?php echo $all; ?> </td>
					<td>RS.<?php echo $bill; ?></td>
				</tr>

				<tr>
					<td colspan=""><a href="payment.php" class="btn btn-primary">PLACE ORDER</a></td>
					<td colspan=""><a href="checkout.php?cancel" class="btn btn-danger">CANCEL ORDER</a></td>
				</tr>
			</table>
		</div>



		<div id="copyright">
			<span>All right reserved Virtual University Of Pakistan</span>
		</div>
	</div>
	<script src="themes/js/common.js"></script>
	<script src="themes/js/jquery.flexslider-min.js"></script>
	<script type="text/javascript">
		$(function() {
			$(document).ready(function() {
				$('.flexslider').flexslider({
					animation: "fade",
					slideshowSpeed: 800,
					animationSpeed: 600,
					controlNav: false,
					directionNav: true,
					controlsContainer: ".flex-container" // the container that holds the flexslider
				});
			});
		});
	</script>
</body>

</html>