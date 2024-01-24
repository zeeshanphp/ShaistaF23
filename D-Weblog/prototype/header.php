<!DOCTYPE html>
<html>

<head>
	<title>WEB BLOGER</title>
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
					<?php if (empty($_SESSION['userId'])) { ?>
						<li class="nav-item br ml-3"><a href="login.php" class="nav-link text-white">LOGIN</a></li>
						<li class="nav-item br ml-3"><a href="index.php" class="nav-link text-white">REGISTER</a></li>
					<?php } else { ?>
						<li class="nav-item br ml-3"><a href="logout.php" class="rounded btn btn-danger bg-gradient">LOGOUT</a></li>
					<?php } ?>
				</ul>

			</div>
		</div>
	</div>