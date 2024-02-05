  <?php
    include 'db.php';
    $message = "";
    $result = mysqli_query($conn, "SELECT * FROM users");
    include 'header.php';

    ?>
  <div class="container-fluid mx-0 px-0">
      <div class="row">
          <div class="col-md-2">
              <?php
                include 'nav.php';
                ?>
          </div>
          <div class="col-md-9">
              <div class="card">
                  <?php if ($message != "") { ?>
                      <div class="alert alert-success bg-gradient"><?php echo $message ?></div>
                  <?php } ?>
                  <div class="card-header">
                      <h4>List Users</h4>
                  </div>
                  <div class="card-body">
                      <form method="post">
                          <table class="table table-striped">
                              <tr class="table-active">
                                  <th>Fullname</th>
                                  <th>Username</th>
                                  <th>Email</th>
                                  <th>Phone</th>
                                  <th>City</th>
                                  <th>Role</th>
                              </tr>
                              <?php
                                while ($row = mysqli_fetch_array($result)) {


                                ?>
                                  <tr>
                                      <td><?php echo $row['fullname'] ?></td>
                                      <td><?php echo $row['username'] ?></td>
                                      <td><?php echo $row['email'] ?></td>
                                      <td><?php echo $row['phone'] ?></td>
                                      <td><?php echo $row['city'] ?></td>
                                      <td><?php echo $row['role'] ?></td>
                                  </tr>
                              <?php } ?>
                          </table>
                      </form>
                  </div>
              </div>
          </div>
      </div>


  </div>
  <?php
    include 'footer.php';
    ?>