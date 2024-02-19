<?php
include 'db.php';
session_start();
$categories = "select * from  categories";
$cat_records = mysqli_query($conn, $categories);
$id = $_GET['id'];
$item_record = mysqli_query($conn, "select * from parts where pId='$id'");
$res_record = mysqli_fetch_array($item_record);
if (isset($_POST['update_items'])) {
  $id = $_GET['id'];
  $pname = $_POST['pname'];
  $pprice = $_POST['pprice'];
  $company = $_POST['pcat'];
  $veh_name = $_POST['vname'];
  $veh_model = $_POST['vmodel'];
  $query = "update parts set pname='$pname',pprice='$pprice', pcat='$company', vehname='$veh_name' , vehmodel='$veh_model' where pId='$id'";
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
        <form method="post">
          <table class="table">
            <tr>
              <td style="text-align:right"><b>Company Name</b></td>
              <td><select name="pcat" class="form-control">
                  <option value="<?php echo $res_record['pcat']; ?>"><?php echo $res_record['pcat']; ?></option>
                  <?php while ($row = mysqli_fetch_array($cat_records)) { ?>
                    <option value="<?php echo $row['catname'] ?>"><?php echo $row['catname'] ?></option>
                  <?php  } ?>
                </select>
              </td>
            </tr>
            <tr>
              <td style="text-align:right"><b>Vehicle Name</b></td>
              <td><input type="text" class="form-control" name="vname" value="<?php echo $res_record['vehname']  ?>"></td>
            </tr>
            <tr>
              <td style="text-align:right"><b>Vehicle Model</b></td>
              <td><input type="text" class="form-control" name="vmodel" value="<?php echo $res_record['vehmodel']  ?>"></td>
            </tr>
            <tr>
              <td style="text-align:right"><b>Part Name</b></td>
              <td><input type="text" class="form-control" name="pname" value="<?php echo $res_record['pname']  ?>" required></td>
            </tr>
            <tr>
              <td style="text-align:right"><b>Part Price</b></td>
              <td><input type="text" class="form-control" name="pprice" value="<?php echo $res_record['pprice']  ?>"></td>
            </tr>

            <tr>
              <td></td>
              <td colspan=""><input type="submit" name="update_items" class="btn w-100 btn-dark" value="UPDATE VEHICLE PART" /></td>
            </tr>
          </table>
        </form>
      </div>
    </div>

  </div>
</body>

</html>