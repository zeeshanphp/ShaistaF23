<?php
include 'db.php';
session_start();
$categories = "select * from  categories";
$cat_records = mysqli_query($conn, $categories);
$id = $_GET['id'];
$item_record = mysqli_query($conn, "select * from food where pId='$id'");
$res_record = mysqli_fetch_array($item_record);
if (isset($_POST['update_items'])) {

  $pname = $_POST['pname'];
  $pprice = $_POST['pprice'];
  $pcat = $_POST['pcat'];
  $query = "update  food set pname='$pname',pprice='$pprice',pcat='$pcat' where pId='$id'";
  mysqli_query($conn, $query);
  header('location:manfood.php');
}



?>
<!DOCTYPE html>
<html>

<head>
  <title>FOODIES.COM
  </title>
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
                  <h5><b> UPDATE FOOD</b></h5>
                </center>
              </td>
            </tr>
            <tr>
              <td style="text-align:right"><b>Food Name</b></td>
              <td><input type="text" class="form-control" name="pname" value="<?php echo $res_record['pname']  ?>" required></td>
            </tr>
            <tr>
              <td style="text-align:right"><b>Food Price</b></td>
              <td><input type="text" class="form-control" name="pprice" value="<?php echo $res_record['pprice']  ?>" required></td>
            </tr>


            <tr>
              <td style="text-align:right"><b>Food Category</b></td>
              <td><select name="pcat" class="form-control" required>
                  <option value="<?php echo $res_record['pcat']  ?>"><?php echo $res_record['pcat']  ?></option>
                  <?php while ($row = mysqli_fetch_array($cat_records)) { ?>
                    <option value="<?php echo $row['catname'] ?>"><?php echo $row['catname'] ?></option>
                  <?php  } ?>
                </select>
              </td>
            </tr>
            <tr>
              <td></td>
              <td colspan=""><input type="submit" name="update_items" class="btn w-100 cust-btn" value="UPDATE FOOD ITEM" /></td>
            </tr>
          </table>
        </form>
      </div>
    </div>

  </div>
  <?php include 'footer.php'; ?>
</body>

</html>