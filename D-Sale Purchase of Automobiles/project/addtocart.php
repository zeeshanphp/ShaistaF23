<?php
include 'db.php';
session_start();
if (empty($_SESSION['customerId'])) {
	header("location:products.php");
}
//products page sy aa rha ha
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	//check user is logged in  or not
	if (empty($_SESSION['cart'])) {
		$_SESSION['cart'] = array();
	}
	array_push($_SESSION['cart'], $_GET['id']);
	//print_r($_SESSION['cart']);

} else {
	header("location:products.php");
}



if (isset($_GET['remove'])) {
	$id = $_GET['remove'];
	$val = $_GET['val'];
	$_SESSION['cart'];
	$_SESSION['cart'][$val] = "";
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
				<ul class="nav nav-fill">
					<li class="nav-item"><a href="" class="nav-link">Home</a></li>
					<li class="nav-item"><a href="" class="nav-link">Products</a></li>
					<li class="nav-item"><a href="" class="nav-link">Search</a></li>
					<li class="nav-item"><a href="" class="nav-link">Login</a></li>
					<li class="nav-item"><a href="" class="nav-link">Consultant</a></li>
					<li class="nav-item"><a href="" class="nav-link">About us</a></li>
				</ul>

			</div>

		</div>
		<div class="row">
			<img src="images/pbanner.jpg" height="200" width="100%" />
		</div>
		<h4>ADD TO CART</h4>

		<div class="row">
			<table class="table table-striped table-sm " style="margin-top:70px;">
				<tr>
					<th>PRODUCT NAME</th>
					<th>PRICE</th>
					<th>BRAND</th>
					<th>UPDATE CART</th>

				</tr>
				<?php
				//PREVIOUS CODE
				//$name stores id and $value stores quantity
				foreach ($_SESSION['cart'] as $key => $value) {
					$result = mysqli_query($conn, "select * from  parts where pId= '" . $value . "'");
					while ($row = mysqli_fetch_array($result)) {
						$total = $value * $row['pprice'];
				?>
						<tr>
							<td><?php echo $row['pname']; ?></td>
							<td>Rs.<?php echo $row['pprice']; ?></td>
							<td><?php echo $row['vehname']; ?></td>
							<td> <a href="?remove=<?php echo $key; ?>&val=<?php echo $key; ?>" class="btn btn-danger">REMOVE FROM CART</a> </td>

						</tr>
				<?php }
				}
				?>
				<tr>
					<td colspan="2"><a href="products.php" class="btn btn-primary btn-block">CONTINUE SHOPPING</a></td>
					<td colspan="2"><a href="checkout.php" class="btn btn-warning btn-block">MAKE CHECKOUT</a></td>
				</tr>

			</table>
		</div>



		<div id="copyright">
			<span>All right reserved Virtual University Of Pakistan</span>
		</div>
	</div>

</body>

</html>