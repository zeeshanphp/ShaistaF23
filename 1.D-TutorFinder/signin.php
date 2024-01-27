<?php
include 'connection.php';
if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$query = "select * from  students where username='$username' AND password='$password'";
	$result = mysqli_query($conn, $query);
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		session_start();
		$_SESSION['studentId'] = $row['studentId'];
		header('location:tutors.php');
	} else {
		echo "<script> alert('INCORRECT PASSWORD');</script>";
	}
}
?>
<!doctype html>
<html lang="">

<head>
	<title>TUTOR FINDER</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css">
	<style type="text/css">

	</style>
</head>

<body>
	<!-- header section -->
	<header id="header">
		<div class="header-content clearfix"> <a class="logo" href="index.html">tutors <span>HUB</span></a>
			<div class="navigation">
				<?php include 'nav-bar.php' ?>
			</div>
		</div>
	</header>

	<div class="row mt-5">
		<div class="col-md-4"></div>
		<div class="col-lg-4">
			<div class="card">
				<div class="card-header">
					<center>
						<h4>LOGIN</h4>
					</center>
				</div>
				<div class="card-body">
					<form action="" method="post">
						<table class="table table-borderless">

							<tr>
								<td>USERNAME</td>
								<td>
									<input type="text" name="username" placeholder="Enter Username" class="form-control">
								</td>
							</tr>
							<tr>
								<td>PASSWORD</td>
								<td>
									<input type="password" name="password" placeholder="Enter Password" class="form-control">
								</td>
							</tr>

							<tr>
								<td colspan="2" class="form-group"><input type="submit" name="login" value="LOGIN" class="btn btn-info" style="height: 40px; width:400px;">
								</td>
							</tr>
							<tr>
								<td colspan="2" class="form-group"><a href="register.php" class="btn btn-warning" style="height: 40px; width:400px;">REGISTER</a>
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>

		</div>
	</div>

</body>

</html>