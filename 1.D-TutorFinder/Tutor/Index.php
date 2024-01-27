<?php
include "../connection.php";
if (isset($_POST['login'])) {

	$username = $_POST['username'];
	$password = $_POST['password'];
	$query = "select * from tutors where username='$username' AND pass='$password'";
	$rs = mysqli_query($conn, $query);
	if (mysqli_num_rows($rs) > 0) {
		$row = mysqli_fetch_assoc($rs);
		session_start();
		$_SESSION['tutor'] = $row['tutorId'];
		header('location:addInfo.php');
	} else {
		echo "<script> alert('INVALID LOGIN DETAILS');</script>";
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Tutor LOGIN PANNEL</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<style type="text/css">
		body {
			background-image: url('../images/body-bg.jpg');

		}

		table {
			border: 0px;
			margin-left: 500px;
			height: 300px;
		}

		.top {
			width: 400px;
			margin-left: 550px;
			height: 70px;
			color: deepskyblue;

		}
	</style>
</head>

<body>
	<div class="top col-lg-4">

	</div>
	<div class="row">
		<div class="col-lg-4">
			<form action="" method="post">
				<table class="table table-striped" style="">

					<tr>
						<td colspan="2">
							<h4>TUTOR FINDER</h4>
							<h4>TUTOR LOGIN PANNEL</h4>
						</td>

					</tr>
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
						<td colspan="2">
							<a href="add_tutor.php" class="btn btn-primary bg-gradient w-100">Add Tutor</a>
						</td>
					</tr>

				</table>
			</form>
		</div>
	</div>
</body>

</html>