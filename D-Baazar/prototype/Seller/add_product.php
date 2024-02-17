<?php
session_start();
include 'db.php';
$message = "";
$sellerId = $_SESSION['seller'];
if (isset($_POST['add_items'])) {
    $folder = 'images/';
    $folder = $folder . basename($_FILES['pimage']['name']);
    move_uploaded_file($_FILES['pimage']['tmp_name'], $folder);
    $img = $_FILES['pimage']['name'];
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pcat = $_POST['pcat'];
    $pqty = $_POST['pqty'];
    $query = "INSERT INTO  products(pname,pprice,pcat,photo,sellerId,total_stock) VALUES('$pname' , '$pprice' , '$pcat' , '$img' , '$sellerId' , '$pqty')";
    if (mysqli_query($conn, $query)) {
        $message = "<b> Product Added Successfully &nbsp &nbsp <a href='view_products.php'> View All Products </a></b>";
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
                    <h4>ADD PRODUCTS</h4>
                </center>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">

                    <table class="table">

                        <tr>
                            <td style="text-align:right"><b>Product Name</b></td>
                            <td><input type="text" class="form-control" name="pname" placeholder="Enter Product Name" required></td>
                        </tr>
                        <tr>
                            <td style="text-align:right"><b>Product Price</b></td>
                            <td><input type="text" class="form-control" name="pprice" placeholder="Enter Product Price"></td>
                        </tr>
                        <tr>
                            <td style="text-align:right"><b>Product Quantity</b></td>
                            <td><input type="number" class="form-control" name="pqty" placeholder="Enter Product Quantity"></td>
                        </tr>
                        <tr>
                            <td style="text-align:right"><b>Product Image</b></td>
                            <td><input type="file" name="pimage" class="form-control"></td>
                        </tr>
                        <tr>
                            <td style="text-align:right"><b>Select Category</b></td>
                            <td>
                                <select name="pcat" class="form-control">
                                    <?php
                                    $result = mysqli_query($conn, "SELECT * FROM categories");
                                    while ($row = mysqli_fetch_array($result)) {  ?>
                                        <option value="<?php echo $row['catname'] ?>"><?php echo $row['catname'] ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td colspan=""><input type="submit" name="add_items" class="btn w-100 cust-btn btn-primary" value="ADD PRODUCT" /></td>
                        </tr>
                    </table>
                </form>

            </div>
        </div>


    </div>
    <div class="col-md-3"></div>
</div>
<?php
include 'footer.php';
?>