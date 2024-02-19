<ul class="nav nav-fill">
	<li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
	<li class="nav-item"><a href="products.php" class="nav-link">Products</a></li>
	<li class="nav-item"><a href="search.php" class="nav-link">Search</a></li>
	<li class="nav-item"><a href="vehicles.php" class="nav-link">Vehicles</a></li>
	<?php if (empty($_SESSION['customerId'])) { ?>
		<li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
		<li class="nav-item"><a href="login.php" class="nav-link">Register</a></li> <?php } else { ?>
		<li class="nav-item"><a href="orders.php" class="nav-link">Orders</a></li>
		<li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li><?php } ?>

</ul>