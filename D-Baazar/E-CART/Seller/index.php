<?php
include '../db-con.php';

if(isset($_POST['login'])){
	$uname=$_POST['username'];
	$password=$_POST['password'];
		$query = "select * from seller where username='$uname' AND pass='$password'";
		$result= mysqli_query($conn ,$query);
		if(mysqli_num_rows($result)>0){
			$row=mysqli_fetch_array($result);
			session_start();
			$_SESSION['sell_id']= $row['sellId'];
			header ('location:pending_orders.php');				
			
		}
		else{
		echo "<script> alert('INCORRECT PASSWORD');</script>";
		}
			
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
			<center><h2 class="primary">SELLER PANNEL E-CART<br> LOGIN FORM</h2></center>
			<div class="row">
				<div class="col-lg-3">
					<form method="post">
						<table class="table" style="width:500px; margin-left:250px; margin-top:70px; height:300px;">
							<tr>
								<td style="vertical-align:middle;">Enter Username</td>
								<td style="vertical-align:middle;"><input name="username" type="text" class="form-control" placeholder="Enter Username" >
								</td>
							</tr>
							<tr>
								<td style="vertical-align:middle;">Enter Password</td>
								<td style="vertical-align:middle;"><input class="form-control" name="password" type="password"  placeholder="Enter Password"></td>
							</tr>						
							<tr>								
								<td colspan="2" style="vertical-align:middle;"><input type="submit" value="Login" name="login" class="btn btn-success btn-block" ></td>
							</tr>
							<tr>								
								<td colspan="2" style="vertical-align:middle;"><a href="register_seller.php" class="btn btn-primary btn-block" >REGSITER AS SELLER</a></td>
							</tr>
						</table>
						
					</form>
				</div>
			</div>		

		</div>

    </body>
</html>