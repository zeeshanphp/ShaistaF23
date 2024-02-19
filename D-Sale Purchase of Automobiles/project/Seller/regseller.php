<?php
include 'db.php';
	if(isset($_POST['addseller'])){
    $fullname=$_POST['fname'];
    $phone=$_POST['uphone'];
    $email=$_POST['uemail'];
    $pass=$_POST['upass'];
    $adress=$_POST['uadress'];
    $username=$_POST['uname'];
    $query = "insert into seller(username,fullname,pass,email,phone,adress,status) values('$username','$fullname','$pass','$email','$phone','$adress','Pending')";
    mysqli_query($conn, $query);
    header("location:index.php");
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>ONLINE USED CARS SALE AND PURCHASE SYSTEM</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
	  <style>
        body{
            background:#ecf0f5;
        }
		.nav-back{
			background:#3c8dbc;
			color: #FFF;
		}
	  </style>
</head>
<body>
<nav class=" nav-back">
            <center><h3>ONLINE USED CARS SALE AND PURCHASE SYSTEM</h3></center>
            <center><h4>SELLER PANNEL</h4></center>                     
       </nav>
	 <div class="container-fluid">

	  	 <div class="container-fluid">
            <div class="container mt-4">
                <div class="row py-4">
                    <div class="col-md-4" style="">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                    </div>

                    <div class="col-md-6">
                        <h2 class="form-title">REGISTER AS SELLER</h2>
                        <form method="POST">
                            <table class="table">
                                <tr>
                                    <td>Enter Fullname</td>
                                    <td><input type="text" name="fname" class="form-control" placeholder="Enter Fullname" /></td>
                                </tr>
                                <tr>
                                    <td>Enter Username</td>
                                    <td><input type="text" name="uname" class="form-control" placeholder="Enter Username" /></td>
                                </tr>
                                <tr>
                                    <td>Enter Password</td>
                                    <td><input type="password" name="upass" class="form-control" placeholder="Enter Password" /></td>
                                </tr>
                                <tr>
                                    <td>Enter Adress</td>
                                    <td><input type="text" name="uadress" class="form-control" placeholder="Enter Your Adress" /></td>
                                </tr>
                                <tr>
                                    <td>Enter Email</td>
                                    <td><input type="text" name="uemail" class="form-control" placeholder="Enter Email Adress" /></td>
                                </tr>
                                <tr>
                                    <td>Enter Phone</td>
                                    <td><input type="text" name="uphone" class="form-control" placeholder="Enter Phone number" /></td>
                                </tr>
                                <tr>                                    
                                    <td colspan="2"><input type="submit" name="addseller" class="btn btn-dark w-100" value="Register As Seller"/></td>
                                </tr>
                                <tr>                                    
                                    <td colspan="2">
                                        <a href="index.php" class="btn btn-success btn-block">
                                        LOGIN AS SELLER
                                        </a>
                                </td>
                                </tr>
                                <tr>                                    
                                    <td colspan="2">
                                         <a href="../" class="btn btn-success btn-block">GO TO USER PANNEL</a>
                                    </td>
                                </tr>
                            </table>                            
                            
                        </form>
                        
                    </div>
                </div>
            </div>
	  </div>
	  </div>
</body>
</html>
