<?php
include 'db.php';
session_start();
$owner =  $_SESSION['owner'];
$query = "select * from food where ownerId='$owner'";
$result = mysqli_query($conn, $query);
//script for delete inventory item 
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  mysqli_query($conn, "delete from food where pId='$id'");
  header('location:manfood.php');
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
          <h5 class="text-color"><b>MANAGE FOOD ITEMS</b> </h5>
        </center>
        <table class="table table-bordered" id="myTable">
          <thead>
            <tr>
              <th>#</th>
              <th>Food Name</th>
              <th>Food Price</th>
              <th>Discount Price</th>
              <th>Food Category</th>
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
                <td><?php echo $row['pname']; ?></td>
                <td><?php echo $row['pprice']; ?></td>
                <td><?php echo $row['dprice']; ?></td>
                <td><?php echo $row['pcat']; ?></td>
                <td> <a href="edit_food.php?id=<?php echo $row['pId']; ?>" class="btn btn-block btn-warning">EDIT</a></td>
                <td> <a href="?id=<?php echo $row['pId']; ?>" class="btn btn-block btn-danger">DELETE</a></td>

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