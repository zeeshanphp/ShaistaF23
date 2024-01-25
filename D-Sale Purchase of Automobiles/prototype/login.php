<?php
include 'db.php';
session_start();
if (isset($_POST['ulogin'])) {
	$username = $_POST['uname'];
	$password = $_POST['upass'];
	//print_r($_POST); die();
	$query = "select * from users where username='$username' AND password='$password'";
	$rs = mysqli_query($conn, $query);
	if (mysqli_num_rows($rs) > 0) {

		$row = mysqli_fetch_array($rs);
		if ($row['role'] == 'A') {
			header('location: Admin/addcat.php');
		} else if ($row['role'] == 'S') {
			header('location: Seller/add_veh.php');
		} else if ($row['role'] == 'B') {
			header('location: index.php');
		} else {
			echo "<script>alert('Invalid User Role!')</script>";
		}
	} else {
		echo "<script>alert('Invalid Username or Password')</script>";
	}
}
?>
<html>

<head>
	<title>SALE PURCHASE OF AUTOMOBILES</title>

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
			<div class="col-md-12">
				<center>
					<h4>LOGIN</h4>
				</center>
				<form method="post">
					<table style="height:300px; width: 500px; margin: 0px auto;">
						<tr>
							<td>Enter Username</td>
							<td><input type="text" name="uname" class="form-control" placeholder="Enter Username" /></td>
						</tr>
						<tr>
							<td>Enter Password</td>
							<td><input type="password" name="upass" class="form-control" placeholder="Enter Password" /></td>
						</tr>

						<tr>
							<td colspan="2"><input type="submit" name="ulogin" class="btn btn-warning w-100" value="LOGIN" /></td>
						</tr>
						<tr>
							<td colspan="2"><a href="register.php" class="btn btn-primary w-100">REGISTER AS NEW CUSTOMER</a></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
		<div class="copyright">
			<span>All right reserved Virtual University Of Pakistan</span>
		</div>
	</div>




	</div>

</body>

</html>