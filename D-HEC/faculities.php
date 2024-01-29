  <?php
    include 'db.php';
    session_start();
    $query = "SELECT * FROM faculity_member fm JOIN faculity_profile fp on fm.memberId=fp.memberId";
    $result = mysqli_query($conn, $query);

    include 'header.php';
    ?>

  <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
              <center>
                  <h2 class="text-primary py-2"> ALL AVAILABLE FACULITY MEMBERS </h2>
              </center>
          </div>
      </div>
      <div class="row">
          <?php
            while ($row = mysqli_fetch_array($result)) {
            ?>
              <div class="col-md-4">
                  <div class="card" style="width: 18rem; background:none;">
                      <img src="Faculity/images/<?php echo $row['photo'] ?>" class="rounded-circle" alt="...">
                      <div class="card-body">
                          <h5 class="card-title"><?php echo $row['fullname']; ?></h5>
                          <p class="card-text"><?php echo $row['speciality'] ?></p>
                      </div>
                      <div class="card-footer">
                          <a href="Faculity/CV/<?php echo $row['cv'] ?>" class="btn btn-success w-100 bg-gradient">View My CV</a> <br> <br>
                          <a href="my_profile.php?view=<?php echo $row['memberId'] ?>" class="btn btn-primary w-100 bg-gradient">View My Profile</a>
                      </div>
                  </div>
              </div>
          <?php  } ?>


      </div>
      <?php
        include 'footer.php';
        ?>