<?php
session_start();
?>
<!DOCTYPE html>
<html>
<title>
	Foodies ,com
</title>

<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<style>
		.cust-height {
			height: 60px;
		}

		.color-cust {
			color: white;
		}

		color-cust:hover {
			background-color: red;
		}
	</style>
</head>

<body>


	<div class="container-fluid">
		<div class="row">
			<div class="col-2">

				<a href="Lahori Dhaba Design.html" target="main"><img src="images/logo3.png" width="180px" height="60px" align="left"></a>
			</div>

			<div class="col-10">
				<?php include 'nav.php' ?>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<img src="images/pic1.jpeg" width="100%" height="500px" align="center">
			</div>
		</div>

		<div class="row">
			<div class="col-3">
				<br><br>
				<h2>
					Tandoori Chicken
				</h2>
				<h4>
					Rs 300
				</h4>
				<h5>
					(All Time Favorite Whole Barbequed Spring Chicken)
				</h5>
			</div>
			<div class="col-3">
				<a href="#" target="main"><img src="images/pic2.png" width="90%" height="90%" align="center"></a>
			</div>
			<div class="col-3">
				<br><br>
				<h2>
					Kalamiri Kebab
				</h2>
				<h4>
					Rs 200
				</h4>
				<h5>
					(Chicken marinated with black pepper yogurt and spices grilled in tandoor served with green chutney and salad.)
				</h5>
			</div>
			<div class="col-3">
				<a href="#" target="main"><img src="images/pic3.png" width="90%" height="90%" align="center"></a>
			</div>

		</div>

		<div class="row">
			<div class="col-3">
				<br><br>
				<h2>
					Chicken Biryani
				</h2>
				<h4>
					Rs 250
				</h4>
				<h5>
					Mattis pulvi nar dapibus Vuctus nec ullam corper
				</h5>
			</div>
			<div class="col-3">
				<a href="#" target="main"><img src="images/pic4.png" width="90%" height="90%" align="center"></a>
			</div>
			<div class="col-3">
				<br><br>
				<h2>
					Chicken Lolypop
				</h2>
				<h4>
					Rs 150
				</h4>
				<h5>
					(A hot and spicy appetizer made with drumettes or whole chicken wings)
				</h5>
			</div>
			<div class="col-3">
				<a href="#" target="main"><img src="images/pic5.png" width="90%" height="90%" align="center"></a>
			</div>

		</div>

		<div class="row">
			<div class="col-3">
				<br><br>
				<h2>
					Kala Masala
				</h2>
				<h4>
					Rs 150
				</h4>
				<h5>
					(Chicken Cooked In Traditional Handi Style in Black Masala)
				</h5>
			</div>
			<div class="col-3">
				<a href="#" target="main"><img src="images/pic6.jpeg" width="90%" height="90%" align="center"></a>
			</div>
			<div class="col-3">
				<br><br>
				<h2>
					Mutton Rojan
				</h2>
				<h4>
					Rs 250
				</h4>
				<h5>
					(Mutton Prepared In Kashmiri Style )
				</h5>
			</div>
			<div class="col-3">
				<a href="#" target="main"><img src="images/pic7.jpeg" width="90%" height="90%" align="center"></a>
			</div>

		</div>
	</div>
</body>

</html>