<?php
include "../connection.php";
if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
	$result = mysqli_query($conn, $query);
	$count = mysqli_num_rows($result);
	if ($count > 0) {
		$row = mysqli_fetch_array($result);
		session_start();
		header('location: addTutor.php');
	} else {
		echo "<script>alert('Invalid Username Or Password');</script>";
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>ADMIN LOGIN PANNEL</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<style type="text/css">


	</style>
</head>

<body>
	<div class="container-fluid">
		<div class="row my-5 py-5">
			<div class="col-md-4"></div>
			<div class="col-lg-4">
				<div class="card">
					<div class="card-header">
						<center>
							<h4>TUTOR FINDER</h4>
						</center>
						<center>
							<h4>LOGIN PANNEL ADMIN</h4>
						</center>
					</div>
					<div class="card-body">
						<form action="" method="post">
							<table class="table">
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

							</table>
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>
</body>

</html>