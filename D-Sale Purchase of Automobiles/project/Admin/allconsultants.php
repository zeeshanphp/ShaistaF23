<?php
include 'db.php';
$query = "select * from consultant";
$result = mysqli_query($conn, $query);
?>

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

  <div class="container-fluid" style="margin: 0px; padding: 0px;">
    <div class="row">
      <div class="col-md-2 cust-bg">
        <?php include 'nav.php'; ?>
      </div>
      <div class="col-md-10 mt-4" style="background: #fff;">
        <center>
          <h5 class="text-primary">ALL REGISTERED CONSULTANTS </h5>
        </center>
        <table class="table table-bordered" id="myTable">
          <thead>
            <tr>
              <th>#</th>
              <th>Consultant Name</th>
              <th>Consultant Phone</th>
              <th>Consultant Email</th>
              <th>Consultant Password</th>
              <th>Experience</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1;
            while ($row = mysqli_fetch_array($result)) {
            ?>
              <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $row['cname']; ?></td>
                <td><?php echo $row['cphone']; ?></td>
                <td><?php echo $row['cemail']; ?></td>
                <td><?php echo $row['cpass']; ?></td>
                <td><?php echo $row['experience']; ?></td>

              </tr>
            <?php

            } ?>

          </tbody>
        </table>
      </div>
    </div>

</body>

</html>