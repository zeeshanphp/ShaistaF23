<?php
include 'db.php';

if (isset($_POST['add_consultant'])) {
  $folder = 'images/';
  $folder = $folder . basename($_FILES['pimage']['name']);
  move_uploaded_file($_FILES['pimage']['tmp_name'], $folder);
  $img = $_FILES['pimage']['name'];
  $cname = $_POST['cname'];
  $cphone = $_POST['cphone'];
  $cpass = $_POST['cpass'];
  $cemail = $_POST['cemail'];
  $cexp = $_POST['cexp'];
  $query = "insert into  consultant(cname,cphone,cemail,cpass,experience,photo) values('$cname' , '$cphone', '$cemail' , '$cpass','$cexp','$img')";
  mysqli_query($conn, $query);
  header('location:dashboard.php');
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
              <td style="text-align:center;" class="text-primary"><b>ADD CONSULTANT</b></td>

            </tr>
            <tr>
              <td style="text-align:right"><b>Consultant Name</b></td>
              <td><input type="text" class="form-control" name="cname" placeholder="Enter Consultant Name"></td>
            </tr>
            <tr>
              <td style="text-align:right"><b>Consultant Email</b></td>
              <td><input type="text" class="form-control" name="cemail" placeholder="Enter Consultant Email Adress"></td>
            </tr>
            <tr>
              <td style="text-align:right"><b>Upload photo</b></td>
              <td><input type="file" name="pimage" class="form-control-file" required></td>
            </tr>
            <tr>
              <td style="text-align:right"><b>Consultant Phone</b></td>
              <td><input type="text" class="form-control" name="cphone" placeholder="Enter Consultant Phone Number" required></td>
            </tr>
            <tr>
              <td style="text-align:right"><b>Consultant Password</b></td>
              <td><input type="text" class="form-control" name="cpass" placeholder="Enter Password For Consultant"></td>
            </tr>
            <tr>
              <td style="text-align:right"><b>Consultant Experience</b></td>
              <td><input type="text" class="form-control" name="cexp" placeholder="Enter Experience Of Consultant"></td>
            </tr>

            <tr>
              <td></td>
              <td colspan=""><input type="submit" name="add_consultant" class="btn w-100 btn-dark" value="ADD CONSULTATN" /></td>
            </tr>
          </table>
        </form>
      </div>
    </div>

  </div>
</body>

</html>