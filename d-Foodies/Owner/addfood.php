<?php
include 'db.php';
session_start();
$owner = $_SESSION['owner'];
$categories = "select * from categories";
$cat_records = mysqli_query($conn, $categories);

$restaurants = "select * from  restaurants where owner='$owner'";
$restaurants_records = mysqli_query($conn, $restaurants);


if (isset($_POST['add_items'])) {
  // echo $_SESSION['owner']; exit();
  // echo  $_POST['pcompany'];  echo  $_POST['pcat']; die();
  $folder = 'images/';
  $folder = $folder . basename($_FILES['pimage']['name']);
  move_uploaded_file($_FILES['pimage']['tmp_name'], $folder);
  $img = $_FILES['pimage']['name'];
  //echo $img; die();

  $pname = $_POST['pname'];
  $pprice = $_POST['pprice'];
  $pcat = $_POST['pcat'];
  $restaurants = $_POST['restaurants'];
  $query = "insert into  food(pname,pprice,photo,pcat,dprice,ownerId,restaurantsId) values('$pname' , '$pprice', '$img' , '$pcat', '$pprice' , '$owner' , '$restaurants')";
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
              <td style="text-align:right"><b>Food Category</b></td>
              <td><select name="pcat" class="form-control" required>
                  <option value=""></option>
                  <?php while ($row = mysqli_fetch_array($cat_records)) { ?>
                    <option value="<?php echo $row['catname'] ?>"><?php echo $row['catname'] ?></option>
                  <?php  } ?>
                </select>
              </td>
            </tr>
            <tr>
              <td style="text-align:right"><b>Select Restaurant</b></td>
              <td><select name="restaurants" class="form-control" required>
                  <option value=""></option>
                  <?php while ($fetch_restaurants = mysqli_fetch_array($restaurants_records)) { ?>
                    <option value="<?php echo $fetch_restaurants['dId'] ?>"><?php echo $fetch_restaurants['dname'] ?></option>
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