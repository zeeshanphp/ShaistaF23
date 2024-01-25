<?php
include 'db.php';




?>
<!DOCTYPE html>
<html>

<head>
  <title>SALE PURCHASE OF AUTOMOBILES</title>
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
        <h4>SELLER PANNEL &nbsp&nbsp SALE PURCHASE OF AUTOMOBILES </h4>
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
              <td style="text-align:right"><b>Vehicle Image</b></td>
              <td><input type="file" name="pimage" class="form-control-file"></td>
            </tr>


            <tr>
              <td></td>
              <td colspan=""><input type="submit" name="add_items" class="btn w-100 btn-dark" value="ADD VEHICLE" /></td>
            </tr>
          </table>
        </form>
      </div>
    </div>

  </div>
</body>

</html>