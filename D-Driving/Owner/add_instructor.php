<?php
include 'db.php';
session_start();
$owner = $_SESSION['owner'];

$schools = "select * from  schools where owner='$owner'";
$school_records = mysqli_query($conn, $schools);
if (isset($_POST['add_instructor'])) {
  $folder = 'images/';
  $folder = $folder . basename($_FILES['pimage']['name']);
  move_uploaded_file($_FILES['pimage']['tmp_name'], $folder);
  $certificate = $folder . basename($_FILES['fcert']['name']);
  move_uploaded_file($_FILES['fcert']['tmp_name'], $certificate);
  $profile_image = $_FILES['pimage']['name'];
  $certificate_image = $_FILES['fcert']['name'];
  $fname = $_POST['ufname'];
  $lname = $_POST['ulfname'];
  $phone = $_POST['uphone'];
  $email = $_POST['uemail'];
  $qual = $_POST['qual'];
  $city = $_POST['ucity'];
  $experience = $_POST['exp'];
  $expertise = $_POST['expertise'];
  $schoolId = $_POST['school'];
  $liscneceNo = $_POST['lisence_no'];
  $query = "INSERT INTO instructor(fname,lname,qual,exp,email, phone, city, photo, certificate, expertise, status, lisence, schoolId)VALUES ('$fname','$lname','$qual','$experience','$email','$phone','$city','$profile_image','$certificate_image','$expertise' , 'Accepted' , '$liscneceNo' , '$schoolId')";
  mysqli_query($conn, $query);
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
            <h5>ADD INSTRUCTOR</h5>
          </center>
        </div>
        <div class="card-body">
          <form method="POST" enctype="multipart/form-data">
            <table class="table table-borderless">
              <tr>
                <td>First Name</td>
                <td><input type="text" name="ufname" class="form-control" placeholder="Enter First Name" /></td>
                <td>Last Name</td>
                <td><input type="text" name="ulfname" class="form-control" placeholder="Enter Last Name" /></td>
              </tr>
              <tr>
                <td>Email</td>
                <td><input type="email" name="uemail" class="form-control" placeholder="Enter Email" /></td>
                <td>Phone</td>
                <td><input type="text" name="uphone" class="form-control" placeholder="Enter Phone No" /></td>
              </tr>
              <tr>
                <td>Adress</td>
                <td><input type="text" name="ucity" class="form-control" placeholder="Enter Your Adress" /></td>
                <td>Qualification</td>
                <td><input type="text" name="qual" class="form-control" placeholder="Enter Your Qualifications" /></td>
              </tr>
              <tr>
                <td>Experience</td>
                <td><input type="text" name="exp" class="form-control" placeholder="Enter Your Experience" /></td>
                <td>Liscence No</td>
                <td><input type="text" name="lisence_no" class="form-control" placeholder="Enter Your Liscence No" /></td>
              </tr>
              <tr>
                <td>Pic</td>
                <td><input type="file" name="pimage" class="form-control"></td>
                <td>Fitness Certificate</td>
                <td><input type="file" name="fcert" class="form-control"></td>
              </tr>
              <tr>
                <td>Expertise:</td>
                <td><select name="expertise" class="form-select">
                    <option value="Car">Car</option>
                    <option value="Bike">Bike</option>
                    <option value="LTV">LTV</option>
                    <option value="HTV">HTV</option>
                  </select></td>
                <td>Select School</td>
                <td><select name="school" class="form-select" required>
                    <option value=""></option>
                    <?php while ($fetch_school = mysqli_fetch_array($school_records)) { ?>
                      <option value="<?php echo $fetch_school['schoolId'] ?>"><?php echo $fetch_school['dname'] ?></option>
                    <?php  } ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td></td>
                <td colspan=""><input type="submit" name="add_instructor" class="btn w-100 btn-primary bg-gradient" value="ADD INSTRUCTOR" /></td>
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