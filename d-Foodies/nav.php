<?php $cart_items = "";
if (empty($_SESSION['cart'])) {
	$cart_items = 0;
} else {
	$cart_items = count($_SESSION['cart']);
} ?>
<ul class="nav nav-fill bg-success cust-height ">
	<li class="nav-item py-2"> <a href="index.php" class="nav-link color-cust">Home</a> </li>
	<li class="nav-item py-2"> <a href="search_restaurant.php" class="nav-link color-cust">Search Restaurant</a> </li>
	<li class="nav-item py-2"> <a href="restaurants.php" class="nav-link color-cust">Restaurant</a> </li>
	<li class="nav-item py-2"> <a href="menu.php" class="nav-link color-cust">Menus</a> </li>
	<?php if (empty($_SESSION['customerId'])) {
	?>
		<li class="nav-item py-2"> <a href="Admin/" class="nav-link color-cust">Admin</a> </li>
		<li class="nav-item py-2"> <a href="Owner/" class="nav-link color-cust">Onwer</a> </li>
		<li class="nav-item py-2"> <a href="login.php" class="nav-link color-cust">Login</a> </li>
		<li class="nav-item py-2"> <a href="register.php" class="nav-link color-cust">Register</a> </li>
	<?php } else { ?>
		<li class="nav-item py-2"> <a href="orders.php" class="nav-link color-cust">Orders</a> </li>
		<li class="nav-item py-2"> <a href="logout.php" class="nav-link color-cust">Logout</a> </li>
		<li nav-item><a href="view_cart.php" class="btn btn-primary <?php if (empty($_SESSION['customerId'])) {
																		echo 'disabled';
																	} ?>">View Cart <span class="badge badge-danger"><?php echo $cart_items ?></span> </a></li>

	<?php } ?>
</ul>