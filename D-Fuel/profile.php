  <?php
    include 'db.php';
    session_start();
    $user = $_SESSION['userId'];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE user_id='$user'");
    $row = mysqli_fetch_array($result);
    $message = "";
    $style = "";
    if (isset($_POST['update_profile'])) {
        $fullname = $_POST['fname'];
        $phone = $_POST['uphone'];
        $email = $_POST['uemail'];
        $username = $_POST['uname'];
        $city = $_POST['ucity'];
        $query = "UPDATE users SET username='$username',fullname='$fullname',email='$email',phone='$phone',city='$city' WHERE user_id='$user'";
        if (mysqli_query($conn, $query)) {
            $style = "alert alert-success";
            $message = "Profile Updated Successfully &nbsp <a href='profile.php'>VIEW CHANGES</a>";
        } else {
            $style = "alert alert-danger";
            $message = "Profile Update Failed";
        }
    }
    include 'header.php';
    ?>

  <!-- Header End -->
  <div class="container-xxl bg-dark page-header">
      <div class="container">
          <h1 class="display-3 text-white mb-3 animated slideInDown">Register</h1>
          <nav aria-label="breadcrumb">
              <ol class="breadcrumb text-uppercase">
                  <li class="breadcrumb-item"><a href="#">Fuel Fleet</a></li>
                  <li class="breadcrumb-item"><a href="#">Prototype</a></li>
                  <li class="breadcrumb-item text-white active" aria-current="page">Update Profile</li>
              </ol>
          </nav>
      </div>
  </div>
  <!-- Header End -->


  <!-- Contact Start -->
  <div class="container-xxl py-5">
      <div class="container">
          <h1 class="text-center wow fadeInUp" data-wow-delay="0.1s">MY PROFILE</h1>
          <div class="row g-4">

              <div class="col-md-3 wow fadeInUp" data-wow-delay="0.1s">
              </div>
              <div class="col-md-6">
                  <div class="wow fadeInUp" data-wow-delay="0.1s">
                      <div class="card">
                          <div class="card-header">
                              <center>
                                  <h4>Customer Profile</h4>
                              </center>
                          </div>
                          <div class="card-body">
                              <form method="POST" enctype="multipart/form-data">
                                  <?php if ($message != "") { ?>
                                      <div class="<?php echo $style ?>"><?php echo $message ?></div>
                                  <?php } ?>
                                  <table class="table table-borderless">
                                      <tr>
                                          <td><b>Enter FullName</b></td>
                                          <td><input type="text" class="form-control" name="fname" value="<?php echo $row['fullname']; ?>" required /></td>
                                      </tr>
                                      <tr>
                                          <td><b>Enter Email Adress</b></td>
                                          <td><input type="text" class="form-control" name="uemail" value="<?php echo $row['email']; ?>" required /></td>
                                      </tr>
                                      <tr>
                                          <td><b>Enter Username</b></td>
                                          <td><input type="text" class="form-control" name="uname" value="<?php echo $row['username']; ?>" required /></td>
                                      </tr>

                                      <tr>
                                          <td><b>Enter Phone</b></td>
                                          <td><input type="text" class="form-control" name="uphone" value="<?php echo $row['phone']; ?>" required /></td>
                                      </tr>
                                      <tr>
                                          <td><b>Enter City</b></td>
                                          <td><input type="text" class="form-control" name="ucity" value="<?php echo $row['city']; ?>" required /></td>
                                      </tr>
                                      <tr>
                                          <td></td>
                                          <td><input type="submit" name="update_profile" class="btn btn-warning text-white w-100 bg-gradient bg-banner " value="Update Customer Profile" /></td>
                                      </tr>
                                  </table>
                              </form>

                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Contact End -->

  <?php
    include 'footer.php';
    ?>