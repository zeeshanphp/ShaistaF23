<?php
include 'db.php';
$query = "select * from users";
$result = mysqli_query($conn, $query);

if (isset($_GET['block'])) {
  $custId = $_GET['block'];
  mysqli_query($conn, "update users set cstatus='Blocked' where custId='$custId'");
  header("location:blockuser.php");
}

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
          <h5 class="text-danger">BLOCK CUSTOMER</h5>
        </center>
        <table class="table table-bordered" id="myTable">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Phone</th>
              <th>Email</th>
              <th>Username</th>
              <th>Password</th>
              <th>Status</th>
              <th>Block User</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1;
            while ($row = mysqli_fetch_array($result)) {
            ?>
              <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $row['fullname']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['pass']; ?></td>
                <td><?php echo $row['cstatus']; ?></td>
                <td> <a href="?block=<?php echo $row['custId']; ?>" class="btn btn-block btn-danger w-100">BLOCK CUSTOMER</a></td>
              </tr>
            <?php

            } ?>

          </tbody>
        </table>
      </div>
    </div>

</body>

</html>