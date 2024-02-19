<?php
include 'db.php';
session_start();
$id = $_SESSION['seller'];
$message = "";
if (isset($_POST['add_items'])) {

  $folder = 'images/';
  $folder = $folder . basename($_FILES['pimage']['name']);
  move_uploaded_file($_FILES['pimage']['tmp_name'], $folder);
  $img = $_FILES['pimage']['name'];
  //echo $img; die();
  $countfiles = count($_FILES['photos']['name']);
  $veh_make = $_POST['vmake'];
  $veh_model = $_POST['vmodel'];
  $reg_city = $_POST['rcity'];
  $veh_color = $_POST['vcolor'];
  $year_make = $_POST['ymake'];
  $desc = $_POST['desc'];
  $query = "insert into  vehicles(make, model, image, regcity, color, year_of_make, sellerId, status,description) values('$veh_make' , '$veh_model', '$img' , '$reg_city','$veh_color' , '$year_make' , '$id' ,  'Available' , '$desc')";
  if (mysqli_query($conn, $query)) {
    $vehicleId =  mysqli_insert_id($conn);

    for ($i = 0; $i < $countfiles; $i++) {
      $filename = $_FILES['photos']['name'][$i];
      move_uploaded_file($_FILES['photos']['tmp_name'][$i], 'images/' . $filename);
      // Insert file details into the database
      $sql = "INSERT INTO vehicle_photos (filename, vehicleId) VALUES ('$filename', '$vehicleId')";
      if (mysqli_query($conn, $sql)) {
        $message = "Vehicle Added Successfully<a href='managecars.php'>Go To Vehicles Page</a>";
      } else {
        echo "Error inserting file details into the database:";
      }
    }
  }

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
        <?php if ($message != "") { ?>
          <div class="alert alert-success"><?php echo $message ?></div>
        <?php } ?>
        <form method="POST" enctype="multipart/form-data">
          <div class="row">

            <div class="col-md-7">
              <table class="table">
                <tr>
                  <td colspan="2" class="text-primary">
                    <center>
                      <h5> ADD VEHICLES</h5>
                    </center>
                  </td>
                </tr>
                <tr>
                  <td style="text-align:right"><b>Vehical Make</b></td>
                  <td><input type="text" class="form-control" name="vmake" placeholder="Enter Vehical Make" required></td>
                </tr>
                <tr>
                  <td style="text-align:right"><b>Vehical Model</b></td>
                  <td><input type="text" class="form-control" name="vmodel" placeholder="Enter Vehical Model"></td>
                </tr>
                <tr>
                  <td style="text-align:right"><b>Vehical Thumbnail</b></td>
                  <td><input type="file" name="pimage" class="form-control-file"></td>
                </tr>
                <tr>
                  <td style="text-align:right"><b>Vehical Gallery</b></td>
                  <td><input type="file" name="photos[]" class="form-control-file" multiple accept="image/*"></td>
                </tr>

                <tr>
                  <td style="text-align:right"><b>Registration City</b></td>
                  <td><input type="text" class="form-control" name="rcity" placeholder="Enter Registration City"></td>
                </tr>
                <tr>
                  <td style="text-align:right"><b>Vehical Color</b></td>
                  <td><input type="text" class="form-control" name="vcolor" placeholder="Enter Vehical Color"></td>
                </tr>
                <tr>
                  <td style="text-align:right"><b>Year Of Make</b></td>
                  <td><input type="text" class="form-control" name="ymake" placeholder="Enter Year Of Make"></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td colspan=""><input type="submit" name="add_items" class="btn w-100 btn-dark bg-gradient" value="ADD VEHICLE" /></td>
                </tr>
              </table>
            </div>
            <div class="col-md-4 mt-5 py-4">
              <textarea name="desc" id="" class="form-control" rows="10" placeholder="Enter Vehicle Description"></textarea>
            </div>

          </div>
        </form>
      </div>
    </div>

  </div>
</body>

</html>