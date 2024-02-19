<?php
include 'db.php';
$categories = "select * from  categories";
$cat_records = mysqli_query($conn, $categories);

if (isset($_POST['add_items'])) {

  // echo  $_POST['pcompany'];  echo  $_POST['pcat']; die();
  $folder = 'images/';
  $folder = $folder . basename($_FILES['pimage']['name']);
  move_uploaded_file($_FILES['pimage']['tmp_name'], $folder);
  $img = $_FILES['pimage']['name'];
  //echo $img; die();

  $pname = $_POST['pname'];
  $pprice = $_POST['pprice'];
  $pcat = $_POST['pcat'];
  $veh_name = $_POST['vname'];
  $model = $_POST['vmodel'];
  $query = "insert into  parts(pname,pprice,photo,pcat,vehname,vehmodel) values('$pname' , '$pprice', '$img' , '$pcat','$veh_name','$model')";
  mysqli_query($conn, $query);
  header('location:manageparts.php');
}



?>
<!DOCTYPE html>
<html>

<head>
  <title>Sale Purchase of Automobiles and Spare Parts</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <style>
    body {
      background: #ecf0f5;
      font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    }

    .nav-back,
    .cust-bg {
      background: #2d3436;
      color: #FFF;
    }

    ul li a {
      color: #b8c7ce;
    }

    ul li:hover {
      background: #636e72;
      color: #b8c7ce;
    }
  </style>
</head>

<body>
  <nav class="container-fluid py-3 nav-back">
    <div class="row">
      <div class="col-md-8">
        <h4>ADMIN PANNEL &nbsp&nbsp Sale Purchase of Automobiles and Spare Parts </h4>
      </div>
      <div class="col-md-4">
        <a href="logout.php" class="btn btn-danger float-right">Logout</a>
      </div>
    </div>

  </nav>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2 cust-bg">
        <?php include 'nav.php' ?>
      </div>
      <div class="col-md-8 mx-4 mt-4" style="background: #fff;">
        <form method="POST" enctype="multipart/form-data">

          <table class="table">
            <tr>
              <td style="text-align:right"><b>Company Name</b></td>
              <td><select name="pcat" class="form-control">
                  <option value="">----SELECT COMPANY FROM LIST----</option>
                  <?php while ($row = mysqli_fetch_array($cat_records)) { ?>
                    <option value="<?php echo $row['catname'] ?>"><?php echo $row['catname'] ?></option>
                  <?php  } ?>
                </select>
              </td>
            </tr>
            <tr>
              <td style="text-align:right"><b>Vehicle Name</b></td>
              <td><input type="text" class="form-control" name="vname" placeholder="Enter Vehicle Name"></td>
            </tr>
            <tr>
              <td style="text-align:right"><b>Vehicle Model</b></td>
              <td><input type="text" class="form-control" name="vmodel" placeholder="Enter Vehicle Model"></td>
            </tr>
            <tr>
              <td style="text-align:right"><b>Part Name</b></td>
              <td><input type="text" class="form-control" name="pname" placeholder="Enter Part Name" required></td>
            </tr>
            <tr>
              <td style="text-align:right"><b>Part Price</b></td>
              <td><input type="text" class="form-control" name="pprice" placeholder="Enter Part Price"></td>
            </tr>
            <tr>
              <td style="text-align:right"><b>Part Image</b></td>
              <td><input type="file" name="pimage" class="form-control-file"></td>
            </tr>
            <tr>
              <td style="text-align:right"><b>Select Seller</b></td>
              <td><select name="" class="form-control">
                  <?php
                  $result = mysqli_query($conn, "SELECT * FROM users WHERE type='Seller'");
                  while ($row = mysqli_fetch_array($result)) {  ?>
                    <option value="<?php echo $row['custId'] ?>"><?php echo $row['fullname'] ?></option>
                  <?php } ?>
                </select></td>
            </tr>

            <tr>
              <td></td>
              <td colspan=""><input type="submit" name="add_items" class="btn w-100 btn-dark" value="ADD VEHICLE PART" /></td>
            </tr>
          </table>
        </form>
      </div>
    </div>

  </div>
</body>

</html>