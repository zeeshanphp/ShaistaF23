<?php
session_start();
if(empty($_SESSION['sell_id'])){
	header('location:index.php');
}
include '../db-con.php';
$sid=$_SESSION['sell_id'];
if(isset($_POST['addcat'])){
	$catname=$_POST['cname'];
	$query="insert into categories(catname,sellerId) values('$catname', '$sid')";
	mysqli_query($conn, $query);
	header('location:allcat.php');
}
?>
<html>
	<head>
		<title>E-CART PROJECT </title>
<link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">	
		</head>
	<body style="background:azure;">
		<div class="container-fliud">
			<center><h2 class="primary">SELLER PANNEL E-CART</h2></center>
		<div class="navbar navbar-expand-lg navbar-dark bg-primary">
			<?php include 'sell-nav.php'; ?>
		</div>
			<form method="post">
			<center><h3>ADD CATEGORY</h3></center>
				<table class="table" style="width:600px; margin-left:350px;">
					<tr>
						<td>CATEGORY NAME</td>
						<td><input type="text" name="cname" class="form-control"/></td>
					</tr>
								
					<tr>
						<td></td>
						<td><input type="SUBMIT" value="ADD CATEGORY" name="addcat" class="btn btn-primary"/></td>
					</tr>
				</table>
			</form>	

		</div>
	</body>
</html>