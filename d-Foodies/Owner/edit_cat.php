<?php
include 'db.php';
session_start();


$id = $_GET['id'];
$item_record = mysqli_query($conn, "select * from  categories where catId='$id'");
$res_record = mysqli_fetch_array($item_record);
if (isset($_POST['update_cat'])) {
  $id = $_GET['id'];
  $category = $_POST['catname'];
  $query = "update categories set catname='$category' where catId='$id'";
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
    <?php include 'top-nav.php'; ?>

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
                  <h5><b> UPDATE CATEGORY</b></h5>
                </center>
              </td>
            </tr>
            <tr>
              <td>CATEGORY NAME</td>
              <td><input type="text" class="form-control" name="catname" value="<?php echo $res_record['catname'] ?>" required></td>
            </tr>
            <tr>
              <td></td>
              <td colspan=""><input type="submit" name="update_cat" class="btn w-100 cust-btn" value="UPDATE CATEGORY" /></td>
            </tr>

          </table>
        </form>
      </div>
    </div>

  </div>
  <?php include 'footer.php'; ?>
</body>

</html>