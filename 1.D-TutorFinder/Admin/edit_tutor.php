<?php
session_start();

include "../connection.php";
$id = $_GET['edit'];
$query_tutor = "select * from tutors where tutorId='$id'";
$rs_tutor = mysqli_query($conn, $query_tutor);
$fetch_tutor_info = mysqli_fetch_assoc($rs_tutor);
if (isset($_POST['update'])) {
	$fullname = $_POST['fname'];
	$username = $_POST['uname'];
	$contact = $_POST['phone'];
	$email = $_POST['email'];
	$password = $_POST['pass'];
	$skills = $_POST['skills'];
	$spec = $_POST['spec'];
	$update = "update tutors set username='$username', email='$email', phone='$contact', fullname='$fullname', speciality='$spec' , qual='$skills' where tutorId='$id'";
	mysqli_query($conn, $update);
	header('location:all_tutor.php');
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
				<form method="post">
					<table class="table table-striped" style="height:500px;">
						<tr>
							<td>USERNAME</td>
							<td>
								<input type="text" name="uname" value="<?php echo $fetch_tutor_info['username'];  ?>">
							</td>

						</tr>
						<tr>
							<td>PASSWORD</td>
							<td>
								<input type="text" name="pass" value="<?php echo $fetch_tutor_info['pass'];  ?> ">
							</td>
						</tr>
						<tr>
							<td>FULL NAME</td>
							<td>
								<input type="text" name="fname" value="<?php echo $fetch_tutor_info['fullname'];  ?>">
							</td>
						</tr>
						<tr>
							<td>EMAIL</td>
							<td>
								<input type="text" name="email" value="<?php echo $fetch_tutor_info['email'];  ?>">
							</td>
						</tr>
						<tr>
							<td>PHONE NO</td>
							<td>
								<input type="text" name="phone" value="<?php echo $fetch_tutor_info['phone'];  ?>">
							</td>
						</tr>
						<tr>
							<td>SPECIALITY</td>
							<td>
								<input type="text" name="spec" value="<?php echo $fetch_tutor_info['speciality'];  ?>">
							</td>
						</tr>
						<tr>
							<td>SKILLS</td>
							<td>
								<input type="text" name="skills" value="<?php echo $fetch_tutor_info['skills'];  ?>">
							</td>
						</tr>
						<tr>
							<td colspan="2"><input type="submit" name="update" value="UPDATE" class="btn btn-block btn-success" /></td>
						</tr>

					</table>
				</form>
			</div>
			<div class="col-md-2">
				<img src="..Tutor/images/<?php echo $fetch_tutor_info['image']; ?>" alt="please upload you photo" height="300px" width="300px" />
			</div>
		</div>

</body>

</html>