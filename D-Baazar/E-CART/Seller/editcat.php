<?php
session_start();
if(empty($_SESSION['sell_id'])){
	header('location:index.php');
}
include 'database.php';
$id=$_GET['e_id'];

$fetch=mysqli_query($conn, "select * from categories where catId='$id'");
$row=mysqli_fetch_array($fetch);
if(isset($_POST['updatecat'])){
	
	$catname=$_POST['cname'];
	$query="update categories set catname='$catname' where catId='$id'";
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
    <link rel="stylesheet" href="../css/custom.css">	</head>
	</head>
	<body style="background:azure;">
		<div class="container-fliud">
			<center><h2 class="primary">SELLER PANNEL E-CART</h2></center>
		<div class="navbar navbar-expand-lg navbar-dark bg-primary">
			<?php include 'sell-nav.php'; ?>
		</div>
			<form method="post">
			<center><h3>EDIT CATEGORY</h3></center>
				<table class="table" style="width:600px; margin-left:350px;">
					<tr>
						<td>CATEGORY NAME</td>
						<td><input type="text" name="cname" class="form-control" value="<?php echo $row['catname']; ?>"/></td>
					</tr>
								
					<tr>
						<td></td>
						<td><input type="SUBMIT" value="UPDATE CATEGORY" name="updatecat" class="btn btn-warning"/></td>
					</tr>
				</table>
			</form>	

		</div>
	</body>
</html>