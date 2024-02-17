<?php
include 'db-con.php';
$query="select * from products where pcat='VEGETABLES'";
$result=mysqli_query($conn,$query);
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
                    <h2>PRODUCTS</h2>

                </div>
            </div>
			<table class="table">
				<tr>
					<td>SEARCH</td>
					<td><input type="text" name="search" class="form-control" /></td>
					<td><input type="submit" value="SEARCH" name="search" /></td>
				</tr>
			</table>
			<div class="row">
			<div class="col-lg-3">
			  <div id="sidebar-wrapper">
            <nav id="spy">
                <ul class="sidebar-nav nav">
                    <li class="sidebar-brand">
                        CATEGORIES
                    </li>
					<?php
					$query_cat="select DISTINCT catname from categories";
					$rs=mysqli_query($conn,$query_cat);
					while($fetch_cat=mysqli_fetch_array($rs)){
					?>
                    <li>
                        <a href="<?php echo $fetch_cat['catname']; ?>.php" data-scroll>
                            <?php echo $fetch_cat['catname']; ?>
                        </a>
                    </li>
					<?php } ?>
                    
                </ul>
            </nav>
        </div>
			</div>
		<div class="col-lg-9">

			<?php while($row=mysqli_fetch_array($result)){?>
				<div class="col-lg-3" style="float:left;">
				<table>
					<tr rowspan='2'>
						<td><img src="Seller/images/<?php echo $row['photo'] ?>" height="200px" width="200px"/></td>
					</tr>
					<tr rowspan='2'>
						<td>Name:<?php echo $row['pname'] ?></td>
					</tr>
					<tr rowspan='2'>
						<td>Price:<?php echo $row['pprice'] ?></td>
					</tr>
					
					<tr rowspan='2'>						
						<td><a href="feedback.php?id=<?php echo $row['pId'] ?>" class="btn btn-warning">FEEDBACK</a></td>
					</tr>
					<tr rowspan='2'>						
						<td><a href="addtocart.php?c_id=<?php echo $row['pId'] ?>" class="btn btn-primary">ADD TO CART</a></td>
					</tr>
				</table>
				</div>
			<?php } ?>	
			</div>	
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