<?php
include 'db.php';
session_start();
$owner = $_SESSION['owner'];
if (isset($_POST['add_school'])) {

  // echo  $_POST['pcompany'];  echo  $_POST['pcat']; die();
  $folder = 'images/';
  $folder = $folder . basename($_FILES['dimage']['name']);
  move_uploaded_file($_FILES['dimage']['tmp_name'], $folder);
  $img = $_FILES['dimage']['name'];
  $dname = $_POST['dname'];
  $location = $_POST['location'];
  $dphone = $_POST['dphone'];
  $query = "insert into schools(dname,dphone,photo,location,owner) values('$dname' , '$dphone', '$img' , '$location' , '$owner')";
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
            <h5><b> ADD SCHOOL</b></h5>
          </center>
        </div>
        <div class="card-body">
          <form method="POST" enctype="multipart/form-data">

            <table class="table table-borderless">
              <tr>
                <td colspan="2" class="text-color">

                </td>
              </tr>
              <tr>
                <td style="text-align:right"><b>School Name</b></td>
                <td><input type="text" class="form-control" name="dname" placeholder="Enter  Name Of Restaurant" required></td>
              </tr>
              <tr>
                <td style="text-align:right"><b>School Location</b></td>
                <td>
                  <input type="text" class="form-control" name="location" placeholder="Enter Location" required />
                </td>
              </tr>
              <tr>
                <td style="text-align:right"><b>School Phone</b></td>
                <td><input type="text" class="form-control" name="dphone" placeholder="Enter Phone" required></td>
              </tr>
              <tr>
                <td style="text-align:right"><b>School Image</b></td>
                <td><input type="file" name="dimage" class="form-control"></td>
              </tr>

              <tr>
                <td></td>
                <td colspan=""><input type="submit" name="add_school" class="btn btn-success bg-gradient w-100" value="ADD SCHOOL" /></td>
              </tr>
            </table>
          </form>
        </div>
      </div>

    </div>
  </div>

</div>
<?php include 'footer.php'; ?>