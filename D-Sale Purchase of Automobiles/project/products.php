<?php
include 'db.php';
session_start();
//echo $_SESSION['customerId'];
$query = "select * from parts";
$result = mysqli_query($conn, $query);
?>

<html>

<head>

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

		ul li a {
			color: #f8f9d2;
		}

		ul li:hover {
			background: #f8f9d2;
			border-radius: 5px;
			color: blue;
			font-weight: bold;
		}

		.btn:hover {
			background: grey;
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
		<h4>OUR PRODUCTS</h4>
		<div class="row">

			<?php while ($fetch_items = mysqli_fetch_array($result)) { ?>
				<div class="col-md-3 py-2">
					<table>
						<tr>
							<td colspan="2"><img src="Admin/images/<?php echo $fetch_items['photo'] ?>" height="200" width="200" />
							</td>
						</tr>
						<tr>
							<td style="text-align:right;"><b>Vehicle Name:</b></td>
							<td><?php echo $fetch_items['vehname']; ?></td>
						</tr>
						<tr>
							<td style="text-align:right;"><b>Vehicle Model:</b></td>
							<td><?php echo $fetch_items['vehmodel']; ?></td>
						</tr>
						<tr>
							<td style="text-align:right;"><b>Part Name:</b></td>
							<td><?php echo $fetch_items['pname']; ?></td>
						</tr>
						<tr>
							<td style="text-align:right;"><b>Part Price:</b></td>
							<td>Rs.<?php echo $fetch_items['pprice']; ?></td>
						</tr>
						<tr>
							<td colspan="2"> <a href="view_seller.php?id=<?php echo  $fetch_items['sellerId'];  ?>" class="btn btn-primary w-100 <?php echo $style; ?>">VIEW SELLER INFO</a></td>
						</tr>
						<tr>
							<td colspan="2"> <a href="addtocart.php?id=<?php echo  $fetch_items['pId']; ?>" class="btn btn-success w-100 <?php echo $style; ?>">ADD TO CART</a></td>
						</tr>
						<tr>
							<td colspan="2"> <a href="feedback.php?id=<?php echo  $fetch_items['pId'];  ?>" class="btn btn-warning w-100 <?php echo $style; ?>">ADD REVIEWS</a></td>
						</tr>
					</table>
				</div>

			<?php } ?>
		</div>
	</div>
</body>

</html>