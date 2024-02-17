<ul class="nav navbar-nav ml-auto" >
                        <li class="nav-item "><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item "><a class="nav-link" href="products.php">Products</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
						<?php if(empty($_SESSION)){ ?>
                        <li class="nav-item "><a class="nav-link" href="login.php">Login</a></li>
                        <li class="nav-item active"><a class="nav-link" href="register.php">Signup</a></li>
						<?php } else {?>
                        <li class="nav-item"><a class="nav-link" href="orders.php">My Orders</a></li>
                        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li><?php } ?>
</ul>