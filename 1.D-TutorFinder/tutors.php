<?php
include "connection.php";
session_start();
$query = "select * from tutors";
$result = mysqli_query($conn, $query);

if (isset($_POST['add_rating'])) {
	if (empty($_SESSION['studentId'])) {
		header('location:tutors.php');
	} else {
		$rating = $_POST['rating'];
		$tutor = $_POST['tutorId'];
		$studentId = $_SESSION['studentId'];
		$query_rating = "insert into rating (tutorId, studentId, rating) values('$tutor','$studentId','$rating')";
		mysqli_query($conn, $query_rating);
		header('location: tutors.php');
	}
}
?>


<!doctype html>
<html lang="">

<head>
	<title>TUTOR FINDER</title>
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

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
	<div class="container-fluid">
		<div class="row">
			<?php while ($row = mysqli_fetch_array($result)) { ?>
				<div class="col-md-3" style="height:400px; ">
					<div class="card">
						<img src="Tutor/images/<?php echo $row['image'] ?>" class="card-img-top" alt="..." height="200">
						<div class="card-body">
							<center>
								<h5> <?php echo $row['fullname']; ?> </h5>
							</center>
							<center>
								<p> <?php echo $row['speciality']; ?> </p>
							</center>
							<tr>
								<td colspan="2"><a href="hier.php?tutor=<?php echo $row['tutorId']; ?>" title="" class="btn btn-primary bg-gradient w-100">Hire</a></td>
							</tr>
							<tr>
								<td colspan="2" class="py-2"><a href="reviews.php?tutor=<?php echo $row['tutorId']; ?>" class="btn btn-success w-100 bg-gradient mt-2">ADD REVIEWS</a>
								</td>
							</tr>
							<?php
							$sql = "SELECT AVG(rating) as average_rating
							FROM rating
							WHERE tutorId =" . $row['tutorId'];
							$result_av = mysqli_query($conn, $sql);
							$average_rating = mysqli_fetch_assoc($result_av);
							?>
							<div class="rateYo" data-rateYo-rating='<?php echo $average_rating['average_rating'] ?>'>
							</div>

							<form action="" method="post">
								<input type="hidden" name="rating" class="rating">
								<input type="hidden" name="tutorId" value="<?php echo $row['tutorId']; ?>">
								<br>
								<input type="submit" value="Give Rating" name="add_rating" class="btn btn-warning bg-gradient w-100">
							</form>

						</div>
					</div>

				</div>
			<?php } ?>
		</div>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
	<script>
		$(function() {

			$(".rateYo").rateYo({
				onSet: function(rating, rateYoInstance) {
					$('.rating').val(rating);
				}
			});

		});
	</script>
</body>


</html>