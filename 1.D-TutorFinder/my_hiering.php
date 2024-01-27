<?php
include 'connection.php';
session_start();
$studentId = $_SESSION['studentId'];
$query = "SELECT * FROM hiering JOIN tutors on hiering.tutorId= tutors.tutorId WHERE hiering.studentId='$studentId' ";
$rs = mysqli_query($conn, $query);


?>

<!doctype html>
<html lang="">

<head>
	<title>TUTOR FINDER</title>
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">

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
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<center>
						<h3>MY HIERING</h3>
					</center>
				</div>
				<div class="card-body">

					<table class="table table-borderless" style="">

						<tr class="table-active">
							<th>IMAGE</th>
							<th>TUTOR NAME</th>
							<th>EMAIL</th>
							<th>PHONE</th>
							<th>SPECIALITY</th>
							<th>REMARKS</th>

						</tr>
						<?php while ($row = mysqli_fetch_array($rs)) { ?>
							<tr>
								<td> <img src="Tutor/images/<?php echo $row['image'] ?>" height="70" width="70"> </td>

								<td style="vertical-align: middle;">
									<?php echo $row['fullname']; ?>
								</td>
								<td style="vertical-align: middle;">
									<?php echo $row['email']; ?>
								</td>
								<td style="vertical-align: middle;">
									<?php echo $row['phone']; ?>
								</td>
								<td style="vertical-align: middle;">
									<?php echo $row['speciality']; ?>
								</td>
								<td style="vertical-align: middle;">
									<?php echo $row['status']; ?>
								</td>
							</tr>
						<?php } ?>
					</table>
				</div>
			</div>
		</div>







	</div>

</body>

</html>