  <?php
    include 'db.php';
    session_start();
    $query = "SELECT * FROM faculity_member fm JOIN faculity_profile fp on fm.memberId=fp.memberId";
    $result = mysqli_query($conn, $query);

    include 'header.php';
    ?>
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
          <div class="carousel-item active">
              <img src="images/banner.jpg" class="d-block w-100" height="400" alt="...">
              <div class="carousel-caption d-none d-md-block">
                  <h1> <b> Faculties & Departments </b></h1>
              </div>
          </div>


      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
      </button>
  </div>
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
              <center>
                  <h2 class="text-primary py-2"> OUR MEMBERS </h2>
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
                          <a href="Faculity/CV/<?php echo $row['cv'] ?>" class="btn btn-success w-100">View My CV</a>
                      </div>
                  </div>
              </div>
          <?php  } ?>


      </div>
      <?php
        include 'footer.php';
        ?>