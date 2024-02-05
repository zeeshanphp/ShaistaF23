  <?php
    include 'db.php';
    $message = "";
    if (isset($_POST['login_user'])) {
        $username = $_POST['uname'];
        $password = $_POST['upass'];
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $query);
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            $row = mysqli_fetch_array($result);
            if ($row['role'] == "Admin") {

                header('location: list_food.php');
            } else if ($row['role'] == "Customer") {

                header('location: add_food_user.php');
            }
        } else {
            echo "<script>alert('Invalid Username Or Password');</script>";
        }
    }
    ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Smart Stock Stealing Prevention POS for Restaurant</title>
      <link rel="stylesheet" href="css/bootstrap.min.css">

  </head>

  <body>
      <div class="container-fluid mx-0 px-0">
          <div class="row">
              <div class="col-md-12 bg-dark bg-gradient text-white">
                  <center>
                      <h4> ADMIN PANNEL </h4>
                      <h4>Smart Stock Stealing Prevention POS for Restaurant</>
                  </center>
              </div>
          </div>
          <div class="container">
              <div class="row">
                  <div class="col-md-3"></div>
                  <div class="col-md-6 my-5">
                      <div class="card">
                          <div class="card-header border border-primary text-primary">
                              <b>LOGIN</b>
                          </div>
                          <div class="card-body border border-primary">
                              <form method="POST">
                                  <table class="table table-borderless">
                                      <tr>
                                          <td><b>Enter Username</b></td>
                                          <td><input type="text" class="form-control" name="uname" placeholder="Enter User Username " required />
                                          </td>
                                      </tr>
                                      <tr>
                                          <td><b>Enter Password</b></td>
                                          <td><input type="password" class="form-control" name="upass" placeholder="Enter Password For User" required />
                                          </td>
                                      </tr>

                                      <tr>
                                          <td></td>
                                          <td><input type="submit" name="login_user" class="btn btn-primary bg-gradient w-100" value="Login" />
                                          </td>
                                      </tr>

                                  </table>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

      </div>
  </body>

  </html>