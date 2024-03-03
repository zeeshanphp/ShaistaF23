<?php
include 'db.php';
session_start();
$school = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM schools WHERE schoolId='$school'");
$row = mysqli_fetch_array($result);
if (isset($_POST['update_school'])) {
  $dname = $_POST['dname'];
  $dphone = $_POST['dphone'];
  $location = $_POST['location'];
  $query = "UPDATE schools SET dname='$dname',dphone='$dphone', location='$location' WHERE schoolId='$school'";
  mysqli_query($conn, $query);
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
    <div class="col-md-8 mx-4 mt-4" style="background: #fff;">
      <div class="card">
        <div class="card-header">
          <center>
            <h5><b> UPDATE SCHOOL</b></h5>
          </center>
        </div>
        <div class="card-body">
          <form method="POST" enctype="multipart/form-data">

            <table class="table">
              <tr>
                <td colspan="3" class="text-color">

                </td>
              </tr>
              <tr>
                <td rowspan="5"><img src="images/<?php echo $row['photo']; ?>" height="200" width="200" /></td>
              </tr>
              <tr>
                <td style="text-align:right"><b>School Name</b></td>
                <td><input type="text" class="form-control" name="dname" value="<?php echo $row['dname']; ?>" required></td>
              </tr>
              <tr>
                <td style="text-align:right"><b>School Phone</b></td>
                <td><input type="text" class="form-control" name="dphone" value="<?php echo $row['dphone']; ?>" required></td>
              </tr>

              <tr>
                <td style="text-align:right"><b>Select Location</b></td>
                <td><input type="text" class="form-control" name="location" value="<?php echo $row['location']; ?>" required>
                </td>
              </tr>
              <tr>
                <td></td>
                <td colspan="2"><input type="submit" name="update_school" class="btn w-100 btn-success bg-gradient" value="UPDATE SCHOOL" /></td>
              </tr>
            </table>
          </form>
        </div>
      </div>

    </div>
  </div>

</div>
<?php include 'footer.php'; ?>
</body>

</html>