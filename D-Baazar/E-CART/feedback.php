<?php
include 'db-con.php';
if(empty($_SESSION['cust_id'])){
	echo "<script> alert('LOGIN TO CONTINUE'); window.location.replace('login.php');</script>";
die();
}
$cust_id=$_SESSION['cust_id'];
$pId= $_GET['id'];
$query="select * from products where pId='$pId'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
if(isset($_POST['addFeed'])){
	//echo $pId; die();
$feedback=$_POST['feedback'];	
$feedback_query="insert into feedback(feedback,custId,pId) values('$feedback','$cust_id', '$pId')";
mysqli_query($conn, $feedback_query);

}
$select_feedback = "select * from feedback where pId='$pId'";
$result_feedback = mysqli_query($conn, $select_feedback);
?>

<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    
    <!-- Site Metas -->
    <title>E CART TESTPHASE</title>    
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/nav.css">
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2>ADD FEEDBACK</h2>

                </div>
            </div>
			
			<div class="row">		
			
		<div class="col-lg-5">	
				<table>
					<tr rowspan='2'>
						<td><img src="Seller/images/<?php echo $row['photo'] ?>" height="400px" width="400px"/></td>
					</tr>
					<tr rowspan='2'>
						<td>Name:<?php echo $row['pname'] ?></td>
					</tr>
					<tr rowspan='2'>
						<td>Price:<?php echo $row['pprice'] ?></td>
					</tr>
					
				</table>
			</div>	
		<div class="col-lg-5">
			<form method="post">
				<table>					
					<tr>
						<td><b>FEEDBACK</b></td>
						<td><textarea name="feedback" rows='5' cols='35'></textarea></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="addFeed" value="ADD FEEDBACK" class="btn btn-block-secondry"/></td>
					</tr>
					
				</table>
			</form>
			</div>
			</div>
			<div class="row">
			<table style="margin-left:300px;">					
					<tr>
						<td><h1>PREVIOUS FEEDBACK</h1></td>
					</tr>
					<tr>
						<?php while($row_feedback=mysqli_fetch_array($result_feedback)){?>
						<td><?php echo $row_feedback['feedback'] ?></td>
						<?php } ?>
					</tr>
					
				</table>
			</div>
</div>			
    <!-- Start copyright  -->

    <!-- End copyright  -->
   <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/jquery.superslides.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>