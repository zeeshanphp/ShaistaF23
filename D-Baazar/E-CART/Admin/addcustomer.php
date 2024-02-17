<?php
include '../db-con.php';
session_start();
if(empty($_SESSION['admin_id'])){
	header('location:index.php');
}
if(isset($_POST['register'])){
	$fullname=$_POST['fname'];
	$username=$_POST['uname'];
	$contact=$_POST['c_no'];
	$email=$_POST['email'];
	$password=$_POST['password'];
			$query = "insert into customers (fullname,username,phone,email,pass)values('$fullname','$username','$contact' , '$email' , '$password') ";
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
						<td>FULL NAME</td>
						<td><input type="text" name="fname" class="form-control"/></td>
					</tr>
					<tr>
						<td>USERNAME</td>
						<td><input type="text" name="uname" class="form-control"/></td>
					</tr>
					<tr>
						<td>PASSWORD</td>
						<td><input type="password" name="password" class="form-control"/></td>
					</tr>
					<tr>
						<td>CONTACT NO</td>
						<td><input type="text" name="c_no" class="form-control"/></td>
					</tr>
					<tr>
						<td>EMAIL</td>
						<td><input type="email" name="email" class="form-control"/></td>
					</tr>					
					   
					<tr>
						<td></td>
						<td><input type="SUBMIT" value="SIGN UP" name="register" class="btn btn-block btn-outline-primary"/></td>
					</tr>
				</table>
		</form>

		</div>
	</body>
</html>