<?php
include 'db.php';
session_start();

$query = "SELECT * FROM owner";
$result = mysqli_query($conn, $query);
//script for delete inventory item 
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  mysqli_query($conn, "DELETE FROM owner WHERE ownerId='$id'");
  header('location:owners.php');
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
      <div class="col-md-9 mx-4 mt-4" style="background: #fff;">
        <center>
          <h5 class="text-color"><b>ALL RESTAURANT OWNERS</b> </h5>
        </center>
        <table class="table table-bordered" id="myTable">
          <thead>
            <tr>
              <th>Owner Name</th>
              <th>Owner Username</th>
              <th>Owner Password</th>
              <th>Owner Email</th>
              <th>Owner Phone</th>
              <th>Edit</th>
              <th>Delete</th>

            </tr>
          </thead>
          <tbody>
            <?php
            while ($row = mysqli_fetch_array($result)) {
            ?>
              <tr>
                <td><?php echo $row['fullname']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['pass']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><a href="edit_owner.php?edit=<?php echo $row['ownerId']; ?>"><img src="../Owner/images/edit.png" height="30px" width="30px" /></a></td>
                <td><a href="?delete=<?php echo $row['ownerId']; ?>"><img src="../Owner/images/reject.png" height="30px" width="30px" /></a></td>
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