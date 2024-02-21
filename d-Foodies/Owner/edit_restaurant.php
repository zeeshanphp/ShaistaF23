<?php
include 'db.php';
session_start();
$restaurants = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM restaurants WHERE restaurantId='$restaurants'");
$row = mysqli_fetch_array($result);
if (isset($_POST['update_restaurants'])) {
  $dname = $_POST['dname'];
  $dphone = $_POST['dphone'];
  $location = $_POST['location'];
  $query = "UPDATE restaurants SET dname='$dname',dphone='$dphone', location='$location' WHERE restaurantId='$restaurants'";
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
              <td colspan="3" class="text-color">
                <center>
                  <h5><b> UPDATE RESTAURANT</b></h5>
                </center>
              </td>
            </tr>
            <tr>
              <td rowspan="5"><img src="images/<?php echo $row['photo']; ?>" height="200" width="200" /></td>
            </tr>
            <tr>
              <td style="text-align:right"><b>Restaurant Name</b></td>
              <td><input type="text" class="form-control" name="dname" value="<?php echo $row['dname']; ?>" required></td>
            </tr>
            <tr>
              <td style="text-align:right"><b>Restaurant Phone</b></td>
              <td><input type="text" class="form-control" name="dphone" value="<?php echo $row['dphone']; ?>" required></td>
            </tr>

            <tr>
              <td style="text-align:right"><b>Select Location</b></td>
              <td><input type="text" class="form-control" name="location" value="<?php echo $row['location']; ?>" required>
              </td>
            </tr>
            <tr>
              <td></td>
              <td colspan="2"><input type="submit" name="update_restaurants" class="btn w-100 cust-btn" value="UPDATE RESTAURANT" /></td>
            </tr>
          </table>
        </form>
      </div>
    </div>

  </div>
  <?php include 'footer.php'; ?>
</body>

</html>