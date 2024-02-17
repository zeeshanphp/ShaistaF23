<?php
session_start();
if(empty($_SESSION['sell_id'])){
	header('location:index.php');
}include 'database.php';
$sid=$_SESSION['sell_id'];
$query="select * from categories where sellerId='$sid'";
$result=mysqli_query($conn, $query);
//get product details
$sid=$_SESSION['sell_id'];
$id=$_GET['e_id'];
//echo $id;die();
$query_prod="select * from products where pId='$id'";
$result_prod=mysqli_query($conn, $query_prod);
$fetch_prod=mysqli_fetch_array($result_prod);
if(isset($_POST['additem'])){
	//echo $_POST['pcat']; die();
	$folder = "images/";
	$folder = $folder.basename($_FILES['image']['name']);
	move_uploaded_file($_FILES['image']['tmp_name'],$folder);
	$pname=$_POST['pname'];
	$pprice=$_POST['pprice'];
	$pcat=$_POST['pcat'];
	$pimage = $_FILES['image']['name'];
	$query="INSERT INTO products(pname, pprice, photo, sellerId, pcat) VALUES ('$pname','$pprice','$pimage','$sid','$pcat')";	
	mysqli_query($conn,$query);
	header('location:allprod.php');
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
			<form method="post" enctype="multipart/form-data">
			<center><h3>EDIT PRODUCT</h3></center>
				<table class="table" style="width:600px; margin-left:350px;">
					<tr>
						<td>PRODUCT NAME</td>
						<td><input type="text" name="pname" class="form-control"  value="<?php echo $fetch_prod['pname']; ?>" /></td>
					</tr>
					<tr>
						<td>PRODUCT PRICE</td>
						<td><input type="text" name="pprice" class="form-control" value="<?php echo $fetch_prod['pprice']; ?>" /></td>
					</tr>
					<tr>
						<td>CATEGORY</td>
						<td>
							<select class="form-control" name="pcat">
								<option><?php echo $fetch_prod['pcat']; ?></option>
								<?php while($row=mysqli_fetch_array($result)){?>
								<option><?php echo $row['catname'] ?></option>
								<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>IMAGE</td>
						<td><input type="file" name="image" value="images/<?php echo $fetch_prod['pprice']; ?>" class="btn"></td>
					</tr>					
					<tr>
						<td></td>
						<td><input type="SUBMIT" value="ADD ITEM" name="additem" class="btn btn-primary"/></td>
					</tr>
				</table>
			</form>	

		</div>
	</body>
</html>