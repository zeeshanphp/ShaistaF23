<?php
session_start();
include "connection.php";
if (empty($_SESSION['studentId'])) {
	header('location:tutors.php');
}
$message = "";

if (isset($_POST['sendreq'])) {
	$studentId = $_SESSION['studentId'];
	$tutor = $_GET['tutor'];
	$date = $_POST['date_book'];
	$desc = $_POST['desc'];
	$query_hiering = "insert into hiering (tutorId, studentId,book_date, description) values('$tutor','$studentId','$date','$desc')";
	mysqli_query($conn, $query_hiering);
	$message = "Hiering Request Sent To Tutor";
}
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
	<div class="row mt-4">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="card">
				<?php if ($message != "") { ?>
					<div class="alert alert-success"><?php echo $message ?></div>
				<?php } ?>
				<div class="card-header">
					<center>
						<h3>HIER TUTOR</h3>
					</center>
				</div>
				<div class="card-body">
					<form action="" method="post">
						<table class="table table-borderless">

							<tr>
								<td>HIER DATE</td>
								<td>
									<input type="date" name="date_book" class="form-control" required>
								</td>
							</tr>
							<tr>
								<td>DESCRIPTION</td>
								<td>
									<textarea rows='3' class="form-control" name='desc' placeholder="Enter Description And Requirments"></textarea>
								</td>
							</tr>
							<tr>
								<td></td>
								<td colspan="" class="form-group"><input type="submit" name="sendreq" value="SEND REQUEST" class="btn btn-primary w-100 bg-gradient">
								</td>
							</tr>

						</table>
					</form>
				</div>
			</div>
		</div>


		<div class="col-lg-4">

		</div>
	</div>

</body>

</html>