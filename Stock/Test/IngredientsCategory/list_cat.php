  <?php
    include '../db.php';
    $message = "";
    $result = mysqli_query($conn, "SELECT * FROM ingCategory");
    include '../includes/header.php';

    ?>
  <div class="container-fluid mx-0 px-0">
      <div class="row">
          <div class="col-md-2">
              <?php
                 include '../includes/nav.php';
                ?>
          </div>
          <div class="col-md-9">
              <div class="card">
                  <?php if ($message != "") { ?>
                      <div class="alert alert-success bg-gradient"><?php echo $message ?></div>
                  <?php } ?>
                  <div class="card-header">
                      <h4>List Ingredient Unit</h4>
                  </div>
                  <div class="card-body">
                      <form method="post">
                          <table class="table">
                              <tr>
                                  <th>Ingredient Category</th>
                              </tr>
                              <?php
                                while ($row = mysqli_fetch_array($result)) {


                                ?>
                                  <tr>
                                      <td><?php echo $row['categoryIng'] ?></td>
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
     include '../includes/footer.php';
    ?>