<?php
include 'db.php';
session_start();
$id = $_GET['id'];
$item_record = mysqli_query($conn, "select * from vehicles where vehicleId ='$id'");
$res_record = mysqli_fetch_array($item_record);
if (isset($_POST['update_vehicle'])) {

  $veh_make = $_POST['vmake'];
  $veh_model = $_POST['vmodel'];
  $reg_city = $_POST['rcity'];
  $veh_color = $_POST['vcolor'];
  $year_make = $_POST['ymake'];
  $query = "UPDATE vehicles SET make='$veh_make', model='$veh_model', regcity='$reg_city', color='$veh_color', year_of_make='$year_make' WHERE vehicleId ='$id'";
  mysqli_query($conn, $query);
  header('location:managecars.php');
}



?>
<!DOCTYPE html>
<html>

<head>
  <title>ONLINE USED CARS SALE AND PURCHASE SYSTEM</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <style>
    body {
      background: #ecf0f5;
      font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    }

    .cust-bg {
      background: #222d32;
    }

    .nav-back {
      background: #3c8dbc;
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
        <h4>SELLER PANNEL &nbsp ONLINE USED CARS SALE AND PURCHASE SYSTEM </h4>
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
              <td colspan="2" class="text-primary">
                <center>
                  <h5> UPDATE VEHICLE INFORMATION </h5>
                </center>
              </td>
            </tr>
            <tr>
              <td style="text-align:right"><b>Vehical Make</b></td>
              <td><input type="text" class="form-control" name="vmake" value="<?php echo $res_record['make'] ?>" /></td>
            </tr>
            <tr>
              <td style="text-align:right"><b>Vehical Model</b></td>
              <td><input type="text" class="form-control" name="vmodel" value="<?php echo $res_record['model'] ?>" /></td>
            </tr>

            <tr>
              <td style="text-align:right"><b>Registration City</b></td>
              <td><input type="text" class="form-control" name="rcity" value="<?php echo $res_record['regcity'] ?>" /></td>
            </tr>
            <tr>
              <td style="text-align:right"><b>Vehical Color</b></td>
              <td><input type="text" class="form-control" name="vcolor" value="<?php echo $res_record['color'] ?>" /></td>
            </tr>
            <tr>
              <td style="text-align:right"><b>Year Of Make</b></td>
              <td><input type="text" class="form-control" name="ymake" value="<?php echo $res_record['year_of_make'] ?>" /></td>
            </tr>

            <tr>
              <td></td>
              <td colspan=""><input type="submit" name="update_vehicle" class="btn w-100 btn-primary" value="UPDATE VEHICLES" /></td>
            </tr>
          </table>
        </form>
      </div>
    </div>

  </div>
</body>

</html>