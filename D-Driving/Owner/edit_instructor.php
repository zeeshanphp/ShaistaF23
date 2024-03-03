<?php
include 'db.php';
session_start();
$owner = $_SESSION['owner'];
$schools = "select * from  schools where owner='$owner'";
$school_records = mysqli_query($conn, $schools);
$id = $_GET['id'];
$fetch_record = mysqli_query($conn, "select * from instructor where instructorId='$id'");
$row = mysqli_fetch_array($fetch_record);
if (isset($_POST['update_instructor'])) {
  $fname = $_POST['ufname'];
  $lname = $_POST['ulfname'];
  $phone = $_POST['uphone'];
  $email = $_POST['uemail'];
  $qual = $_POST['qual'];
  $city = $_POST['ucity'];
  $experience = $_POST['exp'];
  $expertise = $_POST['expertise'];
  $liscneceNo = $_POST['lisence_no'];
  $query = "UPDATE instructor SET fname='$fname',lname='$lname',qual='$qual',exp='$experience',email='$email' , phone='$phone', city='$city',expertise='$expertise',lisence='$liscneceNo' WHERE instructorId='$id'";
  mysqli_query($conn, $query);
}
include 'header.php';
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
            <h5><b> UPDATE INSTRUCTOR</b></h5>
          </center>
        </div>
        <div class="card-body">
          <form method="POST" enctype="multipart/form-data">
            <table class="table table-borderless">
              <tr>
                <td>First Name</td>
                <td><input type="text" name="ufname" class="form-control" value="<?php echo $row['fname']; ?>" /></td>
                <td>Last Name</td>
                <td><input type="text" name="ulfname" class="form-control" value="<?php echo $row['lname']; ?>" /></td>
              </tr>
              <tr>
                <td>Email</td>
                <td><input type="email" name="uemail" class="form-control" value="<?php echo $row['email']; ?>" /></td>
                <td>Phone</td>
                <td><input type="text" name="uphone" class="form-control" value="<?php echo $row['phone']; ?>" /></td>
              </tr>
              <tr>
                <td>Adress</td>
                <td><input type="text" name="ucity" class="form-control" value="<?php echo $row['city']; ?>" /></td>
                <td>Qualification</td>
                <td><input type="text" name="qual" class="form-control" value="<?php echo $row['qual']; ?>" /></td>
              </tr>
              <tr>
                <td>Experience</td>
                <td><input type="text" name="exp" class="form-control" value="<?php echo $row['exp']; ?>" /></td>
                <td>Liscence No</td>
                <td><input type="text" name="lisence_no" class="form-control" value="<?php echo $row['lisence']; ?>" /></td>
              </tr>
              <tr>
                <td>Expertise:</td>
                <td><select name="expertise" class="form-select">
                    <option value="<?php echo $row['expertise']; ?>"><?php echo $row['expertise']; ?></option>
                    <option value="Car">Car</option>
                    <option value="Bike">Bike</option>
                    <option value="LTV">LTV</option>
                    <option value="HTV">HTV</option>
                  </select></td>

              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td colspan=""><input type="submit" name="update_instructor" class="btn btn-success bg-gradient w-100" value="UPDATE INSTRUCTOR" /></td>
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