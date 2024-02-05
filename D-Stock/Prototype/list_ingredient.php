  <?php
    include 'db.php';
    $message = "";
    $result = mysqli_query($conn, "SELECT * FROM ingredients");
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
                      <h4>List Ingredient</h4>
                  </div>
                  <div class="card-body">
                      <form method="post">
                          <table class="table">
                              <tr>
                                  <th>Ingredient</th>
                                  <th>Ingredient Category</th>
                                  <th>Ingredient Unit</th>
                                  <th>Available Qty</th>
                                  <th>Price Per Gram</th>
                              </tr>
                              <?php
                                while ($row = mysqli_fetch_array($result)) {


                                ?>
                                  <tr>
                                      <td><?php echo $row['ingredient'] ?></td>
                                      <td><?php echo $row['ingcat'] ?></td>
                                      <td><?php echo $row['unit'] ?></td>
                                      <td><?php echo $row['qty'] . "&nbsp <b>" . $row['unit'] . "</b>" ?></td>
                                      <td><?php echo  " <b> Rs.</b>&nbsp" . $row['price']  ?></td>
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