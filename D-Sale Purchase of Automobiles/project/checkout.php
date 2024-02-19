<?php
include 'db.php';
session_start();
$cust = $_SESSION['customerId'];
//$customerId = $_SESSION['cust_id'];
//echo $_SESSION['email_adress']; die();
//check user is logged in  or not
/*if(empty($_SESSION['cust_id'])){
	echo "<script> alert('LOGIN TO CONTINUE'); window.location.replace('login.php');</script>";
die();
}*/

//declarre array to store products name
$prod_name = array();
//declarre array to store products price
$prod_price = array();
//fetch items and bill from cart
foreach ($_SESSION['cart'] as $key => $value) {
	//query to get products from database
	$ss = mysqli_query($conn, "SELECT pname,pprice FROM  parts WHERE pId = '" . $value . "'");
	//fetching products from database table 
	while ($row = mysqli_fetch_array($ss)) {
		//assign product name to array
		array_push($prod_name, $row['pname']);
		//assign product prices to array
		array_push($prod_price, $row['pprice']);
	}
	//implode is used to convert array into string
	$all =  implode(",", $prod_name);
	//array_sum is used to sum up whole array
	$bill = array_sum($prod_price);
	$_SESSION['items'] = $all;
	$_SESSION['bill'] = $bill;
}
// yeh wala if order cancel krny k lye ha
if (isset($_GET['cancel'])) {

	$_SESSION['cart'] = "";

	echo "<script> alert('YOUR ORDER IS CANCELED');window.location.replace('products.php');</script>";
}
if (isset($_GET['cod'])) {

	mysqli_query($conn, "INSERT INTO orders(bill, items, custId,status,order_status) VALUES('$bill','$all', '$cust','CASH ON DELIVERY','Pending')");

	/*$to = $_SESSION['email_adress'];
		$subject = "ORDER DETAILS";
		$txt = "<table><tr><td>Order Details</td>".$all."<td></td></tr><tr><td>Total Bill is</td>".$new_bill."<td></td></tr></table>";
		$headers = "From: shanii0802@gmail.com";
		mail($to,$subject,$txt,$headers);
	   	 	 */
	$_SESSION['cart'] = "";
	echo "<script> alert('YOUR ORDER IS PLACED AND DETALS SENT TO ');window.location.replace('orders.php');</script>";

	//header('location:orders.php');

}
?>
<html>

<head>
	<title>Sale Purchase of Automobiles and Spare Parts</title>

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
		<h4>SELECT PAYMENT METHOD</h4>
		<div class="row">
			<table class="table table-striped table-sm " style="margin-top:70px; height:300px;">
				<tr>
					<th>ORDER ITEMS</th>
					<td><?php echo $all; ?> </td>


				</tr>
				<tr>
					<th> TOTAL BILL</th>
					<td>RS.<?php echo $bill; ?></td>
				</tr>


				<tr>
					<td colspan="2"><a href="payments.php" class="btn btn-primary btn-block">MAKE PAYMENT BY CREDIT CARD</a>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<a href="?cod" class="btn btn-success btn-block">CASH ON DELIVERY</a>
					</td>

				</tr>
				<tr>
					<td colspan="2"><a href="checkout.php?cancel" class="btn btn-danger btn-block">CANCEL ORDER</a></td>
				</tr>
			</table>
		</div>



		<div id="copyright">
			<span>All right reserved Virtual University Of Pakistan</span>
		</div>
	</div>

</body>

</html>