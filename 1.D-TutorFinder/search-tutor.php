<?php
include "connection.php";
session_start();



?>


<!doctype html>
<html lang="">

<head>
	<title>TUTOR FINDER</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css">
</head>
<style>

</style>

<body>
	<!-- header section -->
	<header id="header">
		<div class="header-content clearfix"> <a class="logo" href="index.html">tutors <span>HUB</span></a>
			<div class="navigation">
				<?php include 'nav-bar.php' ?>
			</div>
		</div>
	</header>
	<!-- banner text -->
	<div class="row">
		<form method="post">
			<table class="table" style="width:700px; margin-left:300px;">
				<tr>
					<td>SEARCH</td>
					<td><input type="text" name="search" class="form-control" /></td>
					<td><input type="submit" name="find" class="btn btn-block btn-success" value="SEARCH TUTOR" /></td>
				</tr>
			</table>
		</form>
	</div>
	<?php
	if (isset($_POST['find'])) {
		$search = $_POST['search'];
		$query = "select *from tutors where speciality='$search'";
		$result = mysqli_query($conn, $query);
		while ($row = mysqli_fetch_array($result)) { ?>
			<div class="col-md-2 " style="margin-top:10px;height:300px; ">
				<div class="col-12">
					<div class="company_profile_info">
						<div class="company-up-info">
							<center><img src="Tutor/images/<?php echo $row['image'] ?>" class="rounded-circle" height="150px" width="105px"></center>
							<center>
								<h5> <?php echo $row['fullname']; ?> </h5>
							</center>
							<center>
								<p> <?php echo $row['speciality']; ?> </p>
							</center>
							<tr>
								<td colspan="2"><a href="hier.php?tutorId=<?php echo $row['tutorId']; ?>" title="" class="btn btn-primary w-100">Hire</a></td>
							</tr>
						</div>
					</div><!--company_profile_info end-->
				</div>

			</div>
	<?php }
	}	  ?>

</body>

</html>