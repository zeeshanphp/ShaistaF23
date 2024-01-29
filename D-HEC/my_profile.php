  <?php
    include 'db.php';
    session_start();
    $id = $_GET['view'];
    $query = "SELECT * FROM faculity_member fm JOIN faculity_profile fp on fm.memberId=fp.memberId";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    include 'header.php';
    ?>
  <section style="background-color: #eee;">
      <div class="container py-5">

          <div class="row">
              <div class="col-lg-4">
                  <div class="card mb-4">
                      <div class="card-body text-center">
                          <img src="Faculity/images/<?php echo $row['photo'] ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                          <h5 class="my-3"><?php echo $row['fullname'] ?></h5>
                          <p class="text-muted mb-1"><?php echo $row['speciality'] ?></p>
                          <p class="text-muted mb-4"><?php echo $row['email'] ?></p>
                          <div class="d-flex justify-content-center mb-2">
                              <a href="CV/<?php echo $row['cv'] ?>" class="btn btn-primary">View My CV</a>
                          </div>
                      </div>
                  </div>

              </div>
              <div class="col-lg-8">
                  <div class="card mb-4">
                      <div class="card-body">
                          <div class="row">
                              <div class="col-sm-3">
                                  <p class="mb-0">Full Name</p>
                              </div>
                              <div class="col-sm-9">
                                  <p class="text-muted mb-0"><?php echo $row['fullname'] ?></p>
                              </div>
                          </div>
                          <hr>
                          <div class="row">
                              <div class="col-sm-3">
                                  <p class="mb-0">Email</p>
                              </div>
                              <div class="col-sm-9">
                                  <p class="text-muted mb-0"><?php echo $row['email'] ?></p>
                              </div>
                          </div>
                          <hr>
                          <div class="row">
                              <div class="col-sm-3">
                                  <p class="mb-0">Phone</p>
                              </div>
                              <div class="col-sm-9">
                                  <p class="text-muted mb-0"><?php echo $row['phone'] ?></p>
                              </div>
                          </div>
                          <hr>
                          <div class="row">
                              <div class="col-sm-3">
                                  <p class="mb-0">Mobile</p>
                              </div>
                              <div class="col-sm-9">
                                  <p class="text-muted mb-0"><?php echo $row['phone'] ?></p>
                              </div>
                          </div>
                          <hr>
                          <div class="row">
                              <div class="col-sm-3">
                                  <p class="mb-0">Address</p>
                              </div>
                              <div class="col-sm-9">
                                  <p class="text-muted mb-0"><?php echo $row['city'] ?></p>
                              </div>
                          </div>
                      </div>
                  </div>

              </div>
          </div>
      </div>
  </section>
  <?php
    include 'footer.php';
    ?>