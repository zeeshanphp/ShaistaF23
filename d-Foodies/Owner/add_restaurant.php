<?php
include 'db.php';
session_start();
$owner = $_SESSION['owner'];
$locations = "select * from  location";
$loc_query = mysqli_query($conn, $locations);
if (isset($_POST['add_restaurants'])) {

  // echo  $_POST['pcompany'];  echo  $_POST['pcat']; die();
  $folder = 'images/';
  $folder = $folder . basename($_FILES['dimage']['name']);
  move_uploaded_file($_FILES['dimage']['tmp_name'], $folder);
  $img = $_FILES['dimage']['name'];
  //echo $img; die();
  $dname = $_POST['dname'];
  $dphone = $_POST['dphone'];
  $query = "insert into restaurants(dname,dphone,photo,location,owner) values('$dname' , '$dphone', '$img' , '$location' , '$owner')";
  mysqli_query($conn, $query);
  header('location:man_restaurant.php');
}



?>
<!DOCTYPE html>
<html>

<head>
  <title>FOODIES.COM
  </title>
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <link rel="stylesheet" href="css/styles.css">
  <style>
  </style>
</head>

<body>
  <nav class="container-fluid py-3 nav-back">
    <div class="row">
      <div class="col-md-8">
        <h4>OWNER PANNEL &nbsp FOODIES.COM
        </h4>
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
              <td colspan="2" class="text-color">
                <center>
                  <h5><b> ADD RESTAURANT</b></h5>
                </center>
              </td>
            </tr>
            <tr>
              <td style="text-align:right"><b>Restaurant Name</b></td>
              <td><input type="text" class="form-control" name="dname" placeholder="Enter  Name Of Restaurant" required></td>
            </tr>
            <tr>
              <td style="text-align:right"><b>Restaurant Phone</b></td>
              <td><input type="text" class="form-control" name="dphone" placeholder="Enter Phone" required></td>
            </tr>
            <tr>
              <td style="text-align:right"><b>Restaurant Image</b></td>
              <td><input type="file" name="dimage" class="form-control-file"></td>
            </tr>

            <tr>
              <td></td>
              <td colspan=""><input type="submit" name="add_restaurants" class="btn w-100 cust-btn" value="ADD RESTAURANT" /></td>
            </tr>
          </table>
        </form>
      </div>
    </div>

  </div>
  <?php include 'footer.php'; ?>
</body>

</html>