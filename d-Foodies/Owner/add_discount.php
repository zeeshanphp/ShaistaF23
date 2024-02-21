<?php
include 'db.php';

$foodId = $_GET['id'];

if(isset($_POST['add_dis'])){

    $discount = $_POST['dprice'];
    $ratio = $_POST['dprice']/100;
    // echo $ratio;
    // print_r($_POST); die();
    $query="UPDATE food SET discount = '$discount' , dprice = (pprice-(pprice*'$ratio')) WHERE pId = '$foodId'";
    mysqli_query($conn, $query);
    header('location:manfood.php');
} 



?>
<!DOCTYPE html>
<html>
<head>
    <title>LAHORE DHABBA ORDERING SYSTEM</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        
        <link rel="stylesheet" href="css/styles.css">
	  <style>
	  </style>
</head>
<body>
<nav class="container-fluid py-3 nav-back">
            <div class="row">
                <div class="col-md-8">
                    <h4>ADMIN PANNEL &nbsp Lahore Dhabba Ordering System</h4>
                </div>
                <div class="col-md-4">
                    <a href="logout.php" class="btn btn-danger float-right">Logout</a>
                </div>
            </div>
                                 
       </nav>
	 <div class="container-fluid">
       <div class="row">
            <div class="col-md-2 top-bg px-0">
                <?php include 'nav.php' ?>
            </div>
            <div class="col-md-8 mx-4 mt-4" style="background: #fff;">
                <form method="POST" enctype="multipart/form-data">
              <table class="table">
              <tr>
                <td colspan="2" class="text-color"><center><h5><b>  ADD DISCOUNT</b></h5></center></td>
              </tr>
              <tr>
                <td>ADD DISCOUNT RATE</td>
                <td><input type="text" class="form-control" name="dprice" placeholder="Enter Discount %" required></td>
              </tr>
              <tr>
                <td></td>
                <td colspan=""><input type="submit" name="add_dis" class="btn w-100 cust-btn" value="ADD DISCOUNT"/></td>
              </tr>
              
            </table>
          </form>
            </div>
        </div>
	  	 
	</div>
    <?php include 'footer.php'; ?>
</body>
</html>
