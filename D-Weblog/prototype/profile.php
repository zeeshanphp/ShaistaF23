  <?php
  include 'db.php';
  session_start();
  $userId = $_SESSION['userId'];
  $result = mysqli_query($conn, "SELECT * FROM users WHERE user_id='$userId'");
  $row = mysqli_fetch_array($result);
  include 'header.php';
  ?>
  <div class="container">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header"> <b>
              <center>MY PROFILE</center>
            </b> </div>
          <div class="card-body">
            <table class="table table-borderless">
              <tr>
                <td>Username:</td>
                <td><?php echo $row['username']; ?></td>
              </tr>
              <tr>
                <td>Fullname:</td>
                <td><?php echo $row['fullname']; ?></td>
              </tr>
              <tr>
                <td>Email:</td>
                <td><?php echo $row['email']; ?></td>
              </tr>
              <tr>
                <td>Phone:</td>
                <td><?php echo $row['phone']; ?></td>
              </tr>
              <tr>
                <td>City:</td>
                <td><?php echo $row['city']; ?></td>
              </tr>
              <tr>
                <td colspan="2">
                  <center><span class="text-success"> <b> I am <?php echo $row['user_type']; ?></b></span></center>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  include 'footer.php';
  ?>