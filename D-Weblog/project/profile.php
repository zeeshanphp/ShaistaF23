  <?php
  include 'db.php';
  session_start();
  $userId = $_SESSION['userId'];
  $result = mysqli_query($conn, "SELECT * FROM users WHERE user_id='$userId'");
  $row = mysqli_fetch_array($result);
  if (isset($_POST['update_profile'])) {

    if (empty($_FILES['cimage']['name'])) {
      $img = $row['profile_pic'];
    } else {
      $folder = 'profile_pics/';
      $folder = $folder . basename($_FILES['cimage']['name']);
      move_uploaded_file($_FILES['cimage']['tmp_name'], $folder);
      $img = $_FILES['cimage']['name'];
    }
    $fullname = $_POST['fname'];
    $phone = $_POST['uphone'];
    $email = $_POST['uemail'];
    $username = $_POST['uname'];
    $city = $_POST['ucity'];
    mysqli_query($conn, "UPDATE users SET username='$username' , fullname='$fullname' , email='$email' , phone='$phone' , city='$city' , profile_pic='$img' WHERE user_id='$userId'");
    header('location: profile.php');
  }
  include 'header.php';
  ?>
  <div class="container">
    <form method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-3">
          <img src="profile_pics/<?php echo $row['profile_pic']; ?>" alt="" width="100%" height="auto" />
          <input type="file" class="form-control" name="cimage" />

        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header"> <b>
                <center>MY PROFILE</center>
              </b> </div>
            <div class="card-body">
              <table class="table table-borderless">
                <tr>
                  <td>Username:</td>
                  <td><input type="text" class="form-control" name="uname" value="<?php echo $row['username']; ?>" required /></td>
                </tr>
                <tr>
                  <td>Fullname:</td>
                  <td><input type="text" class="form-control" name="fname" value="<?php echo $row['fullname']; ?>" required /></td>
                </tr>
                <tr>
                  <td>Email:</td>
                  <td><input type="email" class="form-control" name="uemail" value="<?php echo $row['email']; ?>" required /></td>
                </tr>
                <tr>
                  <td>Phone:</td>
                  <td><input type="text" class="form-control" name="uphone" value="<?php echo $row['phone']; ?>" required /></td>
                </tr>
                <tr>
                  <td>City:</td>
                  <td><input type="text" class="form-control" name="ucity" value="<?php echo $row['city']; ?>" required /></td>
                </tr>
                <tr>
                  <td> </td>
                  <td colspan="">
                    <input type="submit" name="update_profile" class="btn btn-primary w-100" value="Update Profile" />
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
  <?php
  include 'footer.php';
  ?>