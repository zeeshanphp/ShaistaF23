<?php
include 'db.php';
session_start();
$custId = $_SESSION['customerId'];
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
		<h4>MY PREVIOUS ORDERS</h4>

		<div class="row">
			<table class="table table-striped table-sm">
				<tr>
					<th> ORDER ITEMS</th>
					<th>BILL</th>
					<th>PAYMENT MODE</th>
					<th>ORDER STATUS</th>
					<th>ORDER ON</th>
					<th>ORDER DETAILS</th>

				</tr>
				<?php
				$result = mysqli_query($conn, "select * from orders where custId='$custId'");
				while ($row = mysqli_fetch_array($result)) { ?>
					<tr>
						<td><?php echo $row['items']; ?></td>
						<td>Rs.<?php echo $row['bill']; ?></td>
						<td><?php echo $row['status']; ?></td>
						<td><?php echo $row['order_status']; ?></td>
						<td><?php echo $row['orderon']; ?></td>
						<td><a href="view_order.php?orderId=<?php echo $row['ordId'] ?>" class="btn btn-primary">View Details</a></td>

					</tr>
				<?php }

				?>


			</table>
		</div>



		<div id="copyright">
			<span>All right reserved Virtual University Of Pakistan</span>
		</div>
	</div>

</body>

</html>