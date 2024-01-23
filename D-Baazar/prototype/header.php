<!DOCTYPE html>
<html>

<head>
	<title>Baazar</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">

	<style>
		body {}

		ul li a {
			color: rgba(160, 85, 146, 1);
		}
	</style>
</head>

<body>

	<div class="container-fluid px-0">
		<div class="row">
			<div class="col-md-12">
				<ul class="nav nav-fill py-2 bg-primary bg-gradient">
					<li class="nav-item br ml-3"><a href="index.php" class="nav-link active text-white">HOME</a></li>
					<li class="nav-item br ml-3"><a href="index.php" class="nav-link text-white">PRODUCTS</a></li>
					<li class="nav-item br ml-3"><a href="search.php" class="nav-link text-white">SEARCH</a></li>

					<?php if (empty($_SESSION['teanant'])) { ?>
						<li class="nav-item br ml-3"><a href="Admin/" class="nav-link text-white">ADMIN LOGIN</a></li>
						<li class="nav-item br ml-3"><a href="login.php" class="nav-link text-white">LOGIN</a></li>
						<li class="nav-item br ml-3"><a href="register.php" class="nav-link text-white">REGISTER</a></li>

					<?php } else { ?>
						<li class="nav-item br ml-3"><a href="logout.php" class="nav-link text-white">LOGOUT</a></li>
					<?php
					} ?>

				</ul>

			</div>
		</div>
	</div>