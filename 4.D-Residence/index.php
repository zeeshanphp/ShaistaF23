  <?php
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
              <img src="images/s1.png" class="d-block w-100" height="400" alt="...">
              <div class="carousel-caption d-none d-md-block">
                  <h5>First slide label</h5>
                  <p>Some representative placeholder content for the first slide.</p>
              </div>
          </div>
          <div class="carousel-item">
              <img src="images/s2.png" class="d-block w-100" height="400" alt="...">
              <div class="carousel-caption d-none d-md-block">
                  <h5>Second slide label</h5>
                  <p>Some representative placeholder content for the second slide.</p>
              </div>
          </div>
          <div class="carousel-item">
              <img src="images/s3.png" class="d-block w-100" height="400" alt="...">
              <div class="carousel-caption d-none d-md-block">
                  <h5>Third slide label</h5>
                  <p>Some representative placeholder content for the third slide.</p>
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
                  <h2 class="text-primary py-2"> OUR ROOMS </h2>
              </center>
          </div>
      </div>
      <div class="row">
          <div class="col-md-4">
              <div class="card border-primary" style="width: 18rem;">
                  <img src="images/r1.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                      <h5 class="card-title">LUXARY ROOM</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="card border-primary" style="width: 18rem;">
                  <img src="images/r2.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                      <h5 class="card-title">DOUBLE ROOM</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="card border-primary" style="width: 18rem;">
                  <img src="images/r3.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                      <h5 class="card-title">SINGLE ROOM</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  </div>
              </div>
          </div>
      </div>
      <?php
        include 'footer.php';
        ?>