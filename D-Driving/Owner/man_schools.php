<?php
include 'db.php';
session_start();
$owner = $_SESSION['owner'];
$query = "select * from schools WHERE owner='$owner'";
$result = mysqli_query($conn, $query);
//script for delete inventory item 
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  mysqli_query($conn, "delete from schools where schoolId='$id'");
  header('location:man_schools.php');
}


?>
<?php
include 'header.php'
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-2 bg-primary px-0">
      <?php include 'nav.php' ?>
    </div>
    <div class="col-md-9 mx-4 mt-4" style="background: #fff;">
      <div class="card">
        <div class="card-header">
          <center>
            <h5 class="text-color"><b>MANAGE SCHOOLS</b> </h5>
          </center>
        </div>
        <div class="card-body">

          <table class="table table-bordered" id="myTable">
            <thead>
              <tr>
                <th>#</th>
                <th>School Image</th>
                <th>School Name</th>
                <th>School Phone</th>
                <th>School Location</th>
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
                  <td> <a href="edit_school.php?id=<?php echo $row['schoolId']; ?>" class="btn btn-block btn-warning">EDIT</a></td>
                  <td> <a href="?delete=<?php echo $row['schoolId']; ?>" class="btn btn-block btn-danger">DELETE</a></td>

                </tr>
              <?php

              } ?>

            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>

</div>
<?php include 'footer.php'; ?>
</body>

</html>