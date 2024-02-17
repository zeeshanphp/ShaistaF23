<?php
session_start();
if(empty($_SESSION['sell_id'])){
	header('location:index.php');
}
include 'database.php';
$sid=$_SESSION['sell_id'];
	$query="select * from categories where sellerId='$sid'";
	$result=mysqli_query($conn, $query);

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
			<center><h3>ALL CATEGORY</h3></center>
				<table class="table">
					<tr>
						<td>CATEGORY NAME</td>
						<td>EDIT</td>
						<td>DELETE</td>
					</tr>
					<?php while($row=mysqli_fetch_array($result)){?>
					<tr>
						<td style="vertical-align:middle;"><b><?php echo $row['catname'] ?></b></td>
						<td style="vertical-align:middle;"><a href="editcat.php?e_id=<?php echo $row['catId'];?>" class="btn btn-outline-success">EDIT CATEGORY</a></td>
						<td style="vertical-align:middle;"><a href="deletecat.php?d_id=<?php echo $row['catId'];?>" class="btn btn-outline-danger">DELETE CATEGORY</a></td>						
					</tr>								
					<?php } ?>
				</table>
			</form>	

		</div>
	</body>
</html>