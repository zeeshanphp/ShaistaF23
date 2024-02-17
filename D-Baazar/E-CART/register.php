<?php
include 'db-con.php';
if(isset($_POST['register'])){
	$fullname=$_POST['fname'];
	$username=$_POST['uname'];
	$contact=$_POST['c_no'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$userType=$_POST['user_type'];
			$query = "insert into users (fullname,username,phone,E_mail,pass,userType)values('$fullname','$username','$contact' , '$email' , '$password','$userType' ) ";
			mysqli_query($conn,$query);
	
	//header('location:allusers.php');
}
 
?>

<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    
    <!-- Site Metas -->
    <title>E CART STORE</title>    
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

</head>

<body>


    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    
                    <a class="navbar-brand" href="index.html"><h1>E-CART</h1></a>
                </div>
                
                <div class="collapse navbar-collapse">
                    <?php include 'top-nav.php'; ?>
                </div>      
                
            </div>

        </nav>
        <!-- End Navigation -->
    </header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>REGISTERATION PAGE</h2>

                </div>
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
						<td><input type="SUBMIT" value="SIGN UP" name="register" class="btn btn-primary"/></td>
					</tr>
				</table>
			</form>	
        </div>
    
    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p class="footer-company">All Rights Reserved. &copy; E-CART developer Student of virtual university </p>

    </div>
    <!-- End copyright  -->
   <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/jquery.superslides.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>