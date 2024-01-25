<?php
include 'db.php';
session_start();
if (isset($_POST['uregister'])) {
	$fullname = $_POST['ufname'];
	$phone = $_POST['uphone'];
	$email = $_POST['uemail'];
	$pass = $_POST['upass'];
	$city = $_POST['ucity'];
	$username = $_POST['uname'];
	$type = $_POST['role'];
	$query = "INSERT INTO users(username,fullname,password,email,phone,city,role) VALUES ('$username','$fullname','$pass','$email','$phone','$city','$type')";
	mysqli_query($conn, $query);
	header("location:login.php");
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
					<h4>REGISTER AS NEW CUSTOMER</h4>
				</center>
				<form method="post">
					<table style="height:500px; width: 500px; margin: 0px auto;">
						<tr>
							<td>Enter Fullname</td>
							<td><input type="text" name="ufname" class="form-control" placeholder="Enter Fullname" /></td>
						</tr>
						<tr>
							<td>Enter Username</td>
							<td><input type="text" name="uname" class="form-control" placeholder="Enter Username" /></td>
						</tr>
						<tr>
							<td>Enter Password</td>
							<td><input type="password" name="upass" class="form-control" placeholder="Enter Password" /></td>
						</tr>
						<tr>
							<td>Enter Email</td>
							<td><input type="email" name="uemail" class="form-control" placeholder="Enter Password" /></td>
						</tr>
						<tr>
							<td>Enter Phone</td>
							<td><input type="text" name="uphone" class="form-control" placeholder="Enter Phone No" /></td>
						</tr>
						<tr>
							<td>Enter City</td>
							<td><input type="text" name="ucity" class="form-control" placeholder="Enter Your City" /></td>
						</tr>
						<tr>
							<td>Role:</td>
							<td><select name="role" class="form-control">
									<option value="S">Seller</option>
									<option value="A">Admin</option>
									<option value="B">Buyer</option>
								</select></td>
						</tr>
						<tr>
							<td colspan="2"><input type="submit" name="uregister" class="btn btn-warning w-100" value="REGISTER" /></td>
						</tr>
						<tr>
							<td colspan="2"><a href="loign.php" class="btn btn-primary w-100">LOGIN</a></td>
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