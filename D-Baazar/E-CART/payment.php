<?php
include 'db-con.php';
//check user is logged in  or not
if (empty($_SESSION['cust_id'])) {
	echo "<script> alert('LOGIN TO CONTINUE'); window.location.replace('login.php');</script>";
	die();
}
$id = $_SESSION['cust_id'];
if (isset($_POST['order'])) {
	$card_no = $_POST['c_no'];
	$cv_no = $_POST['cv_no'];
	$date = $_POST['date'];
	$bill = $_SESSION['bill'];
	$items = $_SESSION['items'];
	$query = "INSERT INTO payments(bill, cardno, cvno, date, custId) VALUES('$bill','$card_no', '$cv_no', '$date', '$id')";
	$query_order = "INSERT INTO orders(bill, items, custId) VALUES('$bill','$items', '$id')";
	if (mysqli_query($conn, $query_order)) {

		$last_id = mysqli_insert_id($conn);
		$items_name = explode(',', $_SESSION['items']);
		$sellers = $_SESSION['sellerId'];
		for ($i = 0; $i < count($items_name); $i++) {
			$query_order_items = "INSERT INTO order_item(product, order_id, price,sellerId,custId,status) VALUES('$items_name[$i]','$last_id', '200','$sellers[$i]','$id','PENDING')";
			mysqli_query($conn, $query_order_items);
		}
	}
	mysqli_query($conn, $query);
	$_SESSION['bill'] = "";
	$_SESSION['items'] = "";
	$_SESSION['cart'] = "";
	echo "<script> alert('YOUR ORDER IS PLACED');window.location.replace('products.php');</script>";
}
if (isset($_GET['cancel'])) {
	session_destroy();
	$_SESSION['cart'] = "";

	echo "<script> alert('YOUR ORDER IS CANCELED');window.location.replace('products.php');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

	<!-- Site Metas -->
	<title>E CART STORE PAYMENT GATEWAY</title>

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