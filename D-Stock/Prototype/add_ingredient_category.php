  <?php
    include 'db.php';
    $message = "";

    if (isset($_POST['add_cat'])) {
        $cat = $_POST['cat'];
        mysqli_query($conn, "INSERT into ingCategory(categoryIng)VALUES('$cat')");
        $message = "Ingredient Category Added <a href='list_cat.php'>Go To List Ingredients Category page</a>";
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
                      <h4>Add Ingredient cat</h4>
                  </div>
                  <div class="card-body">
                      <form method="post">
                          <table class="table">
                              <tr>
                                  <td> <b> Enter Ingredient Category</b></td>
                                  <td><input type="text" class="form-control" name="cat" placeholder="Enter cat For Ingredient" required /></td>
                                  <td><input type="submit" name="add_cat" class="btn btn-primary w-100" value="Add cat"></td>
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