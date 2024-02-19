<?php
include 'db.php';
session_start();


$id = $_GET['id'];
$item_record = mysqli_query($conn, "select * from  categories where catId='$id'");
$res_record = mysqli_fetch_array($item_record);
if (isset($_POST['update_items'])) {
  $id = $_GET['id'];
  $category = $_POST['category'];
  $query = "update categories set catname='$category' where catId='$id'";
  mysqli_query($conn, $query);
  header('location:mancat.php');
}

?>
<!DOCTYPE html>
<html>

<head>
  <title>Sale Purchase of Automobiles and Spare Parts</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <style>
    body {
      background: #ecf0f5;
      font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    }

    .nav-back,
    .cust-bg {
      background: #2d3436;
      color: #FFF;
    }

    ul li a {
      color: #b8c7ce;
    }

    ul li:hover {
      background: #636e72;
      color: #b8c7ce;
    }
  </style>
</head>

<body>
  <nav class="container-fluid py-3 nav-back">
    <div class="row">
      <div class="col-md-8">
        <h4>ADMIN PANNEL &nbsp&nbsp Sale Purchase of Automobiles and Spare Parts </h4>
      </div>
      <div class="col-md-4">
        <a href="logout.php" class="btn btn-danger float-right">Logout</a>
      </div>
    </div>

  </nav>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2 cust-bg">
        <?php include 'nav.php' ?>
      </div>
      <div class="col-md-8 mx-4 mt-4" style="background: #fff;">
        <form method="post">
          <table class="table">
            <tr>
              <td colspan="2" class="text-primary">
                <center>
                  <h5> UPDATE FABRICS</h5>
                </center>
              </td>
            </tr>
            <tr>
              <td>CATEGORY</td>
              <td><input type="text" class="form-control" name="category" value="<?php echo $res_record['catname'] ?>" required></td>
            </tr>

            <tr>
              <td></td>
              <td colspan=""><input type="submit" name="update_items" class="btn w-100 btn-dark" value="UPDATE CATEGORY" /></td>
            </tr>
          </table>
        </form>
      </div>
    </div>

  </div>
</body>

</html>