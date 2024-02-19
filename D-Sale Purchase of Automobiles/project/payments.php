<?php
include 'db.php';
session_start();
$cust = $_SESSION['customerId'];
//echo 
//check user is logged in  or not
//$id=$_SESSION['userID'];
if (isset($_POST['order'])) {
	$coutItems =  count($_SESSION['cart']);
	// print_r($_SESSION['cart']);

	$card_no = $_POST['c_no'];
	$cv_no = $_POST['cv_no'];
	$date = $_POST['date'];
	$bill = $_SESSION['bill'];
	$items = $_SESSION['items'];
	$query_order = "INSERT INTO orders(bill, items, custId, status,order_status) VALUES('$bill','$items', '$cust' , 'Credit Card Payment' , 'PENDING')";
	mysqli_query($conn, $query_order);
	$orderId = mysqli_insert_id($conn);
	for ($i = 0; $i < $coutItems; $i++) {
		$pid =  $_SESSION['cart'][$i];
		$fetch_product = $result = mysqli_query($conn, "SELECT * FROM parts WHERE pId='$pid'");
		$row_product = mysqli_fetch_array($fetch_product);
		$pname = $row_product['pname'];
		$price = $row_product['pprice'];
		$seller = $row_product['sellerId'];
		mysqli_query($conn, "INSERT INTO order_items(pname,pprice,seller,orderId,custId)VALUES('$pname','$price','$seller','$orderId','$cust')");
	}
	// die();
	unset($_SESSION['bill']);
	unset($_SESSION['items']);
	unset($_SESSION['cart']);
	echo "<script> alert('YOUR ORDER IS PLACED');window.location.replace('products.php');</script>";
}

?>

<html>

<head>

	<title></title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<style>
		body {
			color: #f8f9d2;

			background-color: #2d3436;
			background-image: linear-gradient(315deg, #2d3436 0%, #000000 74%);
		}

		h4 {
			color: #f8f9d2;
		}

		hr {
			background-color: #f8f9d2;
		}

		ul li a {
			color: #f8f9d2;
		}

		ul li:hover {
			background: #f8f9d2;
			border-radius: 5px;
			color: blue;
			font-weight: bold;
		}
	</style>
</head>

<body>

	<div class="container">
		<div class="row py-4">
			<div class="col-md-2 m-0 p-0">
				<img src="images/logo.png" width="100%" />
			</div>
			<div class="col-md-10">
				<?php include 'nav.php'; ?>
			</div>

		</div>
		<div class="row">
			<img src="images/pbanner.jpg" height="200" width="100%" />
		</div>
		<div class="row">
			<center>
				<h2>PAYMENT GATEWAY</h2>
			</center>
			<img src="images/payment.png" height="70px" />
			<form method="post">
				<table class="table table-striped table-sm " style="margin-top:70px;">
					<tr>
						<th>ORDER ITEMS</th>
						<td><?php echo $_SESSION['items']; ?> </td>


					</tr>
					<tr>
						<th> BILL</th>
						<td>RS.<?php echo $_SESSION['bill']; ?></td>
					</tr>
					<tr>
						<th>CARD NO</th>
						<td><input type="text" name='c_no' placeholder="Enter Your Master Card No" class="form-control" required /></td>
					</tr>
					<tr>
						<th>CARD CV.NO</th>
						<td><input type="text" name='cv_no' placeholder="Enter Card CVN" class="form-control" required /></td>
					</tr>
					<tr>
						<th>CARD EXPIRY</th>
						<td><input type="date" name='date' class="form-control" required /></td>
					</tr>


					<tr>
						<td colspan=""><input type="submit" name="order" class="btn btn-primary" value="PLACE ORDER"></td>
						<td colspan=""><a href="?cancel" class="btn btn-danger">CANCEL ORDER</a></td>
					</tr>
				</table>
			</form>
		</div>



		<div id="copyright">
			<span>All right reserved Virtual University Of Pakistan</span>
		</div>
	</div>

</body>

</html>