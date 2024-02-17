<?php
include 'db-con.php';

if(isset($_POST['register'])){
	$fullname=$_POST['fname'];
	$username=$_POST['uname'];
	$contact=$_POST['c_no'];
	$email=$_POST['email'];
	$password=$_POST['password'];
		$query = "insert into seller (fullname,username,phone,email,pass)values('$fullname','$username','$contact' , '$email' , '$password') ";
			mysqli_query($conn,$query);
			echo "<script>alert('SELLER INSERTED LOGIN TO PROCEED')</script>";
			header('location:index.php');
	}
			
	
	

		
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>E CART </title>
		    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Site CSS -->
		<link rel="stylesheet" href="../css/style.css">
		<!-- Responsive CSS -->
		<link rel="stylesheet" href="../css/responsive.css">
		<!-- Custom CSS -->
		<link rel="stylesheet" href="../css/custom.css">			
	</head>
    <body style="background:azure;">
		<div class="container">								
			<center><h2 class="primary">REGISTER AS SELLER</h2></center>
			<div class="row">
				<div class="col-lg-3">
					<form method="post">
				<table class="table" style="width:600px; margin-left:250px;height:500px;">
					<tr>
						<td style="vertical-align:middle;">FULL NAME</td>
						<td style="vertical-align:middle;"><input type="text" name="fname" class="form-control"/></td>
					</tr>
					<tr>
						<td style="vertical-align:middle;">USERNAME</td>
						<td style="vertical-align:middle;"><input type="text" name="uname" class="form-control"/></td>
					</tr>
					<tr>
						<td style="vertical-align:middle;">PASSWORD</td>
						<td style="vertical-align:middle;"><input type="password" name="password" class="form-control"/></td>
					</tr>
					<tr>
						<td style="vertical-align:middle;">CONTACT NO</td>
						<td style="vertical-align:middle;"><input type="text" name="c_no" class="form-control"/></td>
					</tr>
					<tr>
						<td style="vertical-align:middle;">EMAIL</td>
						<td style="vertical-align:middle;"><input type="email" name="email" class="form-control"/></td>
					</tr>				
					  
					<tr>
						<td></td>
						<td><input type="SUBMIT" value="SIGN UP AS SELLER" name="register" class="btn btn-primary"/></td>
					</tr>
				</table>
                    
			    </form>
				</div>
			</div>		

		</div>

    </body>
</html>