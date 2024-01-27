<?php
session_start();
if (empty($_SESSION['tutor'])) {
	header('location:index.php');
}
include "../connection.php";
$id = $_SESSION['tutor'];
$query_tutor = "select * from tutors where tutorId='$id'";
$rs_tutor = mysqli_query($conn, $query_tutor);
$fetch_tutor_info = mysqli_fetch_assoc($rs_tutor);
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
		<div class="row">
			<div class="col-md-12 bg-success bg-gradient">
				<center>
					<h1>TUTOR PANNEL</h1>
				</center>
			</div>
		</div>
		<div class="row">
			<div id="" class="col-md-2 bg-success bg-gradient">
				<?php include 'nav.php' ?>


			</div>
			<div class="col-md-6">

				<table class="table table-striped" style="height:500px;">
					<tr>
						<td>USERNAME</td>
						<td>
							<?php echo $fetch_tutor_info['username'];  ?>
						</td>

					</tr>
					<tr>
						<td>PASSWORD</td>
						<td>
							<?php echo $fetch_tutor_info['pass'];  ?>
						</td>
					</tr>
					<tr>
						<td>FULL NAME</td>
						<td>
							<?php echo $fetch_tutor_info['fullname'];  ?>
						</td>
					</tr>
					<tr>
						<td>EMAIL</td>
						<td>
							<?php echo $fetch_tutor_info['email'];  ?>
						</td>
					</tr>
					<tr>
						<td>PHONE NO</td>
						<td>
							<?php echo $fetch_tutor_info['phone'];  ?>
						</td>
					</tr>
					<tr>
						<td>SPECIALITY</td>
						<td>
							<?php echo $fetch_tutor_info['speciality'];  ?>
						</td>
					</tr>
					<tr>
						<td>SKILLS</td>
						<td>
							<?php echo $fetch_tutor_info['skills'];  ?>
						</td>
					</tr>
					<tr>
						<td>PRICE</td>
						<td>
							<?php echo $fetch_tutor_info['price'];  ?>
						</td>
					</tr>
					<tr>
						<td>DESCRIPTION</td>
						<td>
							<?php echo $fetch_tutor_info['Description'];  ?>
						</td>
					</tr>

				</table>

			</div>
			<div class="col-md-2">
				<img src="images/<?php echo $fetch_tutor_info['image']; ?>" class="img-circle" alt="please upload you photo" height="200px" width="200px" />
			</div>
		</div>

</body>

</html>