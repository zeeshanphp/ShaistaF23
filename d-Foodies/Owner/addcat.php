<?php
include 'db.php';
if (isset($_POST['add_cat'])) {

  $catname = $_POST['catname'];
  $query = "insert into   categories(catname) values('$catname')";
  mysqli_query($conn, $query);
  header('location:mancat.php');
}



?>
<!DOCTYPE html>
<html>

<head>
  <title>FOODIES.COM</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <link rel="stylesheet" href="css/styles.css">
  <style>
  </style>
</head>

<body>
  <nav class="container-fluid py-3 nav-back">
    <div class="row">
      <div class="col-md-8">
        <h4>OWNER PANNEL &nbsp FOODIES.COM
        </h4>
      </div>
      <div class="col-md-4">
        <a href="logout.php" class="btn btn-danger float-right">Logout</a>
      </div>
    </div>

  </nav>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2 top-bg px-0">
        <?php include 'nav.php' ?>
      </div>
      <div class="col-md-8 mx-4 mt-4" style="background: #fff;">
        <form method="POST" enctype="multipart/form-data">
          <table class="table">
            <tr>
              <td colspan="2" class="text-color">
                <center>
                  <h5><b> ADD CATEGORY</b></h5>
                </center>
              </td>
            </tr>
            <tr>
              <td>CATEGORY NAME</td>
              <td><input type="text" class="form-control" name="catname" placeholder="Enter Category Name" required></td>
            </tr>
            <tr>
              <td colspan="2"><input type="submit" name="add_cat" class="btn w-100 cust-btn" value="ADD CATEGORY" /></td>
            </tr>

          </table>
        </form>
      </div>
    </div>

  </div>
  <?php include 'footer.php'; ?>
</body>

</html>