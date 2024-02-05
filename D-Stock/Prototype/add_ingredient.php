  <?php
    include 'db.php';
    $message = "";

    if (isset($_POST['add_ingredient'])) {
        $unit = $_POST['units'];
        $ing = $_POST['iname'];
        $cat = $_POST['cat'];
        mysqli_query($conn, "INSERT into ingredients(ingredient,unit,ingcat)VALUES('$ing' , '$unit' , '$cat')");
        $message = "Ingredient Added <a href='list_ingredient.php'>Go To List Ingredients page</a>";
    }
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
                      <h4>Add Ingredient</h4>
                  </div>
                  <div class="card-body">
                      <form method="post">
                          <table class="table">
                              <tr>
                                  <td> <b> Enter Ingredient Name</b></td>
                                  <td><input type="text" class="form-control" name="iname" placeholder="Enter Ingredient" required /></td>
                              </tr>
                              <tr>
                                  <td><b>Select Unit</b></td>
                                  <td>
                                      <select name="units" class="form-control">
                                          <?php
                                            $result = mysqli_query($conn, "SELECT * FROM ingUnits");
                                            while ($row = mysqli_fetch_array($result)) {  ?>
                                              <option value="<?php echo $row['unit'] ?>"><?php echo $row['unit'] ?></option>
                                          <?php } ?>
                                      </select>
                                  </td>
                              </tr>
                              <tr>
                                  <td> <b>Select Ingredient Category</b> </td>
                                  <td>
                                      <select name="cat" class="form-control">
                                          <?php
                                            $result = mysqli_query($conn, "SELECT * FROM ingCategory");
                                            while ($row = mysqli_fetch_array($result)) {  ?>
                                              <option value="<?php echo $row['categoryIng'] ?>"><?php echo $row['categoryIng'] ?></option>
                                          <?php } ?>
                                      </select>
                                  </td>
                              </tr>
                              <tr>
                                  <td></td>
                                  <td><input type="submit" name="add_ingredient" class="btn btn-primary bg-gradient w-100" value="Add Ingredient"></td>
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