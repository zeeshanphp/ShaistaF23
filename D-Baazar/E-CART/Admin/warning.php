<?php
include '../db-con.php';
session_start();
if(empty($_SESSION['admin_id'])){
	header('location:index.php');
}
$query_seller = "select * from seller";
$result = mysqli_query($conn,$query_seller);

if(isset($_POST['warning'])){
	$sellId=$_POST['seller'];
	$warning=$_POST['warning-text'];
			$query = "insert into warning (warning,sellId)values('$warning','$sellId') ";
			mysqli_query($conn,$query);
	
	//header('location:allusers.php');
}
 
?>

<html>
	<head>
		<title>E-CART </title>
		<link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css"/>
	</head>
	<body style="background:gainsboro;">
		<div class="container-fliud">
			<center><h2 class="primary">ADMIN PANNEL E-CART</h2></center>
		<div class="navbar navbar-expand-lg navbar-dark bg-primary">
			<?php include 'admin-nav.php'; ?>
		</div>
				<form method="post">
			<table class="table table-striped" style="width:600px; margin-left:350px;">
					<tr>
						<td>SELECT SELLER</td>
						<td>
						<select class="form-control" name="seller">
							<option>---- SELECT SELLER----</option>
							<?php while($row=mysqli_fetch_array($result)){ ?>
							<option value="<?php echo $row['sellId'];?>"><?php echo $row['fullname'];?></option>
							<?php }?>
						</select>
						</td>
					</tr>
					<tr>
						<td>WARNING</td>
						<td><textarea name="warning-text" class="form-control" rows='5' cols='15'></textarea></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="SUBMIT" value="GENERATE WARNING" name="warning" class="btn btn-block btn-outline-warning"/></td>
					</tr>
				</table>
		</form>

		</div>
	</body>
</html>