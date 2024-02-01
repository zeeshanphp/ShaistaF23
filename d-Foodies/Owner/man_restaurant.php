<?php
include 'db.php';
session_start();
$owner = $_SESSION['owner'];
$query = "select * from restaurants WHERE owner='$owner'";
$result = mysqli_query($conn, $query);
//script for delete inventory item 
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  mysqli_query($conn, "delete from restaurants where dId='$id'");
  header('location:man_restaurant.php');
}


?>
<!DOCTYPE html>
<html>

<head>
  <title>FOODIES.COM</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <link rel="stylesheet" href="css/styles.css">
  <style>
  </style>
</head>

<body>
  <nav class="container-fluid py-3 nav-back">
    <?php include 'top-nav.php' ?>

  </nav>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2 top-bg px-0">
        <?php include 'nav.php' ?>
      </div>
      <div class="col-md-8 mx-4 mt-4" style="background: #fff;">
        <center>
          <h5 class="text-color"><b>MANAGE RESTAURANT</b> </h5>
        </center>
        <table class="table table-bordered" id="myTable">
          <thead>
            <tr>
              <th>#</th>
              <th>Restaurant Image</th>
              <th>Restaurant Name</th>
              <th>Restaurant Phone</th>
              <th>Restaurant Location</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1;
            while ($row = mysqli_fetch_array($result)) {
            ?>
              <tr>
                <td><?php echo $i++; ?></td>
                <td> <img src="images/<?php echo $row['photo']; ?>" height='50' width='50'></td>
                <td><?php echo $row['dname']; ?></td>
                <td><?php echo $row['dphone']; ?></td>
                <td><?php echo $row['location']; ?></td>
                <td> <a href="edit_restaurant.php?id=<?php echo $row['dId']; ?>" class="btn btn-block btn-warning">EDIT</a></td>
                <td> <a href="?delete=<?php echo $row['dId']; ?>" class="btn btn-block btn-danger">DELETE</a></td>

              </tr>
            <?php

            } ?>

          </tbody>
        </table>
      </div>
    </div>

  </div>
  <?php include 'footer.php'; ?>
</body>

</html>