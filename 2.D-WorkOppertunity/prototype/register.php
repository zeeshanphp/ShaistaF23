  <?php
    include 'db.php';
    $message = "";
    $style = "";
    if (isset($_POST['add_user'])) {
        $fullname = $_POST['fname'];
        $phone = $_POST['uphone'];
        $email = $_POST['uemail'];
        $pass = $_POST['upass'];
        $username = $_POST['uname'];
        $city = $_POST['ucity'];
        $query = "insert into  customers(username,fullname,password,email,phone,city) values('$username','$fullname','$pass','$email','$phone','$city')";
        if (mysqli_query($conn, $query)) {
            $style = "alert alert-success";
            $message = "Customer Registered Successfully <a href='login.php'>Go To Login Page</a>";
        } else {
            $style = "alert alert-danger";
            $message = "Customer Registeration Failed";
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
                  <li class="breadcrumb-item"><a href="#">Modern Work Oppertunity</a></li>
                  <li class="breadcrumb-item text-white active" aria-current="page">Register</li>
              </ol>
          </nav>
      </div>
  </div>
  <!-- Header End -->


  <!-- Contact Start -->
  <div class="container-xxl py-5">
      <div class="container">
          <h1 class="text-center wow fadeInUp" data-wow-delay="0.1s">REGISTER CUSTOMER</h1>
          <div class="row g-4">

              <div class="col-md-3 wow fadeInUp" data-wow-delay="0.1s">
              </div>
              <div class="col-md-6">
                  <div class="wow fadeInUp" data-wow-delay="0.1s">
                      <div class="card">
                          <div class="card-header">
                              <h4>Customer Registration Pannel</h4>
                          </div>
                          <div class="card-body">
                              <form method="POST" enctype="multipart/form-data">
                                  <?php if ($message != "") { ?>
                                      <div class="<?php echo $style ?>"><?php echo $message ?></div>
                                  <?php } ?>
                                  <table class="table table-borderless">
                                      <tr>
                                          <td><b>Enter FullName</b></td>
                                          <td><input type="text" class="form-control" name="fname" placeholder="Enter User FullName" required /></td>
                                      </tr>
                                      <tr>
                                          <td><b>Enter Email Adress</b></td>
                                          <td><input type="text" class="form-control" name="uemail" placeholder="Enter User Email Adress" required /></td>
                                      </tr>
                                      <tr>
                                          <td><b>Enter Username</b></td>
                                          <td><input type="text" class="form-control" name="uname" placeholder="Enter User Username " required /></td>
                                      </tr>
                                      <tr>
                                          <td><b>Enter Password</b></td>
                                          <td><input type="password" class="form-control" name="upass" placeholder="Enter Password For User" required /></td>
                                      </tr>
                                      <tr>
                                          <td><b>Enter Phone</b></td>
                                          <td><input type="text" class="form-control" name="uphone" placeholder="Enter User Phone Number" required /></td>
                                      </tr>
                                      <tr>
                                          <td><b>Enter City</b></td>
                                          <td><input type="text" class="form-control" name="ucity" placeholder="Enter User City" required /></td>
                                      </tr>
                                      <tr>
                                          <td></td>
                                          <td><input type="submit" name="add_user" class="btn btn-success text-white w-100 bg-gradient bg-banner " value="Register As Customer" /></td>
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