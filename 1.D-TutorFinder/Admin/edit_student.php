<?php
session_start();

include "../connection.php";
$id = $_GET['edit'];
$query_client = "select * from students where studentId='$id'";
$rs_client = mysqli_query($conn, $query_client);
$fetch_client_info = mysqli_fetch_assoc($rs_client);
if (isset($_POST['update'])) {
	$fullname = $_POST['fname'];
	$username = $_POST['uname'];
	$contact = $_POST['phone'];
	$email = $_POST['email'];
	$password = $_POST['pass'];
	$update_students = "update students set username='$username', password='$password',email='$email', phone='$contact', fullname='$fullname' where userId='$id'";
	mysqli_query($conn, $update_students);
	header('location:all_students.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>TUTOR FINDER</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>

<body>
	<div class="container-fluid">
		<div class="row bg-primary bg-gradient py-3 text-white">
			<div class="col-md-12">
				<center>
					<h4>ADMIN PANNEL TUTOR FINDER</h4>
				</center>
			</div>
		</div>
		<div class="row">
			<div id="" class="col-md-2 bg-primary">
				<?php include 'nav.php' ?>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						<center>
							<h4>UPDATE STUDENTS</h4>
						</center>
					</div>
					<div class="card-body">
						<form method="post">
							<table class="table table-striped" style="height:500px;">
								<tr>
									<td>USERNAME</td>
									<td>
										<input type="text" name="uname" value="<?php echo $fetch_client_info['username'];  ?>" class="form-control">
									</td>

								</tr>
								<tr>
									<td>PASSWORD</td>
									<td>
										<input type="text" name="pass" value="<?php echo $fetch_client_info['password'];  ?> " class="form-control">
									</td>
								</tr>
								<tr>
									<td>FULL NAME</td>
									<td>
										<input type="text" name="fname" value="<?php echo $fetch_client_info['fullname'];  ?>" class="form-control">
									</td>
								</tr>
								<tr>
									<td>EMAIL</td>
									<td>
										<input type="text" name="email" value="<?php echo $fetch_client_info['email'];  ?>" class="form-control">
									</td>
								</tr>
								<tr>
									<td>PHONE NO</td>
									<td>
										<input type="text" name="phone" value="<?php echo $fetch_client_info['phone'];  ?>" class="form-control">
									</td>
								</tr>
								<tr>
									<td colspan="2"><input type="submit" name="update" value="UPDATE" class="btn btn-block btn-success" /></td>
								</tr>

							</table>
						</form>
					</div>
				</div>

			</div>

		</div>

</body>

</html>