  <?php
    include '../db.php';
    $message = "";

    if (isset($_POST['add_unit'])) {
        $unit = $_POST['unit'];
        mysqli_query($conn, "INSERT into ingUnits(unit)VALUES('$unit')");
        $message = "Unit Added <a href='list_units.php'>Go To List Ingredients Units page</a>";
    }
    require 'header.php';
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
                      <h4>Add Ingredient Unit</h4>
                  </div>
                  <div class="card-body">
                      <form method="post">
                          <table class="table">
                              <tr>
                                  <td> <b> Enter Unit For Ingredient</b></td>
                                  <td><input type="text" class="form-control" name="unit" placeholder="Enter Unit For Ingredient" required /></td>
                                  <td><input type="submit" name="add_unit" class="btn btn-primary w-100" value="Add Unit"></td>
                              </tr>
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