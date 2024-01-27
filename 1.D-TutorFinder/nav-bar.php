<?php

?>

<ul class="primary-nav">
	<li><a href="home.php">HOME</a></li>
	<li><a href="tutors.php">TUTORS</a></li>
	<li><a href="search-tutor.php">SEARCH TUTORS</a></li>
	<?php if (empty($_SESSION['studentId'])) { ?>
		<li><a href="Admin/">ADMIN</a></li>
		<li><a href="Tutor/">TUTOR</a></li>
		<li><a href="signin.php">LOGIN</a></li>
		<li><a href="signup.php">REGISTER</a></li><?php } else { ?>
		<li><a href="my_profile.php">MY PROFILE</a></li>
		<li><a href="my_hiering.php">MY HIERING</a></li>
		<li><a href="logout.php">LOGOUT</a></li><?php } ?>



</ul>