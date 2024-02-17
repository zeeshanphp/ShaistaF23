<?php
include 'db.php';
$message = "";
$id = $_GET['edit'];
$result = mysqli_query($conn, "SELECT * FROM products WHERE pId='$id'");
$row = mysqli_fetch_array($result);
if (isset($_POST['update_items'])) {

    $folder = '../Seller/images/';
    $folder = $folder . basename($_FILES['pimage']['name']);
    move_uploaded_file($_FILES['pimage']['tmp_name'], $folder);
    if (empty($_FILES['cimage']['name'])) {
        $img = $row['photo'];
    } else {
        $img = $_FILES['pimage']['name'];
    }
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pcat = $_POST['pcat'];
    $query = "UPDATE products SET pname='$pname',pprice='$pprice',pcat='$pcat',photo='$img' WHERE pId='$id'";
    if (mysqli_query($conn, $query)) {
        $message = "<b> Product Updated Successfully &nbsp &nbsp <a href='view_products.php'> View All Products </a></b>";
    }
}
include 'header.php';
?>
<div class="row mx-0 px-0">
    <div class="col-md-2 bg-primary text-white">
        <?php include 'nav.php' ?>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header text-color-in">
                <?php if ($message != "") { ?>
                    <div class="alert alert-success"><?php echo $message ?></div>
                <?php } ?>
                <center>
                    <h4>UPDATE PRODUCTS</h4>
                </center>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">

                    <table class="table">

                        <tr>
                            <td style="text-align:right"><b>Product Name</b></td>
                            <td><input type="text" class="form-control" name="pname" value="<?php echo $row['pname']; ?>" required></td>
                        </tr>
                        <tr>
                            <td style="text-align:right"><b>Product Price</b></td>
                            <td><input type="text" class="form-control" name="pprice" value="<?php echo $row['pprice']; ?>"></td>
                        </tr>
                        <tr>
                            <td style="text-align:right"><b>Product Image</b></td>
                            <td><input type="file" name="pimage" class="form-control"></td>
                        </tr>
                        <tr>
                            <td style="text-align:right"><b>Select Category</b></td>
                            <td>
                                <select name="pcat" class="form-select">
                                    <option value="<?php echo $row['pcat']; ?>"><?php echo $row['pcat']; ?></option>
                                    <?php
                                    $result = mysqli_query($conn, "SELECT * FROM categories");
                                    while ($row_cat = mysqli_fetch_array($result)) {  ?>
                                        <option value="<?php echo $row_cat['catname'] ?>"><?php echo $row_cat['catname'] ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td colspan=""><input type="submit" name="update_items" class="btn w-100 cust-btn btn-primary" value="UPDATE PRODUCT" /></td>
                        </tr>
                    </table>
                </form>

            </div>
        </div>
    </div>
    <div class="col-md-3">
        <img src="../Seller/images/<?php echo $row['photo'] ?>" height="200" width="200">
    </div>
</div>
<?php
include 'footer.php';
?>