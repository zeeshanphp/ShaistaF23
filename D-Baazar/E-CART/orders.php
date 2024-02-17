<?php
include 'db-con.php';
$id=$_SESSION['cust_id'];
$order_query="select * from orders where custId='$id'";
$result=mysqli_query($conn,$order_query);
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
                    <h2>ORDERS HISTORY</h2>

                </div>
            </div>
				<table class="table table-striped" style="">
					<tr>
						<th>ORDER ITEMS</th>
						<th>BILL</th>
						<th>ORDER DATE</th>
						<th>VIEW STATUS</th>
					</tr>
				<?php while($row=mysqli_fetch_array($result)){ ?>
					<tr>
						<td><?php echo $row['items']; ?></td>
						<td><?php echo $row['bill']; ?></td>
						<td><?php echo $row['orderon']; ?></td>
						<td><a href="order-status.php?ord_id=<?php echo $row['ordId']; ?> "class='btn btn-primary'>VIEW STATUS</a></td>
					</tr>
				<?php } ?>
				</table>
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