<ul class="nav nav-fill bg-success cust-height ">
	<li class="nav-item py-2"> <a href="index.php" class="nav-link color-cust">Home</a> </li>
	<li class="nav-item py-2"> <a href="restaurants.php" class="nav-link color-cust">Restaurant</a> </li>
	<li class="nav-item py-2"> <a href="menu.php" class="nav-link color-cust">Menus</a> </li>
	<li class="nav-item py-2"> <a href="Admin/" class="nav-link color-cust">Admin</a> </li>
	<li class="nav-item py-2"> <a href="Owner/" class="nav-link color-cust">Onwer</a> </li>
	<?php if (empty($_SESSION['custId'])) {
	?>
		<li class="nav-item py-2"> <a href="login.php" class="nav-link color-cust">Login</a> </li>
		<li class="nav-item py-2"> <a href="register.php" class="nav-link color-cust">Register</a> </li>
	<?php } else { ?>

		<li class="nav-item py-2"> <a href="logout.php" class="nav-link color-cust">Logout</a> </li>
	<?php } ?>
</ul>