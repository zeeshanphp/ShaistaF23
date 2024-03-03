<?php
include 'db.php';
session_start();
$owner =  $_SESSION['owner'];
$query = "SELECT * FROM instructor i JOIN schools s ON i.schoolId=s.schoolId WHERE s.owner='$owner'";
$result = mysqli_query($conn, $query);
//script for delete inventory item 
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  mysqli_query($conn, "delete from instructor where instructorId='$id'");
  header('location:manage_instructor.php');
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
            <h5 class="text-color"><b>MANAGE INSTRUCTOR</b> </h5>
          </center>
        </div>
        <div class="card-body">

          <table class="table table-bordered" id="myTable">
            <thead>
              <tr>
                <th>#</th>
                <th>Instructor Name</th>
                <th>School Name</th>
                <th>Expertise</th>
                <th>Liscense No</th>
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
                  <td><?php echo $row['fname']; ?></td>
                  <td><?php echo $row['dname']; ?></td>
                  <td><?php echo $row['expertise']; ?></td>
                  <td><?php echo $row['lisence']; ?></td>
                  <td> <a href="edit_instructor.php?id=<?php echo $row['instructorId']; ?>" class="btn btn-block btn-warning">EDIT</a></td>
                  <td> <a href="?id=<?php echo $row['instructorId']; ?>" class="btn btn-block btn-danger">DELETE</a></td>

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