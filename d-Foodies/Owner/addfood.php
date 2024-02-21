<?php
include 'db.php';
session_start();
$owner = $_SESSION['owner'];

$restaurants = "select * from  restaurants where owner='$owner'";
$restaurants_records = mysqli_query($conn, $restaurants);
if (isset($_POST['add_items'])) {

  $folder = 'images/';
  $folder = $folder . basename($_FILES['pimage']['name']);
  move_uploaded_file($_FILES['pimage']['tmp_name'], $folder);
  $img = $_FILES['pimage']['name'];
  $pname = $_POST['pname'];
  $pprice = $_POST['pprice'];
  $restaurantId = $_POST['restaurants'];
  $query = "insert into  food(pname,pprice,photo,dprice,ownerId,restaurantId) values('$pname' , '$pprice', '$img' , '$pprice' , '$owner' , '$restaurantId')";
  mysqli_query($conn, $query);
  header('location:manfood.php');
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
                  <h5><b> ADD FOOD ITEM</b></h5>
                </center>
              </td>
            </tr>
            <tr>
              <td style="text-align:right"><b>Food Name</b></td>
              <td><input type="text" class="form-control" name="pname" placeholder="Enter Product Name" required></td>
            </tr>
            <tr>
              <td style="text-align:right"><b>Food Price</b></td>
              <td><input type="text" class="form-control" name="pprice" placeholder="Enter Product Price" required></td>
            </tr>
            <tr>
              <td style="text-align:right"><b>Food Image</b></td>
              <td><input type="file" name="pimage" class="form-control-file"></td>
            </tr>

            <tr>
              <td style="text-align:right"><b>Select Restaurant</b></td>
              <td><select name="restaurants" class="form-control" required>
                  <option value=""></option>
                  <?php while ($fetch_restaurants = mysqli_fetch_array($restaurants_records)) { ?>
                    <option value="<?php echo $fetch_restaurants['restaurantId'] ?>"><?php echo $fetch_restaurants['dname'] ?></option>
                  <?php  } ?>
                </select>
              </td>
            </tr>
            <tr>
              <td></td>
              <td colspan=""><input type="submit" name="add_items" class="btn w-100 cust-btn" value="ADD FOOD ITEM" /></td>
            </tr>
          </table>
        </form>
      </div>
    </div>

  </div>
  <?php include 'footer.php'; ?>
</body>

</html>