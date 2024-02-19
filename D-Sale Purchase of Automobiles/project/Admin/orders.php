<?php
include 'db.php';
$query = "SELECT * FROM `orders` JOIN customers on orders.custId=customers.custId;";
$result = mysqli_query($conn, $query);

if (isset($_GET['release'])) {
  $orderId = $_GET['release'];
  mysqli_query($conn, "update orders set order_status='Your Order Is Released' where ordId='$orderId'");
  header("location:orders.php");
}
if (isset($_GET['reject'])) {
  $orderId = $_GET['reject'];
  mysqli_query($conn, "update orders set order_status='Your Order Is Rejected' where ordId='$orderId'");
  header("location:orders.php");
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
          <h5 class="text-primary">ALL ORDERS PLACED BY USERS </h5>
        </center>
        <table class="table table-bordered" id="myTable">
          <thead>
            <tr>
              <th>#</th>
              <th>Customer Name</th>
              <th>Order Details</th>
              <th>Bill</th>
              <th>Order Date</th>
              <th>Order Status</th>
              <th>Payment Mode</th>
              <th>Release Order</th>
              <th>Reject Order</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1;
            while ($row = mysqli_fetch_array($result)) {
            ?>
              <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $row['fullname']; ?></td>
                <td><?php echo $row['items']; ?></td>
                <td><?php echo $row['bill']; ?></td>
                <td><?php echo $row['orderon']; ?></td>
                <td><?php echo $row['order_status']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td> <a href="?release=<?php echo $row['ordId']; ?>" class="btn btn-block btn-warning w-100">Release Order</a></td>
                <td> <a href="?reject=<?php echo $row['ordId']; ?>" class="btn btn-block btn-danger w-100">Reject Order</a></td>

              </tr>
            <?php

            } ?>

          </tbody>
        </table>
      </div>
    </div>

</body>

</html>