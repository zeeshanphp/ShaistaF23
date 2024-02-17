<?php
include 'db-con.php';
$id=$_GET['c_id'];
//check user is logged in  or not
if(empty($_SESSION['cust_id'])){
	echo "<script> alert('LOGIN TO CONTINUE'); window.location.replace('login.php');</script>";
die();
}

if(empty($_SESSION['cart'])){
$_SESSION['cart']= array();
}
array_push($_SESSION['cart'],$_GET['c_id']);

?>

<!DOCTYPE html>
<html lang="en">
	<head>
    
    <!-- Site Metas -->
    <title>E CART STORE TESTPHASE</title>    
    
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

		<div class="container">

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
			        <div class="row">
            	<table class="table table-striped table-sm " style="margin-top:70px;">
					<tr>
					<th>PRODUCT NAME</th>
					<th> CATEGORY</th>
					<th>PRICE</th>
					
					</tr>
					<?php 
					//$name stores id and $value stores quantity
					foreach($_SESSION['cart'] as $key => $value){
					$result = mysqli_query($conn,"select * from  products where pId= '".$value."'");
					while($row = mysqli_fetch_array($result)){
					$total = $value*$row['pprice'];
					?>
					<tr>
					<td><?php echo $row ['pname']; ?></td>
					<td><?php echo $row ['pcat']; ?></td>
					<td>Rs.<?php echo $row ['pprice']; ?></td>
				
					</tr>
					<?php }
					}
					?>
					<tr>
					<td colspan=""><a href="products.php" class="btn btn-primary">CONTINUE SHOPPING</a></td>
					<td colspan=""><a href="checkout.php" class="btn btn-danger">MAKE CHECKOUT</a></td>
					</tr>
				</table>
        </div> 
											
				

			<div id="copyright">
				<span>All right reserved Virtual University Of Pakistan</span>
			</div>
		</div>
		<script src="themes/js/common.js"></script>
		<script src="themes/js/jquery.flexslider-min.js"></script>
		<script type="text/javascript">
			$(function() {
				$(document).ready(function() {
					$('.flexslider').flexslider({
						animation: "fade",
						slideshowSpeed: 800,
						animationSpeed: 600,
						controlNav: false,
						directionNav: true,
						controlsContainer: ".flex-container" // the container that holds the flexslider
					});
				});
			});
		</script>
    </body>
</html>