<ul class="nav nav-fill">
	<li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
	<li class="nav-item"><a href="schools.php" class="nav-link">Schools</a></li>
	<li class="nav-item"><a href="all_instructors.php" class="nav-link">Instructors</a></li>
	<?php if (empty($_SESSION['studentId'])) {
	?>
		<li class="nav-item"><a href="register.php" class="nav-link">Register</a></li>
		<li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
		<li class="nav-item"><a href="Admin/" class="nav-link">Admin</a></li>

	<?php } else { ?>
		<li class="nav-item"><a href="booking_requests.php" class="nav-link">Bookings</a></li>
		<li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
	<?php } ?>

</ul>